@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <p>Adicionar um novo usuário</p>
    <form action="/dashboard/users/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome completo:</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite o e-mail">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Digite uma senha">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite o CPF">
            </div>
            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" name="rg" id="rg" placeholder="Digite o RG">
            </div>
            <div class="form-group">
                <label for="cargo">Digite o cargo</label>
                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Digite o cargo">
            </div>
            <div class="form-group">
                <label for="data_admissao">Digite a data de admissão</label>
                <input type="date" class="form-control" name="data_admissao" id="cargo" placeholder="Digite a data de admissão">
            </div>
            <div class="form-group">
                <label for="setor">Escolha o setor</label>
                <select name="setor_id" class="form-control" id="setor_id">
                    @foreach ($setores as $setor)
                        <option value="{{ $setor->setor_id }}">{{ $setor->setor_nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="isadmin">É admin?</label>
                <select name="isadmin" class="form-control" id="isadmin">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar usuário</button>
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