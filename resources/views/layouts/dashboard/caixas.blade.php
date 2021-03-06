@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Caixas</h1>
@stop

@section('content')
    <h2>Caixas cadastradas</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Número</th>
                <th>Prateleira<th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($caixas as $caixa)

                <tr>
                    <td>{{ $caixa->caixa_numero }}</td>
                    <td>{{ $caixa->prateleira->prateleira_numero }}</td>
                    <td></td>
                </tr>
                
            @endforeach

            


        </tbody>

    </table>

{{-- Não entendi esse div 
    <div class="d-flex justify-content-center">
        {{ $caixas->links() }}
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