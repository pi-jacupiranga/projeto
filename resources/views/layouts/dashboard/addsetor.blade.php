@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Setores</h1>
@stop

@section('content')
    <h2>Adicionar um novo setor</h2>
    <form action="/dashboard/users/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome do setor:</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="email">Descrição:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar setor</button>
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