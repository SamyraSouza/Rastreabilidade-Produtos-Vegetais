@extends('layouts.main')

@section('title', 'Cadastrar Movimentação')

@section('page', 'Movimentação')

@section('content')


    <div class="container-fluid py-4 mt-5">
      <form action="/movements" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center justify-content-center mt-1">
                <h2>Cadastre sua Movimentação</h2>
                  </div>
              </div>
  
              <div class="card-body">
  
              <div class="d-flex align-items-center justify-content-center mb-2">
                <p class="text-uppercase text-sm">Informações</p>
              </div>
  
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="batches_id" class="form-control-label">Selecione os Lotes</label>

                    <select name="batches_id" id="batches_id"  class="js-example-basic-single">                                
                                <option value=" {{$batchchoose->id}} ">{{$batchchoose->code}}</option>            
                    </select>

                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nome" class="form-control-label">Nome</label>
                      <input required class="form-control" type="text" name="nome" id="nome" placeholder="Nome">
                    </div>
                </div>


                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="razao_social" class="form-control-label">Razão Social</label>
                        <input required class="form-control" type="text" name="razao_social" id="razao_social" placeholder="Razão Social">
                      </div>
                    </div>
  
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                       <label class="mt-3" for="tipo_documento">Tipo de Documento:</label>
                          <select name="tipo_documento" id="tipo_documento" class="form-control">
                              <option value="CPF">CPF</option>
                              <option value="I.E">I.E</option>
                              <option value="CNPJ">CNPJ</option>
                              <option value="CGC/MAPA">CGC/MAPA</option>
                          </select>      
                      </div>
                   </div>
                    
  
                 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="documento" class="form-control-label">Documento</label>
                          <input required class="form-control" type="text" name="documento" id="documento" placeholder="Documento">
                        </div>
                     </div>                         
                         
              <div class="col-md-6">
                <div class="form-group">
                <label class="mt-3" for="tipo_endereco">Tipo de Endereço:</label>
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

                

                <div class="col-md-6">
                  <div class="form-group">
                  <label class="mt-3" for="tipo_movimentacao">Tipo de Movimentação:</label>
                      <select name="tipo_movimentacao" id="tipo_movimentacao" class="form-control">
                          <option value="Recebimento">Recebimento</option>
                          <option value="Expedição">Expedição</option>
                      </select>      
                  </div>
              </div>

             
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="quantidade" class="form-control-label">Quantidade</label>
                    <input required class="form-control" type="number" name="quantidade" id="quantidade" placeholder="Quantidade">
                  </div>
                </div>
  
  
              <div class="d-flex justify-content-center">
               <input type="submit" class="btn btn-success mt-3 mb-5 col-md-2 d-flex" value="Criar Movimentação"> 
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