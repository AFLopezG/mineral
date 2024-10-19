<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Ley;
use App\Models\Lote;
use App\Http\Requests\StoreLeyRequest;
use App\Http\Requests\UpdateLeyRequest;
use Illuminate\Http\Request;

class LeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Ley::with(['lote'])->orderBy('id','desc')->get();
    }
    
    public function searchLote(Request $request){
        return Lote::with(['cliente','cooperativa'])->where('codigo',$request->codigo)->first();
    }

    public function store(StoreLeyRequest $request){
        $ley = Ley::create($request->all());
        return $ley;
    }
    public function show(Ley $ley){
        return $ley->load(['ley']);
    }
    public function update(UpdateLeyRequest $request, Ley $ley){
        $ley->update($request->all());
        return $ley;
       // $lote->update($request->all());
       // return response()->json($ley, 200);
    }
    public function destroy(Ley $ley){
        $ley->delete();
        return $ley;
    }

}
