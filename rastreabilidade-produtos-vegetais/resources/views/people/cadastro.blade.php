<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/logistica-verde.png">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>
    TSN Logística - Cadastro
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <!-- Nucleo Icons -->
  <link href="/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/css/nucleo-svg.css" rel="stylesheet" />
  <link href="/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/style.css">

  
  <!-- CSS Files -->
  <link id="pagestyle" href="/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="">

  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('img/cadastro.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Bem-Vindo!</h1>
            <p class="text-lead text-white">Para se Cadastrar no TSN Logística, você precisa preencher o formulário e esperar o email de retorno validando se está autorizado a continuar!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n12 mt-md-n9 mt-n10 justify-content-center">
        <div class="mx-auto">
      
              <form action="/people" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-md-8">
                      <div class="card">
                        <div class="card-body">
            
                          <div class="row">

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="nome" class="form-control-label">Nome</label>
                                <input required class="form-control" type="text" name="nome" id="nome" placeholder="Nome Completo">
                              </div>
                            </div>
            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input required class="form-control" type="email" name="email" id="emailcadas" placeholder="Email">
                              </div>
                            </div>
                        </div>

                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="razao_social" class="form-control-label">Razão Social</label>
                                <input class="form-control" type="text" name="razao_social" id="razao_social" placeholder="Razão Social">
                              </div>
                            </div>
            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="cpf" class="form-control-label">CPF</label>
                                <input required class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000-00">
                              </div>
                            </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="cnpj" class="form-control-label">CNPJ</label>
                                  <input required class="form-control" type="text" name="cnpj" id="cnpj" placeholder="CNPJ">
                                </div>
                              </div>
              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="cgc" class="form-control-label">CGC</label>
                                  <input class="form-control" type="text" name="cgc" id="cgc" placeholder="CGC">
                                </div>
                              </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nome_fantasia" class="form-control-label">Nome Fantasia</label>
                                    <input class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" placeholder="Nome Fantasia">
                                  </div>
                                </div>
                
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="telefone" class="form-control-label">Telefone</label>
                                    <input required class="form-control" type="tel" name="telefone" id="telefone" placeholder="(00) 00000-0000">
                                  </div>
                                </div>
                                </div>
                      
                                <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="tipo_endereco">Tipo de Endereço:</label>
                                      <select name="tipo_endereco" id="tipo_endereco" class="form-control">
                                          <option value="Endereço">Endereço</option>
                                          <option value="Coordenada">Coordenada</option>
                                          <option value="CCIR">CCIR</option>
                                      </select>      
                                  </div>
                              </div>
                                          
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="endereco" class="form-control-label">Endereço</label>
                                <input required class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço">
                              </div>
                            </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="website" class="form-control-label">Website</label>
                                  <input class="form-control" type="text" name="website" id="website" placeholder="Website">
                                </div>
                              </div>
                             

                              <div class="col-md-6">
                                <div class="form-group">
                                <label for="tipo_pessoa">Tipo de Pessoa:</label>
                                    <select name="tipo_pessoa" id="tipo_pessoa" class="form-control">
                                        <option value="Física">Física</option>
                                        <option value="Jurídica">Jurídica</option>
                                    </select>      
                                </div>
                            </div>
                            </div>

                            <div class="row">

                              <div class="form-group">
                                <label for="tipo_perfil">A que perfil você se encaixa?</label>
                                    <select name="tipo_perfil" id="tipo_perfil" class="form-control">
                                        <option value="Produtor">Produtor</option>
                                        <option value="Transportador">Transportador</option>
                                        <option value="Empresário">Empresário</option>
                                    </select>    
                                    
                                  <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="mapa" class="form-control-label marg mt-3">Mapa</label>
                                    <input type="file" name="mapa" id="mapa" class="form-control-file marg">
                                  </div>
                                </div>   
                                </div>

                               
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="imagem_aerea" class="form-control-label marg">Imagem Aérea</label>
                                  <input type="file" name="imagem_aerea" id="imagem_aerea" class="form-control-file marg">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="image" class="form-control-label">Imagem de Perfil</label>
                                  <input type="file" name="imagem_perfil" id="imagem_perfil" class="form-control-file">
                                </div>
                              </div>
                            </div>
            
                          <div id="bot">
                        <div class="d-flex justify-content-center">
                         <input type="submit" class="btn btn-dark mt-3 mb-5 col-md-2 d-flex" value="Cadastar"> 
                        </div></div>
                          </div>
                        </div>
                      </div>
                    </form>
        </div>
      </div>
    </div>
  </main>
 
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="/js/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  


  <script>
    $('#telefone').mask('(00)00000-0000');
    $('#cpf').mask('000.000.000-00');
    $('#cnpj').mask('00. 000. 000/0000-00');
  </script>

 
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

</body>

</html>