<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legislacao extends Model
{
    use HasFactory;
    
    protected $table = 'legislacoes';

    protected $fillable = [
        'legislacao_nome',
        
    ];

    public function permissoes(){
        return $this->hasMany('App\Models\Permissao');
    }
    
}