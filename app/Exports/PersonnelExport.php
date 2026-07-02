<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\Person;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonnelExport implements FromQuery, WithHeadings, WithMapping
{
    public function __construct(public Company $company)
    {
    }

    public function query()
    {
        return Person::query()
            ->where('company_id', $this->company->id);
    }

    public function headings(): array
    {
        return [
            'CLIENTE_UNICO',
            'NOMBRE_CTE',
            'GENERO_CLIENTE',
            'EDAD_CLIENTE',
            'OCUPACION',
            'TELEFONO1',
            'TELEFONO2',
            'PRODUCTO',
            'DIAS_ATRASO',
            'SALDO',
            'SALDO_TOTAL',
            'SALDO ATRASADO',
            'SALDO REQUERIDO',
            'NOMBRE_DESPACHO',
            'GESTORES',
            'ULTIMA_GESTION',
            'GESTION_DESC',
            'LATITUD',
            'LONGITUD',
        ];
    }

    public function map($person): array
    {
        return [
            $person->cliente_unico,
            $person->nombre_cte,
            $person->genero_cliente,
            $person->edad_cliente,
            $person->ocupacion,
            $person->telefono1,
            $person->telefono2,
            $person->producto,
            $person->dias_atraso,
            $person->saldo,
            $person->saldo_total,
            $person->saldo_atrasado,
            $person->saldo_requerido,
            $person->nombre_despacho,
            $person->gestores,
            $person->ultima_gestion,
            $person->gestion_desc,
            $person->latitud,
            $person->longitud,
        ];
    }
}
