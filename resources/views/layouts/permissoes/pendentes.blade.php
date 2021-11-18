@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2>Permissões Pendentes</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Documento</th>
                <th>Funcionário</th>
                <th>Setor</th>
            </tr>

        </thead>

        <tbody>            
            @foreach ($permissoes as $permissao)

                <tr>
                    <td><a href="pendentes/{{ $permissao->id }}">{{ $permissao->documento->documento_nome }}</a></td>
                    <td><a href="pendentes/{{ $permissao->id }}">{{ $permissao->user->name }}</a></td>
                </tr>
                
            @endforeach
        </tbody>

    </table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
