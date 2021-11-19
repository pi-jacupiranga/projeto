@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Documentos</h1>
@stop

@section('content')
    <h2>Documentos cadastrados</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Nome</th>
                <th>Setor</th>
                <th>Caixa</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($documentos as $documento)

                <tr>
                    <td>{{ $documento->documento_nome }}</td>
                    <td>{{ $documento->setor->setor_nome }}</td>
                    <td>{{ $documento->caixa->caixa_numero }}</td>
                    <td>{{ $documento->tipodoc->tipodoc_nome }}</td>
                    <td></td>
                </tr>
                
            @endforeach

            


        </tbody>

    </table>

{{-- Não entendi esse div 
    <div class="d-flex justify-content-center">
        {{ $tiposdoc->links() }}
    </div>
-->
--}}


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop