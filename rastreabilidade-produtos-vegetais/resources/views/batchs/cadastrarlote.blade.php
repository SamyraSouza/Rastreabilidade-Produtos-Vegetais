@extends('layouts.main')

@section('title', 'Lotes')

@section('content')


<!-- BARRA DE BUSCAS -->

<div class="busca">
    <input class="barra-pesquisa" type="text" placeholder="Procurar Produto">
    <button>Buscar</button>
</div>

<!-- CONTAINERS PRODUTOS -->

<div class="produtos">

<h1 class="lotes-title"> Produtos </h1>

<button class="cadastro" >Cadastrar Produto</button>
<div class="container">

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Produto</p>
        <p>Código</p>
        <p>Descrição</p>

        <div class="botao">
        <button>Cadastrar Lote</button>
        </div>

    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Produto</p>
        <p>Código</p>
        <p>Descrição</p>

        <div class="botao">
        <button>Cadastrar Lote</button>
        </div>

    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Produto</p>
        <p>Código</p>
        <p>Descrição</p>
        
        <div class="botao">
        <button>Cadastrar Lote</button>
        </div>
        
    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Produto</p>
        <p>Código</p>
        <p>Descrição</p>
        
        <div class="botao">
        <button>Cadastrar Lote</button>
        </div>
        
    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Produto</p>
        <p>Código</p>
        <p>Descrição</p>
       
        <div class="botao">
        <button>Cadastrar Lote</button>
        </div>
        
    </div>

</div>
</div>

<!-- CONTAINERS LOTES -->
<div class="lotes">
<h1 class="lotes-title"> Lotes </h1> 

<div class="container">

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Lote</p>
        <p>Código</p>
        <p>Descrição</p>

        <div class="botao">
        <button>Ver Mais</button>
        </div>

    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Lote</p>
        <p>Código</p>
        <p>Descrição</p>

        <div class="botao">
        <button>Ver Mais</button>
        </div>

    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Lote</p>
        <p>Código</p>
        <p>Descrição</p>
        
        <div class="botao">
        <button>Ver Mais</button>
        </div>
        
    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Lote</p>
        <p>Código</p>
        <p>Descrição</p>
        
        <div class="botao">
        <button>Ver Mais</button>
        </div>
        
    </div>

    <div class="card">
        <img src="/img/carrossel3.jpg" alt="">
        <p class="title">Título Lote</p>
        <p>Código</p>
        <p>Descrição</p>
       
        <div class="botao">
        <button>Ver Mais</button>
        </div>
        
    </div>

</div>
</div>

@endsection