@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2>Prateleira</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Número</th>
                <!-- Acho interessante mostrar a estante pois podem ter duas prateleiras número 1 por exemplo -->
                <th>Estante<th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($prateleiras as $prateleira)

                <tr>
                    <td>{{ $prateleira->prateleira_numero }}</td>
                    <td> {{ $prateleira->prateleira_numero }} </td>
                    <td></td>
                </tr>
                
            @endforeach

            


        </tbody>

    </table>

{{-- Não entendi esse div 
    <div class="d-flex justify-content-center">
        {{ $prateleiras->links() }}
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