<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setores';

    protected $fillable = [
        'setor_nome',
        'setor_local'
    ];

    public function documentos(){
        return $this->hasMany('App\Models\Documento');
    }
}
