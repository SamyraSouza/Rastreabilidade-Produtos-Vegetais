<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

    <link rel="icon" href="/img/logistica-verde.png">


    <title>Rastreabilidade - @yield('title')</title>
</head>
<body>

    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">

        <a class="navbar-brand fonte" href="/"><img class="logo" src="/img/logistica-verde.png" alt="">TSN Logística</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
            <!-- Lotes -->
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Lotes
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button"><a class="nav-link" href="/lote">Listar Lote</a></button>
                <button class="dropdown-item" type="button"><a class="nav-link" href="/lote/create">Cadastrar Lote</a></button>
                <button class="dropdown-item" type="button"><a class="nav-link" href="/batchs">Meus Lotes</a></button>
                <button class="dropdown-item" type="button"><a class="nav-link" href="/rastreamento">Rastrear Lote</a></button>
                </div>
            </div>
            <!--  -->
            
            <!-- Produtos -->
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button"><a class="nav-link" href="/products">Listar Produtos</a></button>
                <button class="dropdown-item" type="button"><a class="nav-link" href="/product/create">Cadastrar Produto</a></button>
                <button class="dropdown-item" type="button"><a class="nav-link" href="#">Meus Produtos</a></button>
                </div>
            </div>
            <!--  -->

            <li class="nav-item">
                <a class="nav-link" href="/entrar">Entrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cadastrar">Cadastrar</a>
            </li>
            </ul>
        </div>
        </nav>
    <!-- End navbar -->

    

    @yield('content')

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="/js/script.js"></script>

</html>