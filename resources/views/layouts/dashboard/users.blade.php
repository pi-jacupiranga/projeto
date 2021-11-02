@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    @can('is-admin')
      
        <h1>Usuários</h1>
    
    @else
        
        <p>Você não possui acesso a área que tentou acessar.</p>    
        <a href="./">Voltar</a>

    @endcan

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop