@extends('layouts.main')

@section('title', $product->name)

@section('page', 'Ver Lote - '.$product->name)

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

        <div class="row mb-6">
            <div id="image-container" class="col-md-6">

                <div id="img-container">
                    <img src="/img/products/{{$product->image}}" class="img-fluid" alt="{{$product->name}}">
                </div>

            </div>

            <div id="info-container" class="col-md-6">
                <h1 class="lotes-title mb-5">{{$batch->code}}</h1>

                <p class="product-name"><span class="sobre">  Produto:</span> {{$product->name}}</p>

                <p class="product-name"><ion-icon class="icon" name="qr-code-outline"></ion-icon><span class="sobre">  Código do produto:</span> {{$product->code}}</p>

                <p class="product-name"> <span class="sobre">  Data de Produção:</span> {{date('d/m/Y', strtotime($batch->dt_producao))}}</p>

                <p class="product-name"> <span class="sobre">  Data de Validade:</span> {{date('d/m/Y', strtotime($batch->dt_validade))}}</p>

                <p class="product-name"> <span class="sobre">Produção Ecológica: </span> 
            
                @if($batch->producao_ecologica == "1")
                    Sim
                @else
                    Não
                @endif
                </p>

                <p class="product-name"><span class="sobre"> Produção Sustentável: </span> 
            
                @if($batch->producao_sustentavel == "1")
                    Sim
                @else
                    Não
                @endif
                </p>

                <p class="product-name"><span class="sobre"> Status: </span> 
            
                @if($batch->status == "1")
                    <span class="ativo">Ativo</span>
                @else
                <span class="inativo">Inativo</span>
                @endif
                </p>

                <p class="product-name"> <span class="sobre">  Data de Criação:</span> {{date('d/m/Y', strtotime($batch->created_at))}}</p>

               
                <div class="mt-5">
                <td class="align-middle">
                 @if($batch->people_id == $user->id || session('adm') == true)
                      @if($batch->status == "1")

                      <a class="marg text-secondary font-weight-bold text-center" href="/batch/edit/{{$batch->id}}"><i class="fa fa-edit"></i></a>

                      <a class="marg text-danger font-weight-bold text-center" href="/batchs/inativarsobre/{{$batch->id}}">Inativar</a>

                      <a class="marg text-success font-weight-bold text-center" href="/movement/create/{{$batch->id}}">Cadastrar Movimentação<a> 
                 
                    @else    
                    
                    @foreach($products as $product)
                      @if($product->id == $batch->products_id && $product->status == "0")
                      <a type="button" onclick="ativarsobre({{$batch->id}})" class="marg text-success font-weight-bold text-center">Ativar Lote</a>    
                      @elseif($product->id == $batch->products_id && $product->status == "1")
                     <a href="/batchs/ativarsobre/{{$batch->id}}" class="marg text-success font-weight-bold text-center">Ativar Lote</a>  
                      @endif                                          
                      @endforeach

                    @endif
                        @endif
                         <a href="/batchs/pdf/{{$batch->id}}" class="marg text-secondary font-weight-bold text-center">Gerar PDF</a>

                      </td>

                </div>
            </div>
        </div>
    </div> 
</div>
</div>
</div>
</div>
</div >
    
@endsection