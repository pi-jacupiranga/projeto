<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('documento_nome');
            $table->integer('documento_ano');
            $table->string('documento_periodo');
            $table->integer('documento_expurgo');
            $table->string('documento_observacao');
            $table->unsignedBigInteger('documento_setor_id');
            $table->foreign('documento_setor_id')->references('id')->on('setores');
            $table->unsignedBigInteger('documento_caixa_id');
            $table->foreign('documento_caixa_id')->references('id')->on('caixas');
            $table->unsignedBigInteger('documento_tiposdoc_id');
            $table->foreign('documento_tiposdoc_id')->references('id')->on('tiposdoc');
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
        Schema::dropIfExists('documentos');
    }
}
