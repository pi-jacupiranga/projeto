@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    
    @can('is-admin')
      
        <h2>Usuários cadastrados</h2>
        
        <table class="table">

            <thead>

                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->surname }}</td>
                        <td> {{ $user->cargo }} </td>
                        <td></td>
                    </tr>    

                @endforeach

            </tbody>

        </table>
        
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
        
    
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