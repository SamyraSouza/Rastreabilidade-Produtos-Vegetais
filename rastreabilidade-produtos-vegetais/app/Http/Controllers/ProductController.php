<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Unit;

use App\Models\Batch;

use RealRashid\SweetAlert\Facades\Alert;

use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{

    public function index(){
        return view('index');
    }

    public function showproducts(){
   
        $produto = Product::select('*')->whereIn('id', function($query) {
            $query->select('products_id')->from('batches');
        })->get();

        $search = request('search');

        if($search){

            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['code', 'like', '%'.$search.'%']
            ])->get();

        }else{
             $products = Product::all();
        }       

        $batchs = Batch::all();

        return view('products.listarproduto', ['products' => $products, 'search' => $search,'batchs' => $batchs,'produto' => $produto]);

    }


    public function createproducts(){

        $units = Unit::all();

        return view('products.cadastrarproduto', ['units' => $units]);
        
    }

    public function storeproduct(Request $request){

        $product = new Product;

        $product->name = $request->name;
        $product->comertial_name = $request->comertial_name;
        $product->status = $request->status;
        $product->units_id = $request->units_id;
        $product->quantity = $request->quantity;
        $product->variedade_cultivar = $request->variedade_cultivar ;
        $product->description = $request->description;


        if($request->code){
            $product->code = $request->code;
        }
        else{
            $random = random_int(00000, 99999);

            $product->code = "PRD-" . $random;
        }

        
        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." .$extension);

            $request->image->move(public_path('img/products'), $imageName);

            $product->image = $imageName;
        }

        $product->save();

        toast('Produto criado com sucesso!','success');

        return redirect('/products');

    }

    public function showproduct($id){

       $batch = Batch::where([
            ['products_id', 'like', $id]
        ])->first(); 

        $product = Product::findOrFail($id);

        $unidade = $product->units_id;

        $unit = Unit::findOrFail($unidade);

        return view('products.show', ['product'=>$product, 'unit' => $unit, 'batchs' => $batch]);
        
    }

    public function edit($id){

        $product = Product::findOrFail($id);

        $units = Unit::all();

        $unidade = $product->units_id;

        $unit = Unit::findOrFail($unidade);

        return view('products.edit', ['product'=>$product, 'units' => $units, 'unit'=>$unit]);
    }

    public function update(Request $request){

        Product::findOrFail($request->id)->update($request->all());

        toast('Produto editado com sucesso!','success');

        return redirect('/products');
    }

    public function inativar($id){
 
        $batch = Batch::where([
            ['products_id', 'like', $id]
        ])->first(); 
        
        if($batch != ""){
            
            $batch->status = 0;
            
            $batch->update();
        }

        $product = Product::findOrFail($id);

        $product->status = 0;

        $product->update();

        toast('Produto inativado com sucesso!','success');

        return redirect('/products');

    }

    public function inativarsobre($id){
        
        $batch = Batch::where([
            ['products_id', 'like', $id]
        ])->first(); 
        
        if($batch != ""){
            $batch->status = 0;
            
            $batch->update();
        }

        $product = Product::findOrFail($id);

        $product->status = 0;

        $product->update();

        toast('Produto inativado com sucesso!','success');

        return redirect('/products/'.$id);
    }

    public function ativar($id){

        $product = Product::findOrFail($id);

        $product->status = 1;

        $product->update();

        toast('Produto ativado com sucesso!','success');

        return redirect('/products');
    }

    public function ativarsobre($id){

        $product = Product::findOrFail($id);

        $product->status = 1;

        $product->update();

        toast('Produto ativado com sucesso!','success');

        return redirect('/products/'.$id);
    }

    public function pdf($id){

        $product = Product::findOrFail($id);

        $data =[
            [
                'name' => $product->name,
                'comertial_name' => $product->comertial_name,
                'code' => $product->code,
                'description' => $product->description
            ]
        ];

        $pdf = Pdf::loadView('pdf',['data' => $data]);

        return $pdf->stream();
    }
}
