<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estante extends Model
{
    use HasFactory;

    protected $table = 'estantes';

    protected $fillable = [
        'estante_numero',
        
    ];

    public function prateleiras(){
        return $this->hasMany('App\Models\Prateleira');
    }
    
}