@extends('layouts.main')

@section('title', $product->name)

@section('page', 'Ver Produto - '.$product->name)

@section('content')


<div class="container-fluid py-4 mt-7">

@if(session('msg'))
    <div class="alert alert-success" role="alert">
        <span class="light">{{session('msg')}}</span> 
    </div>
@endif

      <div class="row">
          <div class="card mb-4">
            <div class="card-header pb-0">

     <div class="col-md-10 offset-md-1 mt-3 mb-4">

        <div class="row">
            <div id="image-container" class="col-md-6">

                <div id="img-container">
                    <img src="/img/products/{{$product->image}}" class="img-fluid" alt="{{$product->name}}">
                </div>

            </div>

            <div id="info-container" class="col-md-6">
                <h1 class="lotes-title">{{$product->name}}</h1>

                <p class="product-name"> <span class="sobre">Nome Comercial:</span> {{$product->comertial_name}}</p>

                <p class="product-name"><ion-icon class="icon" name="qr-code-outline"></ion-icon> <span class="sobre">Código:</span> {{$product->code}}</p>

                <p class="product-name"><span class="sobre">Data de Criação:</span> {{date('d/m/Y', strtotime($product->created_at))}}</p>

                <p class="product-name"> <span class="sobre">Quantidade:</span> {{$product->quantity}} {{$unit->title}}</p>

                <p class="product-name"><span class="sobre">Variedade Cultivar: </span> 
            
                @if($product->variedade_cultivar == "1")
                    Sim
                @else
                    Não
                @endif
                </p>

                <p class="product-name"><span class="sobre">Status: </span> 
            
                @if($product->status == "1")
                    <span class="ativo">Ativo</span>
                @else
                <span class="inativo">Inativo</span>
                @endif
                </p>

                <div class="mt-5">
                <td class="align-middle">

                      @if($product->status == "1")

                      <a class="marg" href="/products/edit/{{$product->id}}"><button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button></a>

                      @if($batchs != "" && $batchs->products_id && $batchs->products_id == $product->id)
                      <button type="button" onclick="inativarsobre({{$product->id}})" id="inativar" class="btn btn-danger marg">Inativar</button>
                      @else
                      <a href="/products/inativarsobre/{{$product->id}}"><button type="button" id="inativar" class="btn btn-danger marg">Inativar</button></a>
                      @endif
                                 
                      <a  class="marg" href="/batch/create/{{$product->id}}"><button type="button" class="btn btn-success">Cadastrar Lote</button></a>
              
                    @else    
                    <a class="marg" href="/products/ativarsobre/{{$product->id}}"><button type="button" class="btn btn-success">Ativar</button></a>
                    @endif

                         <a href="/products/pdf/{{$product->id}}" class="btn btn-light marg">Gerar PDF</a>

                      </td>

                </div>
            </div>
            <div class="col-md-12 mb-7" id="description-container">
                <h3 class="lotes-title saber mt-4">Sobre o Produto:</h3>
                <p class="product-description">{{$product->description}}</p>
            </div>


      


        </div>
    </div> 
</div>
</div>
</div>
</div>
</div>
    
@endsection