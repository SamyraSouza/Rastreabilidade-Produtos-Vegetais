<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/logistica.png">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>
    TSN Logística - @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/css/nucleo-svg.css" rel="stylesheet" />
  <link href="/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/style.css">

  
  <!-- CSS Files -->
  <link id="pagestyle" href="/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

</head>


    <body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 back position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 d-flex justify-content-center align-middle" href="/index">
        <img src="/img/logistica.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class=" font-weight-bold mt-2" style="margin-left: 10px;">TSN Logística</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        @if(@session('autenti') != false)
          <a class="d-flex justify-content-center nav-link-text ms-1 mb-3 mt-3 link-nav" href="/index">
            Página Inicial
          </a>
          @endif
          <div class="d-flex link-nav justify-content-center nav-link-text ms-1 mb-3 mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Produtos            
          </div>
      
            </h5>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
              <div class="accordion-body text-sm opacity-8">
              <a class="nav-link link-nav" href="/products">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1">Listar Produto</span>
          </a>

          <a class="nav-link link-nav" href="/product/create">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1">Cadastrar Produto</span>
          </a>
          </div>
          @if(@session('adm') != true)
          <a class="nav-link link-nav" href="/produc">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1">Meus Produtos</span>
          </a>
          @endif
            </div>

   
        <div class="d-flex link-nav justify-content-center nav-link-text ms-1 mb-3 mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Lotes
        </div>
            </h5>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
              <div class="accordion-body text-sm opacity-8">
              <a class="nav-link link-nav" href="/batchs">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">            
            </div>
            <span class="nav-link-text ms-1">Listar Lote</span>
          </a>

          <a class="nav-link link-nav" href="/batch/create">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1">Cadastrar Lote</span>
          </a>
          @if(@session('adm') != true)
          <a class="nav-link link-nav" href="/batc">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1">Meus Lotes</span>
          </a>
          @endif
          @if(@session('autenti') != false)
          <a class="nav-link link-nav" href="/movements/rastrear">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            </div>
            <span class="nav-link-text ms-1">Rastrear Lote</span>
          </a>
          @endif
              </div>
            </div>            

            <div class="accordion-item mt-3" style="margin-left: 70px;">
            <p class="accordion-header" id="headingThree">
              <div class="accordion-button collapsed text-center " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Movimentação
        </div>
        </p>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <a class="nav-link link-nav" href="/movements">
            <div class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center" style="margin-left: -60px;">            
            </div>
            <span class="nav-link-text ms-1 na">Listar Movimentações</span>
          </a>

          <a class="nav-link link-nav" href="/movement/create">
            <div class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center" style="margin-left: -60px;">
            </div>
            <span class="nav-link-text ms-1 link-nav na">Cadastrar Movimentação</span>
          </a>

          @if(@session('adm') != true)
          <a class="nav-link link-nav" href="/movem">
            <div class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center" style="margin-left: -60px;">
            </div>
            <span class="nav-link-text ms-1 link-nav na">Minhas Movimentações</span>
          </a>
          @endif

    </div>
    @if(@session('autenti') != false)
      @if(@session('adm') == true)
        <a class="nav-link link-nav" href="/peoples">
        <div class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center" style="margin-left: -80px;">            
        </div>
        @if(isset($people) && count($people) == 0)
        <span class="nav-link-text ms-1">Pessoas Não Cadastradas</span>
        @else
        <span class="nav-link-text ms-1">Pessoas Não Cadastradas <i class="fa fa-warning icon"></i></span>      
        @endif 
      @endif             
      </a>

   @endif
 </div>
  </div>
      </ul>
    </div>

  </aside>

    <!-- Navbar --> 
  <main class="main-content position-relative border-radius-lg ">
    
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Página</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">@yield('page')</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">@yield('page')</h6>
        </nav>
         <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group mt-2" style="margin-right:0px;">  
              @if(@session('autenti') != false)
                @if(@session('adm') == false)            
                <button type="button" onclick="mostrar()" id="mostrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none; background:none;">                     
                  <img src=" @if(@session('autenti') != false)@if($user->imagem_perfil == "")/img/perfil.jpg @else /img/people/{{ $user->imagem_perfil }} @endif @endif" alt="" width="50px" height="50px" style="border-radius: 90px;">               
                </button>

                <button type="button" onclick="fechar()" id="fechar"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none; background:none; display:none;">                     
                  <img src=" @if(@session('autenti') != false)@if($user->imagem_perfil == "")/img/perfil.jpg @else /img/people/{{ $user->imagem_perfil }} @endif @endif" alt="" width="50px" height="50px" style="border-radius: 90px;">               
                </button>
               
                <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuButton" id="menu" style="margin-left: -130px;">
                  <p class="nav-link-text" style="margin-left: 20px; margin-top: 10px;">@if(isset($user)){{ $user->nome }}@endif</p>
                  <a class="dropdown-item" href="/profile/@if(isset($user)){{$user->id}}@endif">Ver Perfil</a>
                  <a style="cursor: pointer;" class="dropdown-item mt-2" onCLick="mudarsenha('{{ $user->id }}')">Mudar senha</a>
                  <a class="dropdown-item mt-2" href="/sair">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </div>
                        
            </div>    

            @else
            <div class="input-group" style="width: 100px; ">
            <a href="/sair" class="nav-link text-white font-weight-bold px-0" style=" width: 60px;">
                <span class="d-sm-inline d-none" style="color:rgb(255, 39, 39);">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></span>
              </a>
              @endif
              @else
              <a href="/login" class="nav-link text-white font-weight-bold px-0" style=" width: 100px;">
                <span class="d-sm-inline d-none mr-3" style="color:rgb(255, 255, 255);width: 100px; "><i class="fa fa-user-circle" aria-hidden="true"></i>  Entrar</span>
              </a>
              <a href="/cadastro" class="nav-link text-white font-weight-bold px-0" style=" width: 100px;">
                <span class="d-sm-inline d-none" style="color:rgb(255, 255, 255);width: 100px; "><i class="fa fa-user-o" aria-hidden="true"></i>  Cadastrar</span>
              </a>
              @endif

            </div>
          </div>        
        </div>
      </div>
    </nav>

    

@yield('content')

</body>
<!-- Remover duplicados e manter a versão mais recente -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Outros scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>

<!-- Scripts locais -->
<script src="/js/script.js"></script>

<script>
  $('#telefone').mask('(00)00000-0000');
  $('#cpf').mask('000.000.000-00');
  $('#cnpj').mask('00.000.000/0000-00');
</script>

<!-- Core -->
<script src="/js/core/popper.min.js"></script>
<script src="/js/core/bootstrap.min.js"></script>

@include('sweetalert::alert')

<!-- Theme JS -->
<script src="/js/argon-dashboard.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- Removido jQuery duplicado (versão 3.3.1) -->

</html>