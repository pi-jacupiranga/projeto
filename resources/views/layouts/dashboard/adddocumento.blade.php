@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Prateleira</h1>
@stop

@section('content')
    <h2>Adicionar um novo documento</h2>
    <form action="/dashboard/documentos/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="documento_nome">Nome do documento:</label>
                <input type="text" class="form-control" name="documento_nome" id="documento_nome" placeholder="Digite o nome do documento">
            </div>

            <div class="form-group">
            <label for="documento_ano">Ano do documento:</label>
                <input type="text" class="form-control" name="documento_ano" id="documento_ano" placeholder="Digite o ano do documento">
            </div>

            <div class="form-group">
            <label for="documento_periodo">Período do documento:</label>
                <input type="text" class="form-control" name="documento_periodo" id="documento_periodo" placeholder="Digite o período do documento">
            </div>

            <div class="form-group">
            <label for="documento_expurgo">Expurgo do documento:</label>
                <input type="text" class="form-control" name="documento_expurgo" id="documento_expurgo" placeholder="Digite o expurgo do documento">
            </div>

            <div class="form-group">
            <label for="documento_observacao">Observação do documento:</label>
                <input type="text" class="form-control" name="documento_observacao" id="documento_observacao" placeholder="Digite a observação do documento">
            </div>

            <div class="form-group">
                <label for="documento_setor_id">Setor:</label>
                <select name="documento_setor_id" id="documento_setor_id" class="form-control">
                    @foreach ($setores as $setor)
                        <option value="{{ $setor->id }}">{{ $setor->setor_nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="documento_caixa_id">Caixa:</label>
                <select name="documento_caixa_id" id="documento_caixa_id" class="form-control">
                    @foreach ($caixas as $caixa)
                        <option value="{{ $caixa->id }}">{{ $caixa->caixa_numero }} Na Prat x na Est x </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="documento_tiposdoc_id">Tipo de Documento:</label>
                <select name="documento_tiposdoc_id" id="documento_tiposdoc_id" class="form-control">
                    @foreach ($tiposdoc as $tipodoc)
                        <option value="{{ $tipodoc->id }}">{{ $tipodoc->tipodoc_nome }} </option>
                    @endforeach
                </select>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Documento</button>
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