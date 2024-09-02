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

      <div class="row" style="display: flex; width:1500px; margin-left:50px;">
          <div class="card mb-4" style=" width:100%;">
            <div class="card-header pb-4">

     <div class="col-md-20 mt-3 mb-3">
       <label for="search"><h1>Digite o Código do Lote Aqui</h1></label>
       <div class="input-group mb-3">
        <form class="d-flex justify-content-center wid mt-4" action="/movements/rastrear" method="GET">
        <input type="text" class="form-control" placeholder="Código do Lote" name="search" id="search" aria-describedby="button-addon2">
        <form>
        <button class="btn btn-outline-primary mb-0" type="submit" id="button-addon2">Rastrear</button>
      </div>

       <hr style="border: 1px solid rgb(126, 126, 126)">

       @if($batchs !="")
       <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código Lote</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pessoa Responsável</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Endereço / Tipo de endereço</th>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo Movimentação</th>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data Movimentação</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="text-center">{{ $batchs->code }}</td>
            <td class="text-center">{{ $movements->nome }}</td>
            <td class="text-center">{{ $movements->endereco }} - {{ $movements->tipo_endereco }}</td>
            <td class="text-center">{{ $movements->tipo_movimentacao }}</td>
            <td class="text-center">{{ $data }}</td>
          </tr>
        </tbody>
       </table>
       @endif
    </div>
    </div> 
</div>
</div>
</div>

@endsection