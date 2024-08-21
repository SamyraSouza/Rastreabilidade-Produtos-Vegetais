<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Batch;

use App\Models\Product;

class BatchController extends Controller
{


    public function createbatchsid($id){

        $batchs = Batch::all();

        $productchoose = Product::findOrFail($id);

        $products = Product::select('*')->whereNotIn('id', function($query) {
            $query->select('products_id')->from('batches');
        })->get();

        return view('batchs.cadastrarlote', ['products' => $products, 'batchs' => $batchs, 'productchoose' => $productchoose]);
        
    }

    public function createbatchs(){

        $batchs = Batch::all();


        $products = Product::select('*')->whereNotIn('id', function($query) {
            $query->select('products_id')->from('batches');
        })->get();

        return view('batchs.cadastrarlotes', ['products' => $products, 'batchs' => $batchs]);
        
    }

    public function storebatch(Request $request){

        $batch = new Batch;

        $batch->status = $request->status;
        $batch->products_id = $request->products_id;
        $batch->dt_producao = $request->dt_producao;
        $batch->dt_validade = $request->dt_validade;
        $batch->producao_ecologica = $request->producao_ecologica;
        $batch->producao_sustentavel = $request->producao_sustentavel;


        if($request->code){
            $batch->code = $request->code;
        }
        else{
            $random = random_int(00000, 99999);

            $batch->code = "PRD-" . $random;
        }

        $batch->save();

        toast('Lote criado com sucesso!','success');

        return redirect('/batchs');

}

public function showbatchs(){

    $search = request('search');

    if($search){

        $batchs = Batch::where([
            ['code', 'like', '%'.$search.'%']
        ])->get();

    }else{
        $batchs = Batch::all();
    }       

    $products = Product::all();

    return view('batchs.listarlote', ['batchs' => $batchs,'products' => $products, 'search' => $search]);

}

public function edit($id){

    $batchs = Batch::findOrFail($id);

    $produto = $batchs->products_id;

    $product = Product::findOrFail($produto);

    return view('batchs.edit', ['batchs'=> $batchs, 'product' => $product]);
}

public function update(Request $request){

    Batch::findOrFail($request->id)->update($request->all());

    toast('Lote editado com sucesso!','success');

    return redirect('/batchs');
}

public function showbatch($id){

    $batch = Batch::findOrFail($id);

    $produto = $batch->products_id;

    $product = Product::findOrFail($produto);

    $products = Product::all();

    return view('batchs.show', ['product'=>$product, 'batch' => $batch,'products' => $products]);
    
}

public function inativar($id){

    $batch = Batch::findOrFail($id);

    $batch->status = 0;

    $batch->update();

    toast('Lote inativado com sucesso!','success');

    return redirect('/batchs');
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

    return redirect('/batchs');
}

public function ativarsobre($id){

    $batch = Batch::findOrFail($id);

    $batch->status = 1;

    $batch->update();

    toast('Lote ativado com sucesso!','success');

    return redirect('/batch/'.$id);
}

}