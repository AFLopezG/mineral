<?php

namespace App\Http\Controllers;

use App\Models\Anticipo;
use App\Http\Requests\StoreAnticipoRequest;
use App\Http\Requests\UpdateAnticipoRequest;
use Illuminate\Http\Request;

class AnticipoController extends Controller{
    public function index(){
        return Anticipo::with(['lote'])->orderBy('id','desc')->get();
    }
    public function store(StoreAnticipoRequest $request){
        $anticipo = Anticipo::create($request->all());
        return $anticipo;
    }
    public function show(Anticipo $anticipo){
        return $anticipo->load(['lote']);
    }
    public function update(UpdateAnticipoRequest $request, Anticipo $anticipo){
        $anticipo->update($request->all());
        return $anticipo;
    }
    public function destroy(Anticipo $anticipo){
        $anticipo->delete();
        return $anticipo;
    }

    public function totalAnticipo(Request $request){
        return Anticipo::where('lote_id',$request->id)->get();
    }
}
