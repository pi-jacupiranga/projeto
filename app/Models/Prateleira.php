<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prateleira extends Model
{
    use HasFactory;

    protected $table = 'prateleiras';

    protected $fillable = [
        'prateleira_numero',
        'prateleira_estante_id',
    ];

}