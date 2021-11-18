@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Permissão</h1>
@stop

@section('content')

    <form action="/permissoes/update/{{ $permissao->id }}" method="POST">  
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label for="documento_nome">Nome do Documento:</label>
                <input type="text" class="form-control" value="{{ $permissao->documento->documento_nome }}" disabled>
            </div>

            <div class="form-group">
                <label for="name">Funcionário Solicitante:</label>
                <input type="text" class="form-control" value="{{ $permissao->user->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="permissao_tipo">Permissão:</label>
                <select name="permissao_tipo" id="permissao_tipo">
                    <option value="">Selecione uma opção</option>
                    <option value="Aprovado">Aprovado</option>
                    <option value="Negado">Negado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="permissao_justificativa">Justificativa:</label>
                <textarea type="text" class="form-control" name="permissao_justificativa" id="permissao_justificativa">
                </textarea>
            </div>

            <div class="form-group">
                <label for="permissao_legislacao_id">Legislação:</label>
                    <select name="permissao_legislacao_id" id="permissao_legislacao_id" class="form-control">
                        @foreach ($legislacoes as $legislacao)
                            <option value="{{ $legislacao->id }}">{{ $legislacao->legislacao_nome }}</option>
                        @endforeach
                    </select>
            </div>

            <input type="hidden" name="permissao_status" id="permissao_status" value="1">
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
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