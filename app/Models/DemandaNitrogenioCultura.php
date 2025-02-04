<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DemandaNitrogenioCultura extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cultura_id',
        'teor_materia_org_minimo',
        'teor_materia_org_maximo',
        'cultura_anterior',
        'quantidade',
        'medida',
    ];

    protected $table = "demanda_nitrogenio_cultura";
}
