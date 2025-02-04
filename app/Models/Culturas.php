<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Culturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cultura',
    ];

    protected $table = "culturas";
}
