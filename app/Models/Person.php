<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'company_id',
        'cliente_unico',
        'nombre_cte',
        'genero_cliente',
        'edad_cliente',
        'ocupacion',
        'telefono1',
        'telefono2',
        'producto',
        'dias_atraso',
        'saldo',
        'saldo_total',
        'saldo_atrasado',
        'saldo_requerido',
        'nombre_despacho',
        'gestores',
        'ultima_gestion',
        'gestion_desc',
        'latitud',
        'longitud',
        'raw_data',
        'personnel_sync_id',
        'is_legacy',
        'legacy_at',
    ];

    protected $casts = [
        'raw_data' => 'array',
        'saldo' => 'decimal:2',
        'saldo_total' => 'decimal:2',
        'saldo_atrasado' => 'decimal:2',
        'saldo_requerido' => 'decimal:2',
        'is_legacy' => 'boolean',
        'legacy_at' => 'datetime',
    ];
}
