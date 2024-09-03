<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/logistica-verde.png">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js""></script>
  <script src="/js/jquery-3.7.1.min.js"></script>
  <script src="/js/script.js"></script>
  <title>
    TSN Logística - Login
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="">

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row" style="width: 100%;
          display: flex;
          justify-content: flex-start;">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">

                  @if(session('msg'))
                  <div class="alert alert-danger" role="alert">
                     <span class="light">{{session('msg')}}</span> 
                  </div>
                @endif

                @if(session('msg-success'))
                <div class="mb-3" style="color:red; font-weight:600;" role="alert">
                   <span>{{session('msg-success')}}</span> 
                </div>
                 @endif

                 @if(session('msg-su'))
                 <div class="alert alert-success" role="alert">
                  <span class="light">{{session('msg-su')}}</span> 
               </div>
              
                  @endif

                  <h4 class="font-weight-bolder">Login</h4>
                  <p class="mb-0">Entre com seu email e senha para continuar</p>
                </div>
                <div class="card-body">
                  <form action="/sign" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <input type="email" required class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <input type="password" required class="form-control form-control-lg" name="senha" placeholder="Senha" aria-label="Password">
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-dark btn-lg w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
                <p class="mb-4 text-sm mx-auto">
                  <a onClick="esqueceusenha()" class="text-dark" style="cursor:pointer;"> Esqueci minha senha</a></p>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Não tem uma conta?
                    <a href="/cadastro" class="text-dark text-gradient font-weight-bold">Cadastrar</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-success h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('img/login.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-dark opacity-6"></span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="/js/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  
  <script>
    $('#telefone').mask('(00)00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#cnpj').mask('00. 000. 000/0000-00');
  </script>
  <!-- Core -->
  <script src="/js/core/popper.min.js"></script>
  
  <script src="/js/core/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js" integrity="sha512-MpDFIChbcXl2QgipQrt1VcPHMldRILetapBl5MPCA9Y8r7qvlwx1/Mc9hNTzY+kS5kX6PdoDq41ws1HiVNLdZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  @include('sweetalert::alert')
  <!-- Theme JS -->
  <script src="/js/argon-dashboard.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
  <script src="/js/script.js"></script>
  
</html>