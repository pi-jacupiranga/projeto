@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tipo de Documento</h1>
@stop

@section('content')

    <form action="#" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="documento_nome">Nome do Documento:</label>
                <input type="text" class="form-control" name="documento_nome" id="documento_nome" value="{{ $documentos->documento_nome }}" disabled>
            </div>
            <div class="form-group">
                <label for="tipodoc_nome">Tipo do Documento:</label>
                <input type="text" class="form-control" name="tipodoc_nome" id="tipodoc_nome" value="{{ $documentos->tipodoc->tipodoc_nome }}" disabled>
            </div>
            <div class="form-group">
                <label for="setor_nome">Setor do Documento:</label>
                <input type="text" class="form-control" name="setor_nome" id="setor_nome" value="{{ $documentos->setor->setor_nome }}" disabled>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">xxx</button>
            </div>
        </div>
    </form>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop