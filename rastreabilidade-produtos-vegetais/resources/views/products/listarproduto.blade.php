@extends('layouts.main')

@section('title', 'Produtos')

@section('content')


<!-- BARRA DE BUSCAS -->

<div class="busca">
    <form class="barra-pesquisa d-flex justify-content-center" action="/products" method="GET">
        <input class="barra-pesquisa" type="text" name="search" placeholder="Procurar Produto">
        <button type="submit">Buscar</button>
    </form>
</div>

<!-- CONTAINERS LOTES -->

<div class="lotes">

<!-- Flash Message -->
@if(session('msg'))
<div class="container-fluid">
    <div class="row flash alert alert-success d-flex">
    <p class="msg">{{session('msg')}}</p>
    </div>
</div>
@endif
<!-- End flash message -->

@if($search)
<h1 class="lotes-title"> Buscando por: {{$search}} </h1>
@else
<h1 class="lotes-title"> Produtos </h1>
@endif

<a href="/product/create"><button class="cadastro" >Cadastrar Produto</button></a>

<div class="container">

<div class="container">


    @foreach($products as $product)

    <div class="card">
        <img src="/img/products/{{$product->image}}" alt="{{$product->name}}">
        <p class="title">Nome: {{$product->name}}</p>
        <p>Código : {{$product->code}}</p>
        <p>Descrição: {{$product->description}}</p>

        <div class="botao">
        <a class="botao" href="/products/{{$product->id}}"><button>Ver Mais</button></a>
        </div>
    </div>

    @endforeach

    
</div>

@endsection