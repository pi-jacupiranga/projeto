@extends('adminlte::page')

@section('title', 'Gestão do Arquivo Municipal')

@section('content_header')
    <h1>Prateleiras</h1>
@stop

@section('content')
    <h2>Prateleiras cadastradas</h2>

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
                    <td>
                        @foreach ($estantes as $estante)
                            @if($estante->id == $prateleira->prateleira_estante_id)
                                {{ $estante->estante_numero }}
                            @endif
                        @endforeach
                    </td>
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