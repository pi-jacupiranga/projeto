@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Permissão</h1>
@stop

@section('content')
    <h2>Adicionar uma nova permissão</h2>
    <form action="/dashboard/permissoes/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="permissao_tipo">Tipo da permissão:</label>
                <input type="text" class="form-control" name="permissao_tipo" id="permissao_tipo" placeholder="Digite o tipo">
            </div>

            <div class="form-group">
            <label for="permissao_justificativa">Justificativa da permissao:</label>
                <input type="text" class="form-control" name="permissao_justificativa" id="permissao_justificativa" placeholder="Digite o ano do documento">
            </div>

            

            <div class="form-group">
                <label for="permissao_legislacao_id">Legislacao:</label>
                <select name="permissao_legislacao_id" id="permissao_legislacao_id" class="form-control">
                    @foreach ($legislacoes as $legislacao)
                        <option value="{{ $legislacao->id }}">{{ $legislacao->legislacao_nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="permissao_funcionario_id">Funcionário:</label>
                <select name="permissao_funcionario_id" id="permissao_funcionario_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="permissao_documento_id">Documento:</label>
                <select name="permissao_documento_id" id="permissao_documento_id" class="form-control">
                    @foreach ($documentos as $documento)
                        <option value="{{ $documento->id }}">{{ $documento->documento_nome }} </option>
                    @endforeach
                </select>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Permissão</button>
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