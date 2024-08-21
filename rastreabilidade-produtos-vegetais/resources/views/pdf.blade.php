<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
@foreach($data as $product)

<table class="table">              
                <tr>
                <td class="d-flex justify-content-center"><span class="linha"><img src="{{asset('img/logistica-verde.png')}}" alt="logo" class="imagem-table"></span></td>
                
                <td><span class="linha">Nome: {{$product['name']}}</span></td>
                <td><span class="linha">Nome Comercial: {{$product['comertial_name']}}</span></td>
                
                <tr>  
                <th>Código: {{$product['code']}}</th> 
                <td>Propriedade: </td>  
                <td>Data Emissão: <span id="data"></span></td>
                
                </tr>

                <tr> 
                <td>Status: Ativo</td>
                <td colspan="2">Cnpj Produtor: </td>                             
                </tr>

                <tr> 
                <td colspan="3">Descrição: {{$product['description']}}</td>                         
                </tr>
 
                <tr></tr>
            </table>

@endforeach

</body>
</html>