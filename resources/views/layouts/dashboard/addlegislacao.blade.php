@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estantes</h1>
@stop

@section('content')
    <h2>Adicionar uma nova legislação</h2>
    <form action="/dashboard/legislacoes/add/do" method="POST">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="legislacao_nome">Nome da Legislação:</label>
                <input type="text" class="form-control" name="legislacao_nome" id="legislacao_nome" placeholder="Digite o nome da legislação">
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Legislação</button>
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