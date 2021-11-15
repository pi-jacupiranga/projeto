<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribuicao extends Model
{
    use HasFactory;

    protected $table = "atribuicoes";

    protected $fillable = [
        'user_id',
        'setor_id',
    ];
}
