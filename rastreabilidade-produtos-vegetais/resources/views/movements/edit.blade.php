@extends('layouts.main')

@section('title', 'Editando')

@section('page', 'Editar Movimentação')

@section('content')

    <div class="container-fluid py-4 mt-5">
      <form action="/movement/update/{{$movement->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center justify-content-center mt-1">
                <h2>Edite sua Movimentação - {{ $batchs->code }}</h2>
                  </div>
              </div>
  
              <div class="card-body">
  
              <div class="d-flex align-items-center justify-content-center mb-2">
                <p class="text-uppercase text-sm">Informações</p>
              </div>


              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nome" class="form-control-label">Nome</label>
                      <input required class="form-control" value="{{$movement->nome}}" type="text" name="nome" id="nome" placeholder="Nome">
                    </div>
                </div>


                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="razao_social" class="form-control-label">Razão Social</label>
                        <input required class="form-control" value="{{$movement->razao_social}}" type="text" name="razao_social" id="razao_social" placeholder="Razão Social">
                      </div>
                    </div>
  
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <label class="mt-3" for="tipo_documento">Tipo de Documento:</label>
                          <select name="tipo_documento" id="tipo_documento" class="form-control">
                            @if($movement->tipo_documento == "CPF")
                              <option selected value="CPF">CPF</option>
                              <option value="I.E">I.E</option>
                              <option value="CNPJ">CNPJ</option>
                              <option value="CGC/MAPA">CGC/MAPA</option>
                            @elseif($movement->tipo_documento == "I.E")
                              <option value="CPF">CPF</option>
                              <option selected value="I.E">I.E</option>
                              <option value="CNPJ">CNPJ</option>
                              <option value="CGC/MAPA">CGC/MAPA</option>
                              @elseif($movement->tipo_documento == "CNPJ")
                              <option value="CPF">CPF</option>
                              <option value="I.E">I.E</option>
                              <option selected value="CNPJ">CNPJ</option>
                              <option value="CGC/MAPA">CGC/MAPA</option>
                              @elseif($movement->tipo_documento == "CGC/MAPA")
                              <option value="CPF">CPF</option>
                              <option value="I.E">I.E</option>
                              <option value="CNPJ">CNPJ</option>
                              <option selected value="CGC/MAPA">CGC/MAPA</option>
                              @endif
                          </select>      
                      </div>
                   </div>
                    
  
                 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="documento" class="form-control-label">Documento</label>
                          <input required class="form-control" value="{{$movement->documento}}" type="text" name="documento" id="documento" placeholder="Documento">
                        </div>
                     </div>                         
                         
              <div class="col-md-6">
                <div class="form-group">
                <label class="mt-3" for="tipo_endereco">Tipo de Endereço:</label>
                    <select name="tipo_endereco" id="tipo_endereco" class="form-control">
                      @if($movement->tipo_endereco == "Endereço")
                        <option selected value="Endereço">Endereço</option>
                        <option value="Coordenada">Coordenada</option>
                        <option value="CCIR">CCIR</option>
                      @elseif($movement->tipo_endereco == "Coordenada")
                      <option value="Endereço">Endereço</option>
                      <option selected value="Coordenada">Coordenada</option>
                      <option value="CCIR">CCIR</option>
                      @elseif($movement->tipo_endereco == "CCIR")
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
                    <input required class="form-control" value="{{$movement->endereco}}" type="text" name="endereco" id="endereco" placeholder="Endereço">
                  </div>
                </div>

                

                <div class="col-md-6">
                  <div class="form-group">
                  <label class="mt-3" for="tipo_movimentacao">Tipo de Movimentação:</label>
                      <select name="tipo_movimentacao" id="tipo_movimentacao" class="form-control">
                        @if($movement->tipo_movimentacao == "Recebimento")
                          <option selected value="Recebimento">Recebimento</option>
                          <option value="Expedição">Expedição</option>
                        @else
                        <option value="Recebimento">Recebimento</option>
                        <option selected value="Expedição">Expedição</option>
                        @endif
                      </select>      
                  </div>
              </div>

             
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="quantidade" class="form-control-label">Quantidade</label>
                    <input required class="form-control" value="{{$movement->quantidade}}" type="number" name="quantidade" id="quantidade" placeholder="Quantidade">
                  </div>
                </div>
  
  
              <div class="d-flex justify-content-center">
               <input type="submit" class="btn btn-success" value="Editar Movimentação"> 
              </div>
                </div>
              </div>
            </div>
          </form>
          </div>       



    <script>
        var lote = $(document).ready(function(){
            $('#testdropdown').select2();
        })

        console.log(lote[0])
    </script>

@endsection