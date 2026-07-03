<?php
namespace App\Jobs;

use App\Models\Company;
use App\Models\Person;
use App\Models\PersonnelSync;
use App\Services\Integrations\PersonnelApiService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class SyncPersonnelJob implements ShouldQueue
{
    use Queueable;

    public int $timeout = 900;

    public function __construct(
        public Company $company,
        public PersonnelSync $sync
    ) {}

    public function handle(PersonnelApiService $service): void
    {
        $this->sync->update([
            'status' => 'processing',
            'started_at' => now(),
        ]);

        try {
            $people = $service->getPersonnel($this->company);

            DB::transaction(function () use ($people) {

                Person::where('company_id', $this->company->id)
                    ->where('is_legacy', false)
                    ->update([
                        'is_legacy' => true,
                        'legacy_at' => now(),
                    ]);

                foreach (array_chunk($people, 500) as $chunk) {
                    foreach ($chunk as $item) {
                        Person::create([
                            'company_id' => $this->company->id,
                            'personnel_sync_id' => $this->sync->id,
                            'is_legacy' => false,
                            'legacy_at' => null,

                            'cliente_unico' => $item['CLIENTE_UNICO'] ?? null,
                            'nombre_cte' => $item['NOMBRE_CTE'] ?? null,
                            'genero_cliente' => $item['GENERO_CLIENTE'] ?? null,
                            'edad_cliente' => $item['EDAD_CLIENTE'] ?? null,
                            'ocupacion' => $item['OCUPACION'] ?? null,
                            'telefono1' => $item['TELEFONO1'] ?? null,
                            'telefono2' => $item['TELEFONO2'] ?? null,
                            'producto' => $item['PRODUCTO'] ?? null,
                            'dias_atraso' => $item['DIAS_ATRASO'] ?? null,
                            'saldo' => $item['SALDO'] ?? 0,
                            'saldo_total' => $item['SALDO_TOTAL'] ?? 0,
                            'saldo_atrasado' => $item['SALDO ATRASADO'] ?? 0,
                            'saldo_requerido' => $item['SALDO REQUERIDO'] ?? 0,
                            'nombre_despacho' => $item['NOMBRE_DESPACHO'] ?? null,
                            'gestores' => $item['GESTORES'] ?? null,
                            'ultima_gestion' => $item['ULTIMA_GESTION'] ?? null,
                            'gestion_desc' => $item['GESTION_DESC'] ?? null,
                            'latitud' => $item['LATITUD'] ?? null,
                            'longitud' => $item['LONGITUD'] ?? null,
                            'raw_data' => $item,
                        ]);
                    }
                }
            });

            $this->sync->update([
                'status' => 'completed',
                'total_records' => count($people),
                'finished_at' => now(),
            ]);

        } catch (\Throwable $e) {
            $this->sync->update([
                'status' => 'failed',
                'finished_at' => now(),
                'error_message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}
