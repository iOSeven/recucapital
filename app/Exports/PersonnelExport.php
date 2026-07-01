<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\Person;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonnelExport implements FromQuery, WithHeadings
{
    public function __construct(public Company $company)
    {
    }

    public function query()
    {
        return Person::query()
            ->where('company_id', $this->company->id)
            ->select('external_id', 'name', 'email', 'phone', 'position', 'created_at');
    }

    public function headings(): array
    {
        return [
            'ID externo',
            'Nombre',
            'Correo',
            'Teléfono',
            'Puesto',
            'Fecha de sincronización',
        ];
    }
}
