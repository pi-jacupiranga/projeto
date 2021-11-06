@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Setores</h1>
@stop

@section('content')
    <h2>Adicionar um novo setor</h2>
    <form action="/dashboard/setor/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="setor_nome">Nome do setor:</label>
                <input type="text" class="form-control" name="setor_nome" id="setor_nome" placeholder="Digite o nome do setor">
            </div>
            <div class="form-group">
                <label for="setor_local">Local:</label>
                <input type="text" class="form-control" name="setor_local" id="setor_local" placeholder="Digite o local do setor">
            </div>
            <div class="form-group">
                <label for="setor_funcionario_responsavel_id">Funcionário responsável:</label>
                <select name="setor_funcionario_responsavel_id" id="setor_funcionario_responsavel_id" class="form-control">
                    <option value="0">Nenhum</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Setor</button>
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