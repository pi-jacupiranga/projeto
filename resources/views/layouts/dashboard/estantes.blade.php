@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Estantes</h1>
@stop

@section('content')
    <h2>Estantes cadastradas</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Número</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($estantes as $estante)

                <tr>
                    <td>{{ $estante->estante_numero }}</td>
                    <td></td>
                </tr>
                
            @endforeach

            


        </tbody>

    </table>

{{-- Não entendi esse div 
    <div class="d-flex justify-content-center">
        {{ $estantes->links() }}
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