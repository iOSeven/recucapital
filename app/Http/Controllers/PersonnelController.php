<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PersonnelExport;
use App\Jobs\SyncPersonnelJob;
use App\Models\PersonnelSync;
use App\Models\Company;
use App\Models\Person;
use Maatwebsite\Excel\Facades\Excel;

class PersonnelController extends Controller
{
    public function index(Company $company)
    {
        $people = Person::where('company_id', $company->id)
            ->latest()
            ->paginate(50);

        return view('dashboard.index', compact('company', 'people'));
    }

    /*public function sync(Company $company)
    {
        $cooldown = config('integrations.personnel_sync_cooldown_minutes', 15);

        $lastSync = PersonnelSync::where('company_id', $company->id)
            ->latest()
            ->first();

        if ($lastSync && $lastSync->created_at->gt(now()->subMinutes($cooldown))) {
            return back()->with(
                'warning',
                "Debes esperar {$cooldown} minutos antes de sincronizar nuevamente."
            );
        }

        $runningSync = PersonnelSync::where('company_id', $company->id)
            ->whereIn('status', ['pending', 'processing'])
            ->exists();

        if ($runningSync) {
            return back()->with(
                'warning',
                'Ya existe una sincronización en proceso.'
            );
        }

        $sync = PersonnelSync::create([
            'company_id' => $company->id,
            'status' => 'pending',
        ]);

        SyncPersonnelJob::dispatch($company, $sync);

        return back()->with(
            'success',
            'Sincronización iniciada correctamente.'
        );
    }*/

    public function export(Company $company)
    {
        return Excel::download(
            new PersonnelExport($company),
            'personal-'.$company->id.'.xlsx'
        );
    }

    //Provicional
    public function sync()
    {
        return back()->with('success', 'Sincronización simulada.');
    }
}
