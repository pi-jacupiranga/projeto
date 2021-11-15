<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    use HasFactory;
    
    protected $table = 'tiposdoc';

    protected $fillable = [
        'tipodoc_nome',
        
    ];

    public function documentos(){
        return $this->hasMany('App\Models\Documento');
    }
    
}