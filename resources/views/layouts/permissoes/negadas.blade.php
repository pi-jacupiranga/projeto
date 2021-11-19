@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Documentos negados</h1>
@stop

@section('content')

    @foreach ($permissoes as $permissao)

        @if ($permissao->permissao_funcionario_id == Auth::user()->id)

            <h1>Documento {{ $permissao->permissao_documento_id }} negado!</h1>
            <h2>Motivo: {{ $permissao->permissao_justificativa }}</h2>
            
        @endif
        
    @endforeach


    <div class="d-flex justify-content-center">
        {{ $permissoes->links() }}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop