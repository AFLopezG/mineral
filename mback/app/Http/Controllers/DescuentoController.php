<?php

namespace App\Http\Controllers;

use App\Models\Descuento;
use App\Http\Requests\StoreDescuentoRequest;
use App\Http\Requests\UpdateDescuentoRequest;

class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Descuento::with('cooperativa')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function listDescuento($id){
        return Descuento::where('cooperativa_id',$id)->get();
    }

    public function descuentoActivar($id){
        $descuento= Descuento::find($id);
        if($descuento->activo)
            $descuento->activo=false;
        else
            $descuento->activo=true;
        $descuento->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDescuentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDescuentoRequest $request)
    {
        //return $request;
        $descuento=new Descuento;
        $descuento->nombre=$request->nombre;
        $descuento->porcentaje=$request->porcentaje;
        $descuento->fijo=$request->fijo;
        $descuento->cooperativa_id=$request->cooperativa_id;
        $descuento->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function show(Descuento $descuento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function edit(Descuento $descuento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDescuentoRequest  $request
     * @param  \App\Models\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDescuentoRequest $request, Descuento $descuento)
    {
        return response()->json($descuento, status:200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descuento $descuento)
    {
        $descuento->delete();
    }
}
