@extends('layouts.main')

@section('title', 'Cadastro Produto')

@section('content')

<div id="product-create-container" class="col-md-6 offset-md-3">
    <h1 class="lotes-title">Cadastre Seu Produto</h1>

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="mt-5" for="image">Imagem do produto:</label>
           <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label class="mt-3" for="code">Código:</label>
            <div class="d-flex">
                <input type="code" class="form-control" name="code" id="code" placeholder="XXX-00000">
                <button type="button" onCLick="aleatorio()" class="btn btn-light"><img src="/img/produto-de-codigo-de-barras.png" alt=""></button>
            </div>
        </div>

        <div class="form-group">
            <label class="mt-3" for="name">Nome:</label>
            <input required type="text" class="form-control" name="name" id="name" placeholder="Nome do produto">
        </div>

        <div class="form-group">
            <label class="mt-3" for="comertial_name">Nome comercial:</label>
            <input type="text" class="form-control" name="comertial_name" id="comertial_name" placeholder="Nome comercial do produto">
        </div>


        <div class="form-group">
            <label class="mt-3" for="status">Status:</label>
           <select name="status" id="status" class="form-control">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
           </select>      
        </div>

        <div class="form-group">
            <label class="mt-3" for="variedade_cultivar">O produto é variedade cultivar?</label>
           <select name="variedade_cultivar" id="variedade_cultivar" class="form-control">
            <option value="1">Sim</option>
            <option value="0">Não</option>
           </select>      
        </div>

        <div class="form-group">
            <label class="mt-3" for="description">Descrição:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Descrição do produto"></textarea>
        </div>

        <div class="form-group">
            <label for="unit" class="mt3"></label>

            <select name="unit" id="unit" class="form-control">
            @foreach($units as $unit)
                <option value="{{$unit->id}}">{{$unit->title}}</option>
            @endforeach
           </select>     

        </div>

        <input type="submit" class="btn btn-success mt-5 mb-5" value="Criar Produto">
    </form>
</div>

@endsection