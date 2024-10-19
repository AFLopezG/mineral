<?php

namespace App\Http\Controllers;

use App\Models\Diaria;
use App\Http\Requests\StoreDiariaRequest;
use App\Http\Requests\UpdateDiariaRequest;
use Illuminate\Http\Request;
class DiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Diaria::orderBy('id','desc')->limit(10)->get();
    }

    public function buscarDiaria(Request $request){
        $timestamp = strtotime($request->fecha);
        $dia= date("d", $timestamp);
        $mes= date("m", $timestamp);
        $an= date("Y", $timestamp);
        //return Diaria::whereDate('fecha',$an.'-'.$mes.'-'.$dia)->first();
        return Diaria::whereDate('fecha',$request->fecha)->first();
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiariaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiariaRequest $request)
    {
        //
        if(Diaria::whereDate('fecha',$request->fecha)->count()==0){
        $diaria=new Diaria;
        $diaria->plata=$request->plata;
        $diaria->plomo=$request->plomo;
        $diaria->zinc=$request->zinc;
        $diaria->estano=$request->estano;
        $diaria->fecha=$request->fecha;
        $diaria->save();}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diaria  $diaria
     * @return \Illuminate\Http\Response
     */
    public function show(Diaria $diaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diaria  $diaria
     * @return \Illuminate\Http\Response
     */
    public function edit(Diaria $diaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiariaRequest  $request
     * @param  \App\Models\Diaria  $diaria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiariaRequest $request, Diaria $diaria)
    {
        //
        $diaria= Diaria::find($request->id);
        $diaria->plata=$request->plata;
        $diaria->plomo=$request->plomo;
        $diaria->zinc=$request->zinc;
        $diaria->estano=$request->estano;
        $diaria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diaria  $diaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diaria $diaria)
    {
        //
    }
   
}
