<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RecomendacaoCalagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'necessidade_calagem',
        'recomendacao_id',
    ];

    protected $table = "recomendacao_calagem";
}
