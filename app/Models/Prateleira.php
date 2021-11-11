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


    public function estante(){
        return  $this->belongsTo('App\Models\Estante','prateleira_estante_id');
    }

    public function caixas(){
        return $this->hasMany('App\Models\Caixa');
    }


}