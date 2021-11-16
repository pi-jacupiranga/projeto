<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes', function (Blueprint $table) {
            $table->id();
            $table->string('permissao_tipo');
            $table->string('permissao_justificativa');
            $table->string('permissao_permitido_em')->nullable();
            $table->unsignedBigInteger('permissao_legislacao_id');
            $table->foreign('permissao_legislacao_id')->references('id')->on('legislacoes');
            $table->unsignedBigInteger('permissao_funcionario_id');
            $table->foreign('permissao_funcionario_id')->references('id')->on('users');
            $table->unsignedBigInteger('permissao_documento_id');
            $table->foreign('permissao_documento_id')->references('id')->on('documentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissoes');
    }
}
