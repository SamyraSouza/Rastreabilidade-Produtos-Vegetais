@extends('layouts.main')

@section('title', 'Cadastrar Lote')

@section('page', 'Lotes')

@section('content')

<div class="container-fluid py-4 mt-5">
    <form action="/batchs" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center justify-content-center mt-1">
              <h2>Cadastre Seu Lote</h2>
                </div>
            </div>

            <div class="card-body">

            <div class="d-flex align-items-center justify-content-center mb-2">
              <p class="text-uppercase text-sm">Informações</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div></div>
                  </div>
              

            <div class="row d-flex justify-content-start">
                <div class="col-md-6">
                     <label for="products_id">Selecione o Produto:</label>
                  <div class="form-group">
            <select required name="products_id" id="products_id"  class="js-example-basic-single" style="width:300px;">
            <option value="">Selecione</option>     

            @foreach($products as $product)  
            @if($product->status=="1")           
                  <option value="{{$product->id}}">{{$product->name}} ({{$product->code}})</option> 
            @endif         
            @endforeach
         
            </select>
  </div>
            </div>
            </div>
            </div>

    
            <div class="col-md-6">
              <div class="form-group">
                   <label class="mt-3" for="code">Código</label>
                   <div class="input-group mb-3">
                      <input type="text" class="form-control" name="code" id="codebatch" placeholder="XXX-00000">
                      <button onCLick="aleatoriolote()" class="btn btn-secondary mb-0" type="button" id="button-addon2"><img src="/img/produto-de-codigo-de-barras.png"></button>
                  </div>
              </div>
              </div>
    
            
    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dt_producao" class="form-control-label">Data Produção</label>
                        <input class="form-control" type="date" name="dt_producao" id="dt_producao">
                      </div>
                    </div>
    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dt_validade" class="form-control-label">Data Validade</label>
                        <input class="form-control" type="date" name="dt_validade" id="dt_validade">
                      </div>
                    </div>
          
                    <div class="col-md-6">
                    <div class="form-group">
                        <select required name="producao_ecologica" id="producao_ecologica" class="form-control mt-3">
                            <option value="">O produto é de produção ecológica?</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>      
                    </div>
                 </div>
    
            <div class="col-md-6">
            <div class="form-group">
               <select required name="producao_sustentavel" id="producao_sustentavel" class="form-control mt-3">
                <option value="">O produto é de produção sustentável?</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
               </select>      
            </div>
            </div>
                    
                <div class="col-md-6">
                  <div class="form-group">
                      <label class="mt-3" for="status">Status</label>
                     <select name="status" id="status" class="form-control">
                      <option value="1">Ativo</option>
                      <option value="0">Inativo</option>
                     </select>      
                  </div>
                  </div>
    
                <div id="bot">
                <div class="d-flex justify-content-center">
                 <input type="submit" class="btn btn-success mt-5 mb-5 col-md-2 d-flex" value="Criar Lote"> 
                </div>
              </div>
                  </div>
                </div>
              </div>
            </form>
            </div>       
    
    
    @endsection