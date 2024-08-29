@extends('layouts.main')

@section('title', 'Produtos')

@section('page', 'Produtos')

@section('content')

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
              <h6>Tabela de Produtos</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CPF</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Endereço</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>


                  <tbody>

                    @if(count($people) == 0)
                    <tr>
                      <td colspan="6">
                          <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm text-center mt-3 mb-3">Não há pessoa pedindo permissão</h6>
                      </div>
                  </td>
                </td>
                    </tr>
                    @endif
                    @foreach ($people as $person)
                      
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$person->nome}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$person->cpf}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">

                     
                        <p class="text-xs font-weight-bold mb-0">{{$person->email}}</p>
                     
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">{{$person->endereco}}</p>
                      </td>

                      <td class="align-middle">       

                        <a class="marg" href="/permission/{{ $person->id }}"><button type="button" class="btn btn-success">Permitir Acesso</button></a>
                               
                      </td>
                    </tr> 
                @endforeach
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection