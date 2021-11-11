<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    use HasFactory;

    protected $table = 'caixas';

    protected $fillable = [

        'caixa_numero',
        'caixa_prateleira_id',
    ];

    public function prateleira(){
        return  $this->belongsTo('App\Models\Prateleira','caixa_prateleira_id');
    }

}