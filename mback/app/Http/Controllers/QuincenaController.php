<?php

namespace App\Http\Controllers;

use App\Models\Quincena;
use App\Http\Requests\StoreQuincenaRequest;
use App\Http\Requests\UpdateQuincenaRequest;
use Illuminate\Http\Request;

class QuincenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Quincena::orderBy('id','desc')->limit(10)->get();

    }

    public function buscarQuincena(Request $request){
        $timestamp = strtotime($request->fecha);
        $dia= date("d", $timestamp);
        $mes= date("m", $timestamp);
        $an= date("Y", $timestamp);
        if($dia>=1 && $dia<=15)
            return Quincena::whereDate('fecha','>=',$an.'-'.$mes.'-1')->whereDate('fecha','<=',$an.'-'.$mes.'-15')->first();
        else
            return Quincena::whereDate('fecha','>=',$an.'-'.$mes.'-16')->whereDate('fecha','<=',$an.'-'.$mes.'-31')->first();

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
     * @param  \App\Http\Requests\StoreQuincenaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuincenaRequest $request)
    {
        //
        if(Quincena::whereDate('fecha',$request->fecha)->count()==0){
            $quincena=new Quincena();
            $quincena->plata=$request->plata;
            $quincena->plomo=$request->plomo;
            $quincena->zinc=$request->zinc;
            $quincena->estano=$request->estano;
            $quincena->explata=$request->explata;
            $quincena->explomo=$request->explomo;
            $quincena->exzinc=$request->exzinc;
            $quincena->exestano=$request->exestano;
            $quincena->fecha=$request->fecha;
            $quincena->save();}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quincena  $quincena
     * @return \Illuminate\Http\Response
     */
    public function show(Quincena $quincena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quincena  $quincena
     * @return \Illuminate\Http\Response
     */
    public function edit(Quincena $quincena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuincenaRequest  $request
     * @param  \App\Models\Quincena  $quincena
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuincenaRequest $request, Quincena $quincena)
    {
        //
        $quincena= Quincena::find($request->id);
        $quincena->plata=$request->plata;
        $quincena->plomo=$request->plomo;
        $quincena->zinc=$request->zinc;
        $quincena->estano=$request->estano;
        $quincena->explata=$request->explata;
        $quincena->explomo=$request->explomo;
        $quincena->exzinc=$request->exzinc;
        $quincena->exestano=$request->exestano;
        $quincena->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quincena  $quincena
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quincena $quincena)
    {
        //
    }
}
