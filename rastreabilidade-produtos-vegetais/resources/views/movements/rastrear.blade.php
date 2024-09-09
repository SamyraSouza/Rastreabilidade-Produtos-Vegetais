@extends('layouts.main')

@section('title', 'Rastreio')

@section('page', 'Rastrear Lotes')

@section('content')


<div class="container-fluid py-4 mt-7">

@if(session('msg'))
    <div class="alert alert-success" role="alert">
        <span class="light">{{session('msg')}}</span> 
    </div>
@endif

<div class="row mb-4" style="display: flex; width:100%;">
  <div class="card mb-4" style=" width:100%;">
    <div class="card-header pb-4">

<div class="col-md-20 mt-3 mb-3">
<label for="search"><h1>Digite o Código do Lote Aqui</h1></label>
<div class="input-group mb-3">
<form class="d-flex justify-content-center mt-4" action="/rastreio" method="GET">
<input style=" width:100%;" type="text" class="form-control" placeholder="Código do Lote" name="search" id="search" aria-describedby="button-addon2">
<form>
<button class="btn btn-outline-primary mb-0" type="submit" id="button-addon2">Rastrear</button>
</div>

<hr style="border: 1px solid rgb(126, 126, 126)">

@if($batchs !="")
<div class="card-body px-0 pt-0 pb-2">
<div class="table-responsive p-0">
<table class="table align-items-center mb-0">
<thead>
  <tr>
    <th colspan=4 class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ps-2">Dados Lote</th>
  </tr>
  <tr>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produto - Código</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código Lote</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data Produção</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data Validade</th>
  </tr>
</thead>

<tbody>

  <tr>
    <td class="text-center">{{ $product->name}} - {{ $product->code }}</td>
    <td class="text-center">{{ $batchs->code}}</td>
    <td class="text-center">{{ $producao}}</td>
    <td class="text-center">{{ $validade }}</td>
  </tr>

</tbody>
</table>

<hr style="border: 1px solid rgb(126, 126, 126)" class="mt-5">
<table class="table align-items-center mb-0">
<thead>
  <tr>  
    <th colspan=7 class="text-uppercase text-center text-secondary text-xxs font-weight-bolder ps-2">Dados Movimentação</th>
  </tr>
  <tr>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pessoa Responsável</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantidade</th>            
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Documento</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Razão Social</th>
    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Endereço / Tipo de endereço</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo Movimentação</th>
    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data Movimentação</th>
  </tr>
</thead>

<tbody>
  @foreach($movements as $movement)
  <tr>
    <td class="text-center">{{ $movement->nome}}</td>
    <td class="text-center">{{ $movement->quantidade}}</td>
    <td class="text-center">{{ $movement->documento}}</td>
    <td class="text-center">{{ $movement->razao_social }}</td>
    <td class="text-center">{{ $movement->endereco }} / {{ $movement->tipo_endereco }}</td>
    <td class="text-center">{{ $movement->tipo_movimentacao }}</td>
    <td class="text-center">{{ $movement->created_at->format('d/m/Y H:i') }}</td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
</div>

@endif

</div>
</div> 

</div>
</div>

</div>

@endsection