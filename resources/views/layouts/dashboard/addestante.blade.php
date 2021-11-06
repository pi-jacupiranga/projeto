@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Estantes</h1>
@stop

@section('content')
    <h2>Adicionar uma nova estante</h2>
    <form action="/dashboard/estantes/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="estante_numero">Número da estante:</label>
                <input type="text" class="form-control" name="estante_numero" id="estante_numero" placeholder="Digite o número da estante">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Estante</button>
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