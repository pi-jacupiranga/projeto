@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2>Setores</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($setores as $setor)

                <tr>
                    <td>{{ $setor->setor_nome }}</td>
                    <td></td>
                </tr>
                
            @endforeach

        </tbody>

    </table>

    <div class="d-flex justify-content-center">
        {{ $setores->links() }}
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop