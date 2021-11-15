<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissoes';

    protected $fillable = [
        'permissao_tipo',
        'permissao_justificativa',
        'permissao_permitido_em',
        'permissao_legislacao_id',
        'permissao_funcionario_id',
        'permissao_documento_id'

        
    ];


    public function legislacao(){
        return  $this->belongsTo('App\Models\Legislacao','permissao_legislacao_id');
    }
    public function user(){
        return  $this->belongsTo('App\Models\User','permissao_funcionario_id');
    }
    public function documento(){
        return  $this->belongsTo('App\Models\Documento','permissao_documento_id');
    }
}
