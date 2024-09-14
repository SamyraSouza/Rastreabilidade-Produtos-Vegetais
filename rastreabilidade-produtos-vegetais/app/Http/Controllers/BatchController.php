<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Batch;

use App\Models\Product;

use App\Models\Person;

use RealRashid\SweetAlert\Facades\Alert;

use Barryvdh\DomPDF\Facade\Pdf;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\Storage;

class BatchController extends Controller
{
    public function createbatchsid($id){

        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $batchs = Batch::all();

        $productchoose = Product::findOrFail($id);

        $products = Product::all();

        return view('batchs.cadastrarlote', ['products' => $products, 'batchs' => $batchs, 'productchoose' => $productchoose, 'user' => $teste, 'people' => $people]);
        
    }

    public function createbatchs(){

    $people = Person::WhereNull('permission')->get();
        
    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

        $batchs = Batch::all();

        if(session('adm') == true){

            $products = Product::all();

        }else{

        $products = Product::where([
            ['people_id', 'like', $teste->id]
        ])->get();

        }

        return view('batchs.cadastrarlotes', ['products' => $products, 'batchs' => $batchs, 'user' => $teste, 'people' => $people]);
        
    }

    public function storebatch(Request $request){

        $teste = Person::select('id')->where([
            ['id', 'like', 'people']
        ])->first();

        
        $person = Person::select('*')->whereIn('id', function($query) {
            $query->select('people_id')->from('products');
        })->first();


        $batch = new Batch;

        $batch->status = $request->status;
        $batch->products_id = $request->products_id;
        $batch->dt_producao = $request->dt_producao;
        $batch->dt_validade = $request->dt_validade;
        $batch->producao_ecologica = $request->producao_ecologica;
        $batch->producao_sustentavel = $request->producao_sustentavel;
        $batch->people_id = $person->id;

        

        if($request->code){
            $batch->code = $request->code;
        }
        else{
            $random = random_int(00000, 99999);
            
            $batch->code = "LOT-" . $random;

            $checar = Batch::where('code', $batch->code)->first();           
           

            while($checar != ""){

                $random = random_int(00000, 99999);
                
                $batch->code = "LOT-" . $random;

                $checar = Batch::where('code', $random)->first();
                
            }
    }

            $qrcode = QrCode::format('svg')->size(200)->generate('127.0.0.1:8000/rastreio?search='.$batch->code);

            $filePath = 'img/'.$batch->code.'.svg';

            Storage::disk('public')->put($filePath, $qrcode);
            
            $batch->qrcode = $filePath;

        $batch->save();

        toast('Lote criado com sucesso!','success');


        if(session('adm') == true){
        return redirect('/batchs');
        }else{
        return redirect('/batc');
}
}


public function showbatchs(){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

    $search = request('search');

    if($search){

        $batchs = Batch::where([
            ['code', 'like', '%'.$search.'%']
        ])->paginate(5);

    }else{
        $batchs = Batch::select('*')->from('batches')->paginate(5);
    }       

    $products = Product::all();

    return view('batchs.listarlote', ['batchs' => $batchs,'products' => $products, 'search' => $search,'user' => $teste, 'people' => $people]);

}

public function showbatc(){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

    $search = request('search');

    if($search){

        $batchs = Batch::where([
            ['code', 'like', '%'.$search.'%']
        ])->where([
            ['people_id', 'like', $teste->id]
        ])->paginate(5);

    }else{
        $batchs = Batch::select('*')->from('batches')->where([
            ['people_id', 'like', $teste->id]
        ])->paginate(5);
    }       

    $products = Product::all();

    return view('batchs.listarmeulote', ['batchs' => $batchs,'products' => $products, 'search' => $search,'user' => $teste, 'people' => $people]);

}

public function edit($id){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

    $batchs = Batch::findOrFail($id);

    $produto = $batchs->products_id;

    $product = Product::findOrFail($produto);

    return view('batchs.edit', ['batchs'=> $batchs, 'product' => $product, 'user' => $teste, 'people' => $people]);
}

public function update(Request $request){

    Batch::findOrFail($request->id)->update($request->all());

    toast('Lote editado com sucesso!','success');

    return redirect('/batc');
}

public function showbatch($id){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

    $batch = Batch::findOrFail($id);

    $produto = $batch->products_id;

    $product = Product::findOrFail($produto);

    $products = Product::all();

    return view('batchs.show', ['product'=>$product, 'batch' => $batch,'products' => $products,'user' => $teste, 'people' => $people]);
    
}

public function inativar($id){

    $batch = Batch::findOrFail($id);

    $batch->status = 0;

    $batch->update();

    toast('Lote inativado com sucesso!','success');

    return redirect('/batc');
}

public function inativarsobre($id){

    $batch = Batch::findOrFail($id);

    $batch->status = 0;

    $batch->update();

    toast('Lote inativado com sucesso!','success');

    return redirect('/batch/'.$id);
}

public function ativar($id){


        $batch = Batch::findOrFail($id);

        $produto = $batch->products_id;
        
        $product = Product::findOrFail($produto);
        
        $product->status = 1;
        
        $product->update();

        $batch->status = 1;

        $batch->update();

        toast('Lote ativado com sucesso!','success');

    return redirect('/batc');
}

public function ativarsobre($id){

    $batch = Batch::findOrFail($id);

    $batch->status = 1;

    $batch->update();

    toast('Lote ativado com sucesso!','success');

    return redirect('/batch/'.$id);
}

public function code(){

    $code = $_GET['code'];

    header('Content-Type> application/json');

    $code = Batch::where('code', $code)->first();

    if($code == ""){

    echo json_encode("n");
   
    }
    else{
    echo json_encode($code->id);
    
 }
}

public function pdf($id){

    $batch = Batch::findOrFail($id);

    $pessoa = Person::select('*')->where('id', $batch->people_id)->first();

  
    $qrcode = QrCode::size(200)->generate('127.0.0.1:800/rastreio?search='.$batch->code);
        

    $data =[
        [
            'code' => $batch->code,
            'dt_producao' => $batch->cdt_producao,
            'dt_validade' => $batch->dt_validade,
            'producao_ecologica' => $batch->producao_ecologica,
            'producao_sustentavel' => $batch->producao_sustentavel,
            'status' => $batch->status,
            'cnpj' => $pessoa->cnpj,
            'qrcode' => $batch->qrcode
        ]
    ];

   
    $pdf = Pdf::loadView('batchs.pdf',['data' => $data]);

    return $pdf->stream();
}

}