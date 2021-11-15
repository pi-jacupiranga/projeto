@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2>Documento</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Tipo</th>
                <th>Documento</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($permissoes as $permissao)

                <tr>
                    <td>{{ $permissao->permissao_tipo }}</td>
                    <td></td>
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