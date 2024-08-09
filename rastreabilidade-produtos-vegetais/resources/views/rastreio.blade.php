@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

<p>Rastreio</p>

@if($busca != '')
<p>O usuario esta buscando por : {{$busca}}</p>
@endif

@endsection