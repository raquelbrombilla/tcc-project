<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Recomendacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificador',
        'prnt',
        'cultura_id',
        'expectativa_rendimento',
        'sistema_cultivo',
        'cultivo',
        'cultura_anterior',
        'analise_id',
        'created_at'
    ];

    protected $table = "recomendacao";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
