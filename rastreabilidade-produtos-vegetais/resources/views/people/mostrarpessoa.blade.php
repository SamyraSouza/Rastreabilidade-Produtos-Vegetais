@extends('layouts.main')

@section('title', 'Usuário')

@section('page', 'Usuário')

@section('content')

<form action="/people/update/{{ $user->id }}" method="POST" enctype="multipart/form-data" id="teste" style="margin-left: 20px; margin-top: 30px; ">
    @csrf
    @method('PUT')
      <div class="row" style="width: 90%;">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nome" class="form-control-label">Nome</label>
                    <input required class="form-control" type="text" name="nome" id="nome" value="{{$user->nome}}" placeholder="Nome Completo">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input required class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{$user->email}}">
                  </div>
                </div>
            </div>

                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="razao_social" class="form-control-label">Razão Social</label>
                    <input class="form-control" type="text" name="razao_social" id="razao_social" placeholder="Razão Social" value="{{$user->razao_social}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cpf" class="form-control-label">CPF</label>
                    <input required class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000-00" value="{{$user->cpf}}">
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cnpj" class="form-control-label">CNPJ</label>
                      <input required class="form-control" type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="{{$user->cnpj}}">
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cgc" class="form-control-label">CGC</label>
                      <input class="form-control" type="text" name="cgc" id="cgc" placeholder="CGC" value="{{$user->cgc}}">
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nome_fantasia" class="form-control-label">Nome Fantasia</label>
                        <input class="form-control" type="text" name="nome_fantasia" id="nome_fantasia" placeholder="Nome Fantasia" value="{{$user->nome_fantasia}}">
                      </div>
                    </div>
    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="telefone" class="form-control-label">Telefone</label>
                        <input required class="form-control" type="tel" name="telefone" id="telefone" placeholder="(00) 00000-0000" value="{{$user->telefone}}">
                      </div>
                    </div>
                    </div>
          
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="tipo_endereco">Tipo de Endereço:</label>
                          <select name="tipo_endereco" id="tipo_endereco" class="form-control">
                            @if($user->tipo_endereco == "Endereço")
                              <option selected value="Endereço">Endereço</option>
                              <option value="Coordenada">Coordenada</option>
                              <option value="CCIR">CCIR</option>
                            @elseif($user->tipo_endereco == "Coordenada")
                            <option value="Endereço">Endereço</option>
                              <option selected value="Coordenada">Coordenada</option>
                              <option value="CCIR">CCIR</option>
                            @else
                            <option value="Endereço">Endereço</option>
                            <option value="Coordenada">Coordenada</option>
                            <option selected value="CCIR">CCIR</option>
                            @endif
                          </select>      
                      </div>
                  </div>
                              
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="endereco" class="form-control-label">Endereço</label>
                    <input required class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{$user->endereco}}">
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="website" class="form-control-label">Website</label>
                      <input class="form-control" type="text" name="website" id="website" placeholder="Website" value="{{$user->website}}">
                    </div>
                  </div>
                 

                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="tipo_pessoa">Tipo de Pessoa:</label>
                        <select name="tipo_pessoa" id="tipo_pessoa" class="form-control">
                            @if($user->tipo_pessoa == "Física")
                            <option selected value="Física">Física</option>
                            <option value="Jurídica">Jurídica</option>
                            @else
                            <option value="Física">Física</option>
                            <option selected value="Jurídica">Jurídica</option>
                            @endif
                        </select>      
                    </div>
                </div>
                </div>

                <div class="row">

                  <div class="form-group">
                    <label for="tipo_perfil">A que perfil você se encaixa?</label>
                        <select name="tipo_perfil" id="tipo_perfil" class="form-control">
                            @if($user->tipo_perfil == "Produtor")
                            <option selected value="Produtor">Produtor</option>
                            <option value="Transportador">Transportador</option>
                            <option value="Empresário">Empresário</option>
                            @elseif($user->tipo_perfil == "Transportador")
                            <option value="Produtor">Produtor</option>
                            <option selected value="Transportador">Transportador</option>
                            <option value="Empresário">Empresário</option>
                            @else
                            <option value="Produtor">Produtor</option>
                            <option value="Transportador">Transportador</option>
                            <option selected value="Empresário">Empresário</option>
                            @endif
                        </select>    
                        
                      <div class="col-md-6">
                      <div class="form-group">
                        <img src="/img/people/{{ $user->mapa }}" style="height: 40px;" class="mt-3">
                        <label for="mapa" class="form-control-label marg mt-3">Mapa</label>
                        <input type="file" name="mapa" id="mapa" class="form-control-file marg mt-5">
                      </div>
                    </div>   
                    </div>

                   
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group ">
                      <img src="/img/people/{{ $user->imagem_aerea }}" style="height: 30px;">
                      <label for="imagem_aerea" class="form-control-label marg">Imagem Aérea</label>
                      <input type="file" name="imagem_aerea" id="imagem_aerea" class="form-control-file marg mt-5">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="image" class="form-control-label">Imagem de Perfil</label>
                      <input type="file" name="imagem_perfil" id="imagem_perfil" class="form-control-file">
                    </div>
                  </div>
                </div>

            <div class="d-flex justify-content-center">
             <input type="submit" class="btn btn-dark mt-3 mb-1 d-flex" value="Editar Perfil"> 
            </div>
              </div>
            </div>
          </div>
        </form>
      <div class="col-md-4" id="cd">
        <div class="card card-profile">
          <img src=" @if($user->imagem_fundo == "") /img/fundo.png @else /img/perfil/{{ $user->imagem_fundo }}@endif" alt="Image placeholder" class="card-img-top" style="height: 400px;">
          <a class="marg text-bold" style="font-weight: 800;" id="editar" style="margin-top: -25px;" onCLick="mudarimagem()"><i class="fa fa-edit" style="cursor: pointer;"></i><a> 
            <div class="d-flex">
              <form class="d-flex" action="/image/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <input type="file" name="imagem_fundo" style="margin-top: -45px; display:none;" id="foto"><button style="margin-top: -45px; display:none;" id="enviar" class="btn btn-primary" type="submit">Enviar</button>
              </form>
          </div>
          <div class="row justify-content-center">
            <div class="col-4 col-lg-4 order-lg-2">
              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                <a href="javascript:;">
                  <img src="@if($user->imagem_perfil != "") /img/people/{{ $user->imagem_perfil }} @else /img/perfil.jpg @endif" style="height: 140px;" id="fotinha" class="rounded-circle img-fluid border border-2 border-white">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">

          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-center">
                </div>
              </div>
            </div>
            <div class="text-center mt-4">
              <h5>
                {{ $user->nome }}
              </h5>
              <div class="h6 font-weight-300">
                <i class="ni location_pin mr-2"></i> Endereço: {{ $user->endereco }}
              </div>
              <div class="h6 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Telefone: {{ $user->telefone }}
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>CNPJ: {{ $user->cnpj }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection