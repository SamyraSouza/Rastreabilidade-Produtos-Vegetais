<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Batch;

use App\Models\Product;

use App\Models\Movement;

use Barryvdh\DomPDF\Facade\Pdf;

class MovementController extends Controller
{

    public function createmovementbatch($id){

        $movements = Movement::all();

        $batchchoose = Batch::findOrFail($id);

        $batchs = Batch::all();

        return view('movements.cadastrarmovimentacaolote', ['batchs' => $batchs, 'batchs' => $batchs, 'batchchoose' => $batchchoose]);
        
    }

    public function createmovements(){

        $movements = Movement::all();

        $batchs = Batch::all();

        return view('movements.cadastrarmovimentacao', ['movements' => $movements, 'batchs' => $batchs]);
        
    }


    public function storemovement(Request $request){

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

        $movement->save();

        toast('Movimentação criada com sucesso!','success');

        return redirect('/movements');

}

public function showmovements(){

        $batchs = Batch::all();

        $movements = Movement::select('*')->from('movements')->paginate(5);

    return view('movements.listarmovimentacao', ['batchs' => $batchs, 'movements'=>$movements])->withoutMiddleware([AutenticacaoMiddleware::class]);

}

public function edit($id){

    $movement = Movement::findOrFail($id);

    $lote = $movement->batches_id;

    $batchs = Batch::findOrFail($lote);

    return view('movements.edit', ['batchs'=> $batchs, 'movement' => $movement]);
}


public function update(Request $request){

    Movement::findOrFail($request->id)->update($request->all());

    toast('Movimentação editada com sucesso!','success');

    return redirect('/movements');
}

public function destroy($id){

    Movement::findOrFail($id)->delete();

    toast('Movimentação excluída com sucesso!','success');

    return redirect('/movements');
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
        return view('movements.rastrear', ['batchs'=> $batchs, 'movements' => $movements, 'data' => $data]);
}

}