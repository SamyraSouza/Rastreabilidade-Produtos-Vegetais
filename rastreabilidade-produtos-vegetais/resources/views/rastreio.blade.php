@extends('layouts.main')

@section('title', 'Rastrear')

@section('content')

<h1 class="lotes-title produtos"> Consultar Lote por Código de Rastreio </h1>

    <div class="rastreio">
        <label for="">Código de Rastreio</label>
        <input type="text">
        <button>Consultar</button>
    </div>
<hr>


@if($busca != '')

<p>O usuario esta buscando por : {{$busca}}</p>

@endif

@endsection