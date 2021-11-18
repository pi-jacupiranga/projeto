@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tipo de Documento</h1>
@stop

@section('content')

    <form action="/permissoes/add/do" method="POST">  
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="documento_nome">Nome do Documento:</label>
                <input type="text" class="form-control" value="{{ $documentos->documento_nome }}" disabled>
            </div>
            <div class="form-group">
                <label for="tipodoc_nome">Tipo do Documento:</label>
                <input type="text" class="form-control" value="{{ $documentos->tipodoc->tipodoc_nome }}" disabled>
            </div>
            <div class="form-group">
                <label for="setor_nome">Setor do Documento:</label>
                <input type="text" class="form-control" value="{{ $documentos->setor->setor_nome }}" disabled>
            </div>
            <div class="card-footer">
            
            <input type="hidden" name="permissao_funcionario_id" id="permissao_funcionario_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="permissao_documento_id" id="permissao_documento_id" value="{{ $documentos->id }}">
            <input type="hidden" name="permissao_status" id="permissao_status" value="0">



                <button type="submit" class="btn btn-primary">Solicitar</button>
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