@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
    @can('is-admin')
      
        <h1>Usuários</h1>
        
        <table class="table">

            <thead>

                <tr>
                    <th>Nome</th>
                    <th>Setor</th>
                    <th>Ações</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->surname }}</td>
                        <td>
                            @foreach ($setores as $setor)
                                @if($setor->id == $user->setor_id)
                                    {{ $setor->setor_nome }}
                                @endif
                            @endforeach    
                        </td>
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