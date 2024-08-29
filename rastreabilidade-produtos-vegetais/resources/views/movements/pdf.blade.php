<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
    table{
        border-spacing: 0;
        border-collapse: collapse;
        width: 100%;
        padding: 50px;
    }
    td, th{
        border: 1px rgba(90, 90, 90, 0.753) solid;
        padding: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }
    img{
        width: 40%;
        margin-left: 30%;
    }
</style>

<script>
    
</script>
    
@foreach($data as $movement)

<table class="table">              
                <tr>
                <td class="d-flex justify-content-center"><span class="image"><img src="{{ public_path('img/logistica-verde.png') }}" alt="logo" class="imagem-table"></span></td>
                
                <td><span class="linha">Nome: {{$movement['nome']}}</span></td>
                <td><span class="linha">Razão Social: {{$movement['razao_social']}}</span></td>
                
                <tr>  
                <td>{{$movement['tipo_documento']}}: {{$movement['documento']}}</td> 
                <td>{{$movement['tipo_endereco']}}: {{$movement['endereco']}}</td>  
                <td>Data Movimentação: {{$movement['dt_criacao']}}</td>           
                </tr>

                <tr>
                    <td>Tipo movimentação: {{$movement['tipo_movimentacao']}}</td>
                    <td>Data Emissão:   <span id="data">
                        @php
                            $data_emi = date('d/m/Y');
                            echo $data_emi;
                        @endphp
                                        </span>
                    </td>    
                    <td>Quantidade: {{$movement['quantidade']}}</td>
                </tr>

 
            </table>

@endforeach

</body>
</html>