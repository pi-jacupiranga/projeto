@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Legislações</h1>
@stop

@section('content')
    <h2>Legislações cadastradas</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($legislacoes as $legislacao)

                <tr>
                    <td>{{ $legislacao->legislacao_nome }}</td>
                    <td></td>
                </tr>
                
            @endforeach

            


        </tbody>

    </table>

{{-- Não entendi esse div 
    <div class="d-flex justify-content-center">
        {{ $legislacoes->links() }}
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