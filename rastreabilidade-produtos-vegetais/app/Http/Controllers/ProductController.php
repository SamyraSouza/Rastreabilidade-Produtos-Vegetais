<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Unit;

use App\Models\Person;

use App\Models\Batch;

use RealRashid\SweetAlert\Facades\Alert;

use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{

    public function index(){

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $people = Person::WhereNull('permission')->get();

        return view('index',  ['people' => $people,'user' => $teste]);
    }

    public function showproducts(){

        $people = Person::WhereNull('permission')->get();
    
        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $produto = Product::select('*')->whereIn('id', function($query) {
            $query->select('products_id')->from('batches');
        })->get();

        
        $person = Person::select('*')->from('people')->get();

        $search = request('search');

        if($search){

            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['code', 'like', '%'.$search.'%']
            ])->paginate(5);

        }else{
             $products = Product::select('*')->from('products')->paginate(5);
        }       

        $batchs = Batch::all();

        return view('products.listarproduto', ['products' => $products, 'search' => $search,'batchs' => $batchs,'produto' => $produto,'user' => $teste, 'pessoa' => $person, 'people' => $people]);

    }

    public function showproduc(){

        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $produto = Product::select('*')->whereIn('id', function($query) {
            $query->select('products_id')->from('batches');
        })->get();

        
        $person = Person::select('*')->from('people')->get();

        $search = request('search');

        if($search){

            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['code', 'like', '%'.$search.'%']
            ])->get();

            foreach($products as $prod){
            $testando = Product::where('id', $prod->id)->where([
                ['people_id', 'like', $teste->id]
            ])->paginate(5);
            }

        }else{
            $testando = Product::select('*')->from('products')->where([
                ['people_id', 'like', $teste->id]
            ])->paginate(5);
        }       

        $batchs = Batch::all();

        return view('products.listarmeuproduto', ['products' => $testando, 'search' => $search,'batchs' => $batchs,'produto' => $produto,'user' => $teste, 'pessoa' => $person, 'people' => $people]);

    }


    public function createproducts(){

        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $units = Unit::all();

        return view('products.cadastrarproduto', ['units' => $units,'user' => $teste, 'people' => $people]);
        
    }

    public function storeproduct(Request $request){

        $teste = Person::select('id')->where([
            ['email', 'like', session('email')]
        ])->first();

        $product = new Product;

        $product->name = $request->name;
        $product->comertial_name = $request->comertial_name;
        $product->status = $request->status;
        $product->units_id = $request->units_id;
        $product->quantity = $request->quantity;
        $product->variedade_cultivar = $request->variedade_cultivar ;
        $product->description = $request->description;
        $product->people_id = $teste->id;


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

        return redirect('/produc');

    }

    public function showproduct($id){

        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

       $batch = Batch::where([
            ['products_id', 'like', $id]
        ])->first();

        $product = Product::findOrFail($id);

        $unidade = $product->units_id;

        $unit = Unit::findOrFail($unidade);

        return view('products.show', ['product'=>$product, 'unit' => $unit, 'batchs' => $batch, 'user' => $teste, 'people' => $people]);
        
    }

    public function edit($id){
        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $product = Product::findOrFail($id);

        $units = Unit::all();

        $unidade = $product->units_id;

        $unit = Unit::findOrFail($unidade);

        return view('products.edit', ['product'=>$product, 'units' => $units, 'unit'=>$unit, 'user'=>$teste, 'people' => $people]);
    }

    public function update($id,Request $request){

        $product = Product::findOrFail($id);

        $data = $request->all();

            if($request->hasFile('image') && $request->file('image')->isValid()){

                $requestImage = $request->image;

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." .$extension);

                $request->image->move(public_path('img/products'), $imageName);
        
                $data['image'] = $imageName;
                }

           $product->update($data);

        toast('Produto editado com sucesso!','success');

        return redirect('/produc');
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

        return redirect('/produc');

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

        return redirect('/produc');
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

        $person = Person::select('*')->where('id', $product->people_id)->first();

        $data =[
            [
                'name' => $product->name,
                'comertial_name' => $product->comertial_name,
                'code' => $product->code,
                'description' => $product->description,
                'status' => $product->status,
                'pessoa' => $person->nome,
                'cnpj' => $person->cnpj
            ]
        ];

        $pdf = Pdf::loadView('products.pdf',['data' => $data]);

        return $pdf->stream();
    }
}