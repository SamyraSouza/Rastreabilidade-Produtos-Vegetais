<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{

    public function index(){
        return view('index');
    }


    public function showproducts(){

        $products = Product::all();

        return view('products.listarproduto', ['products' => $products]);
    }

    public function createproducts(){

        return view('products.cadastrarproduto');
        
    }

    public function storeproduct(Request $request){

        $product = new Product;

        $product->name = $request->name;
        $product->comertial_name = $request->comertial_name;
        $product->status = $request->status;
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

        return redirect('/products')->with('msg', 'Produto criado com sucesso!');

    }

    public function showproduct($id){

        $product = Product::findOrFail($id);

        return view('products.show', ['product'=>$product]);
        
    }

}
