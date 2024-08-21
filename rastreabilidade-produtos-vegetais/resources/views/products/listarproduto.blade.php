@extends('layouts.main')

@section('title', 'Listar Produtos')

@section('page', 'Listar Produtos')

@section('content')


<!-- BARRA DE BUSCAS -->

    <div class="input-group mb-3 d-flex justify-content-center">
    <form class="d-flex justify-content-center wid mt-4" action="/products" method="GET">
        <input type="text" class="form-control" name="search" placeholder="Procurar por produto">
        <button class="btn btn-outline-success mb-0" type="submit" id="button-addon2">Buscar</button>
    </form>
    </div>


<div class="container-fluid py-4 mt-7">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabela de Produtos</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Código</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descrição</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>


                  <tbody>
                  @foreach($products as $product)
                   @if($product->status == "1")
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->code}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">

                     
                        <span class="badge badge-sm bg-gradient-success">Ativo</span>
                     
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->description}}</span>
                      </td>
                      <td class="align-middle">
                      <a href="/products/{{$product->id}}"><button type="button" class="btn btn-info">Saiba Mais</button></a>
                    
                      <a href="#"><button type="button" class="btn btn-success">Solicitar Lote</button></a>
                     
                      </td>
                    </tr> 
                    @endif
                    @endforeach

                    @foreach($products as $product)
                   @if($product->status != "1")
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$product->code}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">

                     
                        <span class="badge badge-sm bg-gradient-danger">Inativo</span>
                     
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$product->description}}</span>
                      </td>
                      <td class="align-middle">
                      <a href="/products/{{$product->id}}"><button type="button" class="btn btn-info">Saiba Mais</button></a>
                     
                      </td>
                    </tr> 
                    @endif
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection