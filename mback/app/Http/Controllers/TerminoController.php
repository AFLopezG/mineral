<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Termino;
use App\Http\Requests;
use App\Http\Requests\StoreTerminoRequest;
use App\Http\Requests\UpdateTerminoRequest;


class TerminoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Termino::all();
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
    public function searchTermino(Request $request){
        return Termino::with(['nombre'])->where('nombre',$request->nombre)->first();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $termino=Termino::create($request->all());
        return response()->json($termino, status:200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function show(termino $termino)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function edit(termino $termino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTerminoRequest $request)
    {
        $termino=Termino::find($request->id);
        $termino->nombre=$request->nombre;
        $termino->plataPagable=$request->plataPagable;
        $termino->plomoPagable=$request->plomoPagable;
        $termino->zincPagable=$request->zincPagable;
        $termino->refino=$request->refino;
        $termino->maquila=$request->maquila;
        $termino->transporte=$request->transporte;
        $termino->base=$request->base;
        //$cooperativa->update($request->all());
        $termino->save();
        return response()->json($termino, status:200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\termino  $termino
     * @return \Illuminate\Http\Response
     */
    public function destroy(termino $termino)
    {
        $termino->delete();
    }
}
