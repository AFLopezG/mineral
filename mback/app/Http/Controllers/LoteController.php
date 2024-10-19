<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Lote;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use Illuminate\Http\Request;

   class LoteController extends Controller{
    public function index(){
        return Lote::with('cliente')->with('cooperativa')->with('ley')->orderBy('id','desc')->get();
    }

    public function searchLote(Request $request){
        return Lote::with(['cliente','cooperativa','ley'])->where('codigo',$request->codigo)->first();
    }
    
    public function store(StoreLoteRequest $request){
        $cliente= Cliente::find($request->cliente_id);
        $countMineral = Lote::where('mineral', $request->mineral)->whereYear('fecha', date('Y'))->count() + 1;
        $countMineral = str_pad($countMineral, 3, '0', STR_PAD_LEFT);
        $cod= $request->mineral=='Plata'?'AG':($request->mineral=='Zinc-Plata'?'C-ZN':($request->mineral=='Plomo-Plata'?'C-PB':($request->mineral=='Broza'?'BMC':'')));
        $codigo = $cod . '-' . $countMineral.'-'.date('y');
        $request->merge(['cooperativa_id' => $cliente->cooperativa_id]);
        $request->merge(['codigo' => $codigo]);
        $lote = Lote::create($request->all());
        return response()->json($lote, 201);
    }
    public function show(Lote $lote){
        return $lote;
    }
    public function update(UpdateLoteRequest $request, Lote $lote){
        $lote->update($request->all());
        return response()->json($lote, 200);
    }
    public function destroy(Lote $lote){
        $lote->delete();
        return response()->json(null, 204);
    }
}
