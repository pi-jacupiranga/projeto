@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2>Solicitar Documentos</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Setor</th>
            </tr>

        </thead>

        <tbody>            
            @foreach ($documentos as $documento)

                <tr>
                    <td><a href="solicitar/{{ $documento->id }}">{{ $documento->documento_nome }}</a></td>
                    <td><a href="solicitar/{{ $documento->id }}">{{ $documento->tipodoc->tipodoc_nome }}</a></td>
                    <td><a href="solicitar/{{ $documento->id }}">{{ $documento->setor->setor_nome }}</a></td>
                </tr>
                
            @endforeach
        </tbody>

    </table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
