@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Caixa</h1>
@stop

@section('content')
    <h2>Adicionar uma nova caixa</h2>
    <form action="/dashboard/caixas/add/do" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="prateleira_numero">Número da caixa:</label>
                <input type="text" class="form-control" name="caixa_numero" id="caixa_numero" placeholder="Digite o número da caixa">
            </div>


            <div class="form-group">
                <label for="caixa_prateleira_id">Prateleira:</label>
                <select name="caixa_prateleira_id" id="caixa_prateleira_id" class="form-control">
                    @foreach ($prateleiras as $prateleira)
                        <option value="{{ $prateleira->id }}">{{ $prateleira->prateleira_numero }} na Estante {{  $prateleira->estante->estante_numero  }} </option>
                    @endforeach
                </select>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Caixa</button>
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