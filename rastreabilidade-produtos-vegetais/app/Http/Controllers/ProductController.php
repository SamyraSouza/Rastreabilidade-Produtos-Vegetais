<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   // $products = "21";

    public function index(){
        return view('index');
    }

    public function create(){
        return view('batchs.cadastrarlote');
    }
}
