@extends('layouts.main')

@section('title', 'Listar Movimentações')

@section('page', 'Movimentações')

@section('content')

<!-- BARRA DE BUSCAS -->



  <div class="container-fluid py-4 mt-7">
    @if(session('msg'))
    <div class="alert alert-success" role="alert">
       <span class="light">{{session('msg')}}</span> 
    </div>
      @endif
    
    

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabela de Movimentações</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código Lote</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pessoa Responsável</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Razão Social</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Documento / Tipo de documento</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Endereço / Tipo de endereço</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo Movimentação</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantidade</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($movements as $movement) 
                    <tr>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0">

                        @foreach($batchs as $batch)
                              @if($batch->id == $movement->batches_id)
                               {{$batch->code}}
                              @endif         
                        @endforeach
                        </p>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movement->nome }}</span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movement->razao_social }}</span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movement->documento }} / {{ $movement->tipo_documento }}</span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movement->endereco }} - ({{ $movement->tipo_endereco }})</span>
                      </td>

                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movement->tipo_movimentacao }}</span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $movement->quantidade }}</span>
                      </td>

                      <td class="align-middle">
                      
                      <a class="marg" href="/movement/edit/{{$movement->id}}"><button type="button" class="btn btn-info"><i class="fa fa-edit"></i></button></a>

                      <button onclick="deletarmovimentacao({{$movement->id}})" type="button" class="btn btn-danger marg"><i class="fa fa-trash"></i></button>

                      <a href="/movements/pdf/{{$movement->id}}" class="btn btn-light marg">Gerar PDF</a>
                      </td>
                      
                    </tr> 
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>{{ $movements->links()}}
        </div>
      </div>

@endsection