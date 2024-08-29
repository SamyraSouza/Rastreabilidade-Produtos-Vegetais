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
        font-size: 13px;
    }
    img{
        width: 40%;
        margin-left: 30%;
    }
</style>


@foreach($data as $batch)

<table class="table">              
                <tr>
                <td class="d-flex justify-content-center"><span class="image"><img src="{{ public_path('img/logistica-verde.png') }}" alt="logo" class="imagem-table"></span></td>
                
                <th>Código: {{$batch['code']}}</th> 
                <td><span class="linha">Status: @if($batch['status'] == 0) Inativo @else Ativo @endif</span></td>
                
                <tr>  
                <td><span class="linha">Produção ecológica: @if($batch['producao_ecologica'] == 0) Não @else Sim @endif </span></td>
                <td>Produção Sustentável: @if($batch['producao_sustentavel'] == 0) Não @else Sim @endif</td>
                <td>Data Emissão: <span id="data">@php
                                                    $data_emi = date('d/m/Y');
                                                    echo $data_emi;
                                                @endphp
                    </span></td>
                
                </tr>

                <tr> 
                <td colspan="3">Cnpj Produtor: </td>                             
                </tr>
 
            </table>

@endforeach

</body>
</html>