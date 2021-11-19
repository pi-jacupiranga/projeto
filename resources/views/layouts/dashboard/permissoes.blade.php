@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Permissões</h1>
@stop

@section('content')
    <h2>Permissões cadastradas</h2>

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
                    <td>{{ $permissao->documento->documento_nome }}</td>
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