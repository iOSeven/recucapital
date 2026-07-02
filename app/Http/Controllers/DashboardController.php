<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Person;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Company $company)
    {
        $people = Person::where('company_id', $company->id)
            ->orderByDesc('dias_atraso')
            ->paginate(50);

        return view('dashboard.index', compact('company', 'people'));
    }
}
