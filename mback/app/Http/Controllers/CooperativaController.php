<?php

namespace App\Http\Controllers;

use App\Models\Cooperativa;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Requests\CreateCooperativaRequest;
//use App\Http\Requests\UpdateCooperativaRequest;

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
    public function update(Request $request, Cooperativa $cooperativa)
    {  
        $cooperativa->update($request->all());
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
