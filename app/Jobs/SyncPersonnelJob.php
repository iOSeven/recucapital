<?php

namespace App\Jobs;

use App\Models\Company;
use App\Models\Person;
use App\Services\Integrations\PersonnelApiService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SyncPersonnelJob implements ShouldQueue
{
    use Queueable;

    public int $timeout = 300;

    public function __construct(public Company $company)
    {
    }

    public function handle(PersonnelApiService $service): void
    {
        $people = $service->getPersonnel($this->company);

        foreach (array_chunk($people, 500) as $chunk) {
            foreach ($chunk as $item) {
                Person::updateOrCreate(
                    [
                        'company_id' => $this->company->id,
                        'external_id' => $item['id'] ?? $item['external_id'] ?? null,
                    ],
                    [
                        'name' => $item['nombre'] ?? $item['name'] ?? null,
                        'email' => $item['correo'] ?? $item['email'] ?? null,
                        'phone' => $item['telefono'] ?? $item['phone'] ?? null,
                        'position' => $item['puesto'] ?? $item['position'] ?? null,
                        'raw_data' => $item,
                    ]
                );
            }
        }
    }
}
