@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Prateleira</h1>
@stop

@section('content')
    <h2>Adicionar uma nova prateleira</h2>
    <form action="/dashboard/prateleiras/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="prateleira_numero">Número da prateleira:</label>
                <input type="text" class="form-control" name="prateleira_numero" id="prateleira_numero" placeholder="Digite o número da prateleira">
            </div>


            <div class="form-group">
                <label for="prateleira_estante_id">Estante:</label>
                <select name="prateleira_estante_id" id="prateleira_estante_id" class="form-control">
                    @foreach ($estantes as $estante)
                        <option value="{{ $estante->id }}">{{ $estante->estante_numero }}</option>
                    @endforeach
                </select>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Prateleira</button>
            </div>
        </div>
      </form>

        


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop