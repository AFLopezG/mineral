<?php

namespace App\Http\Controllers;

use App\Models\Anticipo;
use App\Http\Requests\StoreAnticipoRequest;
use App\Http\Requests\UpdateAnticipoRequest;

class AnticipoController extends Controller{
    public function index(){
        return Anticipo::with(['lote'])->get();
    }
    public function store(StoreAnticipoRequest $request){
        $anticipo = Anticipo::create($request->validated());
        return $anticipo;
    }
    public function show(Anticipo $anticipo){
        return $anticipo->load(['lote']);
    }
    public function update(UpdateAnticipoRequest $request, Anticipo $anticipo){
        $anticipo->update($request->validated());
        return $anticipo;
    }
    public function destroy(Anticipo $anticipo){
        $anticipo->delete();
        return $anticipo;
    }
}
