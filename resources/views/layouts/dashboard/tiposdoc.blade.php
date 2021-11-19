@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Tipos de Documento</h1>
@stop

@section('content')
    <h2>Tipos de documento cadastrados</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($tiposdoc as $tipodoc)

                <tr>
                    <td>{{ $tipodoc->tipodoc_nome }}</td>
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