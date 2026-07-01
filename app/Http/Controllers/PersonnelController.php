<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PersonnelExport;
use App\Jobs\SyncPersonnelJob;
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

    public function sync(Company $company)
    {
        SyncPersonnelJob::dispatch($company);

        return back()->with('success', 'Sincronización iniciada. Actualiza en unos momentos.');
    }

    public function export(Company $company)
    {
        return Excel::download(
            new PersonnelExport($company),
            'personal-'.$company->id.'.xlsx'
        );
    }
}
