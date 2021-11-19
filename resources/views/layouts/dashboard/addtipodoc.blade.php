@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Tipos de Documento</h1>
@stop

@section('content')
    <h2>Adicionar um novo tipo de documento</h2>
    <form action="/dashboard/tiposdoc/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="tipodoc_nome">Tipo do Documento:</label>
                <input type="text" class="form-control" name="tipodoc_nome" id="tipodoc_nome" placeholder="Digite o nome do tipo do documento">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Tipo de Documento</button>
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