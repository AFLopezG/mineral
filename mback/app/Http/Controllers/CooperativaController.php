<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cooperativa;
use App\Models\Cliente;
use App\Http\Requests;
//use App\Http\Requests\CreateCooperativaRequest;
use App\Http\Requests\UpdateCooperativaRequest;

class CooperativaController extends Controller
{
    
    public function index()
    {
       
        return Cooperativa::all();
    }

    public function store(Request $request)
    {
        //return $request;
        $cooperativa=Cooperativa::create($request->all());
        return response()->json($cooperativa, status:200);
        
    }
    public function update(UpdateCooperativaRequest $request, Cooperativa $cooperativa)
    {  
        $cooperativa=Cooperativa::find($request->id);
        $cooperativa->nombre=$request->nombre;
        $cooperativa->direccion=$request->direccion;
        $cooperativa->representante=$request->representante;
        $cooperativa->nim=$request->nim;
        $cooperativa->nit=$request->nit;
        $cooperativa->celular=$request->celular;
        $cooperativa->estado=$request->estado;
        //$cooperativa->update($request->all());
        $cooperativa->save();
        return response()->json($cooperativa, status:200);
    }

    public function activar($id){
        $cooperativa=Cooperativa::find($id);
        if($cooperativa->estado=='ACTIVO')
            $cooperativa->estado='PASIVO';
        else
            $cooperativa->estado='ACTIVO';
        $cooperativa->save();
    }

    public function destroy(Cooperativa $cooperativa)
    {
        $cooperativa->delete();
        return response()->json($cooperativa, status:204);
    }
}
