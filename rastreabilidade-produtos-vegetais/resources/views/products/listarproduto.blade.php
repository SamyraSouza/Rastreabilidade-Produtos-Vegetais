@extends('layouts.main')

@section('title', 'Produtos')

@section('content')


<!-- BARRA DE BUSCAS -->

<div class="busca">
    <input class="barra-pesquisa" type="text" placeholder="Procurar Produto">
    <button>Buscar</button>
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


<h1 class="lotes-title"> Produtos </h1> 

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