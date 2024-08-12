@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

<!-- Carrossel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="carrossel" src="/img/carrossel2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img  class="carrossel" src="/img/carrossel-img1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img class="carrossel" src="/img/carrossel3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <!-- End Carrossel -->


    <!-- Para que serve -->

   <div class="para">
    <h1 class="lotes-title index-title"> Rastreabilidade de Alimentos: Entenda a Nova Legislação e Seus Benefícios </h1>

    <div class="paraq">
        <p>A rastreabilidade de alimentos tornou-se obrigatória no Brasil para produtos vegetais frescos destinados ao consumo humano a partir da publicação da Instrução Normativa Conjunta nº 2/2018, em 2018, pelo Ministério da Agricultura, Pecuária e Abastecimento (MAPA) e pela Agência Nacional de Vigilância Sanitária (Anvisa).</p>

        <p>Essa exigência trouxe diversas vantagens para produtores, consumidores e para o mercado em geral.</p>

        <p>Com a implementação da rastreabilidade de alimentos e a fiscalização sendo realizada em etapas, as empresas e os produtores de vegetais precisam se adequar às normas estabelecidas na instrução normativa para evitar penalidades e, ao mesmo tempo, aproveitar os benefícios dessa prática, como o aumento da confiança do consumidor.</p>

        <p>Neste texto, explicaremos melhor a Instrução Normativa Conjunta, destacaremos os benefícios da rastreabilidade de alimentos e mostraremos como implementá-la.</p>

    </div>
</div>
    <!-- Section Prazos -->

    <section class="prazos">

    <div class="img-prazos">
        <img src="/img/tomate-prazos.jpg" alt="">
    </div>

        <div class="texto">
            
            <h1 class="lotes-title produtos"> Prazos Para Implementação </h1>

            <p>Qual é o prazo para que o produtor se adapte à nova legislação? A implementação da rastreabilidade ocorrerá de forma gradual, conforme determinado pela Instrução Normativa Conjunta nº 1 de 15 de abril de 2019, que trouxe alterações aos prazos, conforme indicado no quadro abaixo.</p>

        </div>
        
    </section>

    <div class="praz">
        <img src="/img/prazos.jpg" alt="">
    </div>
    <!-- End Section Prazos -->

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
<!-- End section Lotes -->

@endsection