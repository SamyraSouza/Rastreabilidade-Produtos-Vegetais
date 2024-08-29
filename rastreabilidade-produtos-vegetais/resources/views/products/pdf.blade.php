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
    
@foreach($data as $product)

<table class="table">              
                <tr>
                <td class="d-flex justify-content-center"><span class="image"><img src="{{ public_path('img/logistica-verde.png') }}" alt="logo" class="imagem-table"></span></td>
                
                <td><span class="linha">Nome: {{$product['name']}}</span></td>
                <td><span class="linha">Nome Comercial: {{$product['comertial_name']}}</span></td>
                
                <tr>  
                <th>Código: {{$product['code']}}</th> 
                <td>Propriedade: </td>  
                <td>Data Emissão:   <span id="data">
                                                @php
                                                    $data_emi = date('d/m/Y');
                                                    echo $data_emi;
                                                @endphp
                                    </span>
                </td>
                
                </tr>

                <tr> 
                <td>Status: @if($product['status'] == 1)Ativo @else Inativo @endif</td>
                <td colspan="2">Cnpj Produtor: </td>                             
                </tr>

                <tr> 
                <td colspan="3">Descrição: {{$product['description']}}</td>                         
                </tr>
 
            </table>

@endforeach

</body>
</html>