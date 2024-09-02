<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Batch;

use App\Models\Product;

use App\Models\Person;

use App\Models\Movement;

use Barryvdh\DomPDF\Facade\Pdf;

class MovementController extends Controller
{

    public function createmovementbatch($id){

        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $movements = Movement::all();

        $batchchoose = Batch::findOrFail($id);

        $batchs = Batch::all();

        return view('movements.cadastrarmovimentacaolote', ['batchs' => $batchs, 'batchs' => $batchs, 'batchchoose' => $batchchoose, 'user' => $teste, 'people' => $people]);
        
    }

    public function createmovements(){

        $people = Person::WhereNull('permission')->get();

        $teste = Person::where([
            ['email', 'like', session('email')]
        ])->first();

        $movements = Movement::all();

        $batchs = Batch::all();

        return view('movements.cadastrarmovimentacao', ['movements' => $movements, 'batchs' => $batchs, 'user' => $teste, 'people' => $people]);
        
    }


    public function storemovement(Request $request){

        $teste = Person::select('id')->where([
            ['email', 'like', session('email')]
        ])->first();

        $movement = new Movement;


        $movement->nome =$request->nome;
        $movement->razao_social =$request->razao_social;
        $movement->tipo_documento =$request->tipo_documento;
        $movement->documento =$request->documento;
        $movement->tipo_endereco =$request->tipo_endereco;
        $movement->tipo_movimentacao =$request->tipo_movimentacao;
        $movement->endereco =$request->endereco;
        $movement->quantidade =$request->quantidade;
        $movement->batches_id =$request->batches_id;
        $movement->people_id =$teste->id;

        $movement->save();

        toast('Movimentação criada com sucesso!','success');

        return redirect('/movem');

}

public function showmovements(){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

        $batchs = Batch::all();

        $movements = Movement::select('*')->from('movements')->paginate(5);

    return view('movements.listarmovimentacao', ['batchs' => $batchs, 'movements'=>$movements, 'user' => $teste,'people' => $people])->withoutMiddleware([AutenticacaoMiddleware::class]);

}

public function showmovem(){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

        $batchs = Batch::all();

        $movements = Movement::select('*')->from('movements')->where([ ['people_id', 'like', $teste->id] ])->paginate(5);

    return view('movements.listarminhamovimentacao', ['batchs' => $batchs, 'movements'=>$movements, 'user' => $teste, 'people' => $people])->withoutMiddleware([AutenticacaoMiddleware::class]);

}

public function edit($id){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

    $movement = Movement::findOrFail($id);

    $lote = $movement->batches_id;

    $batchs = Batch::findOrFail($lote);

    return view('movements.edit', ['batchs'=> $batchs, 'movement' => $movement, 'user' => $teste, 'people' => $people]);
}


public function update(Request $request){

    Movement::findOrFail($request->id)->update($request->all());

    toast('Movimentação editada com sucesso!','success');

    return redirect('/movem');
}

public function destroy($id){

    Movement::findOrFail($id)->delete();

    toast('Movimentação excluída com sucesso!','success');

    return redirect('/movem');
}

public function pdf($id){

    $movement = Movement::findOrFail($id);

    $data =[
        [
            'nome' => $movement->nome,
            'razao_social' => $movement->razao_social,
            'documento' => $movement->documento,
            'endereco' => $movement->endereco,
            'tipo_documento' => $movement->tipo_documento,
            'tipo_movimentacao' => $movement->tipo_movimentacao,
            'tipo_endereco' => $movement->tipo_endereco,
            'quantidade' => $movement->quantidade,
            'dt_criacao' => $movement->created_at
        ]
    ];

    $pdf = Pdf::loadView('movements.pdf',['data' => $data]);

    return $pdf->stream();
}

public function rastrear(){

    $people = Person::WhereNull('permission')->get();

    $teste = Person::where([
        ['email', 'like', session('email')]
    ])->first();

    $search = request('search');

    if($search){

        $batchs = Batch::WhereIn('id', function($query) {
            $query->select('batches_id')->from('movements');
        })->where([ ['code', 'like', '%'.$search.'%']])->first();

        if($batchs != ""){
        $movements = Movement::where('batches_id', $batchs->id)->orderByDesc('created_at')->first();
              
        if($movements != ""){
        $data = $movements->created_at;
        
        $data = date('d/m/Y H:i');
        } 
    } else{
        $movements = "";
        $data = "";
        toast('Não há lotes em movimentação com esse código','error');
    }

    }else{
        $batchs = "";
        $movements = "";
        $data = "";
    }
        return view('movements.rastrear', ['batchs'=> $batchs, 'movements' => $movements, 'data' => $data, 'user' => $teste, 'people' => $people]);
}

}