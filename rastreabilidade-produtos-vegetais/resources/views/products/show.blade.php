@extends('layouts.main')

@section('title', $product->name)

@section('content')


     <div class="col-md-10 offset-md-1">

        <div class="row">
            <div id="image-container" class="col-md-6">

                <div id="info-container">
                    <img src="/img/products/{{$product->image}}" class="img-fluid" alt="{{$product->name}}">
                </div>

            </div>

            <div id="info-container" class="col-md-6">
                <h1 class="lotes-title">{{$product->name}}</h1>

                <p class="product-name marg"><ion-icon class="icon" name="leaf-outline"></ion-icon> <span class="sobre">Nome Comercial:</span> {{$product->comertial_name}}</p>

                <p class="product-name"><ion-icon class="icon" name="qr-code-outline"></ion-icon> <span class="sobre">Código:</span> {{$product->code}}</p>

                <p class="product-name"><ion-icon class="icon" name="triangle-outline"></ion-icon> <span class="sobre">Quantidade:</span> {{$product->quantity}} {{$unit->title}}</p>

                <p class="product-name"><ion-icon class="icon" name="flower-outline"></ion-icon> <span class="sobre">Variedade Cultivar: </span> 
            
                @if($product->variedade_cultivar == "1")
                    Sim
                @else
                    Não
                @endif
                </p>

                <p class="product-name"><ion-icon name="arrow-forward-outline"></ion-icon> <span class="sobre">Status: </span> 
            
                @if($product->variedade_cultivar == "1")
                    <span class="ativo">Ativo</span>
                @else
                <span class="inativo">Inativo</span>
                @endif
                </p>

                
            </div>
            <div class="col-md-12" id="description-container">
                <h3 class="lotes-title">Sobre o Produto:</h3>
                <p class="product-description">{{$product->description}}</p>
            </div>
        </div>
    </div> 
    
@endsection