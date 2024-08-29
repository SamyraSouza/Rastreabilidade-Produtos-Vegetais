<?php

namespace App\Http\Controllers;

use App\Models\Person;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use App\Notifications\NewContact;

use Illuminate\Support\Facades\Notification;


class PersonController extends Controller
{
    public function login(){
        return view('people.login');
    }

    public function check(Request $request){
          
        $teste = Person::where([
            ['email', 'like', $request->email]
        ])->where([
            ['senha', 'like', $request->senha]
        ])->get();

        if($request->email == "adm@gmail.com" && $request->senha == "1234"){

            $request->session()->put('autenticado', true);

            $request->session()->put('adm', true);

            return redirect('/index');
        }
        elseif(count($teste)>0){

            $request->session()->put('autenticado', true);

            $request->session()->put('email', $request->email);

            return redirect('/index');

        } else {
            return redirect('/')->with('msg', 'Email ou senha inválidos.');
        }
    }

    public function logout(Request $request){

        $request->session()->forget('autenticado');      

        return redirect('/')->with('msg-success', 'Você foi deslogado com sucesso!');
    }

    public function cadastro(){
        return view('people.cadastro');
    }

    public function storeperson(Request $request){

        $person = new Person;

        $person->nome =$request->nome;
        $person->razao_social =$request->razao_social;
        $person->tipo_endereco =$request->tipo_endereco;
        $person->endereco =$request->endereco;
        $person->email =$request->email;
        $person->cpf =$request->cpf;
        $person->cnpj =$request->cnpj;
        $person->cgc =$request->cgc;
        $person->nome_fantasia =$request->nome_fantasia;
        $person->tipo_pessoa =$request->tipo_pessoa;
        $person->telefone =$request->telefone;
        $person->website =$request->website;
        $person->tipo_perfil =$request->tipo_perfil;

       //image mapa upload
       if($request->hasFile('mapa') && $request->file('mapa')->isValid()){

        $requestMapa = $request->mapa;

        $extension = $requestMapa->extension();

        $mapaName = md5($requestMapa->getClientOriginalName() . strtotime("now") . "." .$extension);

        $request->mapa->move(public_path('img/people'), $mapaName);

        $person->mapa = $mapaName;
    }

         //image aerea upload
         if($request->hasFile('imagem_aerea') && $request->file('imagem_aerea')->isValid()){

            $requestimagem_aerea = $request->imagem_aerea;
    
            $extension = $requestimagem_aerea->extension();
    
            $imagem_aereaName = md5($requestimagem_aerea->getClientOriginalName() . strtotime("now") . "." .$extension);
    
            $request->imagem_aerea->move(public_path('img/people'), $imagem_aereaName);
    
            $person->imagem_aerea = $imagem_aereaName;
        }

              //image aerea upload
              if($request->hasFile('imagem_perfil') && $request->file('imagem_perfil')->isValid()){

                $requestimagem_perfil = $request->imagem_perfil;
        
                $extension = $requestimagem_perfil->extension();
        
                $imagem_perfilName = md5($requestimagem_perfil->getClientOriginalName() . strtotime("now") . "." .$extension);
        
                $request->imagem_perfil->move(public_path('img/people'), $imagem_perfilName);
        
                $person->imagem_perfil = $imagem_perfilName;
            }
    

        $person->save();

        return redirect('/')->with('msg-success', 'Cadastro feito com sucesso! Espere o email confimando o seu acesso.');
        
    }

    public function showpeople(){

       $people = Person::WhereNull('permission')->get();

        return view('people.listarpessoa', ['people' => $people]);
    }

    public function permission($id){

        $person = Person::findOrFail($id);

        $person->permission = 1;

        $person->update();

        toast('Pessoa permitida com sucesso!','success');
 
         return redirect('/peoples');
     }
}
