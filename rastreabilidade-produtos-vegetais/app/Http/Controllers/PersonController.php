<?php

namespace App\Http\Controllers;

use App\Models\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use App\Notifications\NewContact;
use App\Notifications\Forgot;

use Illuminate\Support\Facades\Notification;


class PersonController extends Controller
{
    public function login(){
        return view('people.login');
    }

    public function check(Request $request){

        $people = Person::WhereNull('permission')->get();
          
        $teste = Person::where([
            ['email', 'like', $request->email]
        ])->where([
            ['senha', 'like', $request->senha]
        ])->first();

        $adm = Person::where([
            ['tipo_perfil', 'like', 'adm']
        ])->first();

        
        if($request->email == $adm->email && $request->senha == $adm->senha){

            $request->session()->put('autenti', true);

            $request->session()->put('autenticado', true);

            $request->session()->put('adm', true);

            return view('/index', ['people' => $people]);
        }
        
        elseif(isset($teste)){

            $request->session()->put('autenti', true);

            $request->session()->put('autenticado', true);

            $request->session()->put('adm', false);

            $request->session()->put('email', $request->email);

            return view('/index',['user' => $teste, 'people' => $people]);

        } else {
            return redirect('/login')->with('msg', 'Email ou senha inválidos.');
        }
    }

    public function negar($id){

        Person::findOrFail($id)->delete();
    
        toast('Pessoa negada com sucesso!','success');
    
        return redirect('/peoples');
    }

    public function logout(Request $request){

        $request->session()->forget('autenticado');  
        
        toast('Você foi deslogado com sucesso!','success');

        return redirect('/');
    }

    public function cadastro(){
        return view('people.cadastro');
    }

    public function mudarimagem($id, Request $request){
        
        $person = Person::findOrFail($id);

            if($request->hasFile('imagem_fundo') && $request->file('imagem_fundo')->isValid()){

                $requestimagem_fundo = $request->imagem_fundo;
                
                $extension = $requestimagem_fundo->extension();
                
                $imagem_fundoName = md5($requestimagem_fundo->getClientOriginalName() . strtotime("now") . "." .$extension);
                
                $request->imagem_fundo->move(public_path('img/perfil'), $imagem_fundoName);
                
                $data['imagem_fundo'] = $imagem_fundoName;
            }
            else{
                $data['imagem_fundo'] = $person->imagem_fundo;
            }

            $person->update($data);

            toast('Foto editada com sucesso!','success');
 
            return redirect('/profile/'.$person->id);
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

              //image aerea perfil
              if($request->hasFile('imagem_perfil') && $request->file('imagem_perfil')->isValid()){

                $requestimagem_perfil = $request->imagem_perfil;
        
                $extension = $requestimagem_perfil->extension();
        
                $imagem_perfilName = md5($requestimagem_perfil->getClientOriginalName() . strtotime("now") . "." .$extension);
        
                $request->imagem_perfil->move(public_path('img/people'), $imagem_perfilName);
        
                $person->imagem_perfil = $imagem_perfilName;
            }
    

        $person->save();

        return redirect('/login')->with('msg-su', 'Cadastro feito com sucesso! Espere o email confimando o seu acesso.');
        
    }

    public function showpeople(){

       $people = Person::WhereNull('permission')->get();

        return view('people.listarpessoa', ['people' => $people]);
    }

    public function email(){

        $email = $_GET['email'];

        header('Content-Type> application/json');

        $people = Person::where('email', $email)->first();

        if($people == ""){

        echo json_encode(0);
       
        }
        else{
        echo json_encode(1);
        
     }
    }

    public function permission($id){

        $person = Person::findOrFail($id);

        $person->permission = 1;

        $senha = rand(1000,100000);

        $person->senha = $senha;
        
        $person->update();

        Notification::route('mail', $person->email)->notify(new NewContact($person)); 
    

        toast('Pessoa permitida com sucesso!','success');
 
        return redirect('/peoples');
     }

     public function esqueceusenha($email){

        $person = Person::where('email', $email)->first();

        if($person == "" || $person->senha == ""){
            return redirect('/login')->with('msg', 'Email não está cadastrado. Faça uma conta!');
        }

        else{

            $senha = rand(1000,100000);

            $person->senha = $senha;
            
            $person->update();

            Notification::route('mail', $person->email)->notify(new Forgot($person));

            return redirect('/login')->with('msg-su', 'Foi enviado um email para você com a nova senha!');
        }
     }
     
    public function senha($senha){

        $email = session('email');

        $person = Person::where('email', $email)->first();

        $person->senha = $senha;

        $person->update();

        toast('Senha modificada com sucesso!','success');

        return redirect('/profile/'.$person->id);

     }

     
    public function showperson($id){

        $user = Person::findOrFail($id);

         return view('people.mostrarpessoa', ['user' => $user]);
     }


    public function update(Person $person, Request $request){
        

        $data = $request->all(['nome', 'email', 'razao_social', 'cpf', 'cnpj', 'cgc', 'nome_fantasia', 'tipo_endereco', 'endereco', 'telefone', 'website', 'tipo_pessoa', 'tipo_perfil']);
        
         //image aerea upload
            if($request->hasFile('imagem_perfil') && $request->file('imagem_perfil')->isValid()){

                $requestimagem_perfil = $request->imagem_perfil;
                
                $extension = $requestimagem_perfil->extension();
                
                $imagem_perfilName = md5($requestimagem_perfil->getClientOriginalName() . strtotime("now") . "." .$extension);
                
                $request->imagem_perfil->move(public_path('img/people'), $imagem_perfilName);
                
                $data['imagem_perfil'] = $imagem_perfilName;
            }
            
                //image mapa upload
            if($request->hasFile('mapa') && $request->file('mapa')->isValid()){

                $requestMapa = $request->mapa;

                $extension = $requestMapa->extension();

                $mapaName = md5($requestMapa->getClientOriginalName() . strtotime("now") . "." .$extension);

                $request->mapa->move(public_path('img/people'), $mapaName);

                $data['mapa'] = $mapaName;
            }

            //image aerea upload
            if($request->hasFile('imagem_aerea') && $request->file('imagem_aerea')->isValid()){

                $requestimagem_aerea = $request->imagem_aerea;
        
                $extension = $requestimagem_aerea->extension();
        
                $imagem_aereaName = md5($requestimagem_aerea->getClientOriginalName() . strtotime("now") . "." .$extension);
        
                $request->imagem_aerea->move(public_path('img/people'), $imagem_aereaName);
        
                $data['imagem_aerea'] = $imagem_aereaName;;
            }

        
        $person->update($data);

        toast('Usuário editado com sucesso!','success');
    
        return redirect('/profile/'.$person->id);
    }
 
}
