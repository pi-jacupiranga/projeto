@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2>Caixa</h2>

    <table class="table">

        <thead>

            <tr>
                <th>Número</th>
                <th>Prateleira<th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>
            
            @foreach ($caixas as $caixa)

                <tr>
                    <td>{{ $caixa->caixa_numero }}</td>
                    <td>
                        @foreach ($prateleiras as $prateleira)
                            @if($prateleira->id == $caixa->caixa_prateleira_id)
                                {{ $prateleira->prateleira_numero }}
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
        {{ $caixas->links() }}
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