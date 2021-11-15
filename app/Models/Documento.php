<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'documento_nome',
        'documento_ano',
        'documento_periodo',
        'documento_expurgo',
        'documento_observacao',
        'documento_setor_id',
        'documento_caixa_id',
        'documento_tiposdoc_id',
    ];

    public function setor(){
        return  $this->belongsTo('App\Models\Setor','documento_setor_id');
    }

    public function caixa(){
        return  $this->belongsTo('App\Models\Caixa','documento_caixa_id');
    }

    public function tipodoc(){
        return  $this->belongsTo('App\Models\TipoDoc','documento_tiposdoc_id');
    }
}
