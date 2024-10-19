<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Lote;
use App\Models\Ley;
use App\Models\Termino;
use App\Models\Diaria;
use App\Http\Requests\StoreLiquidacionRequest;
use App\Models\Liquidacion;
use Illuminate\Http\Request;

class LiquidacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  return Ley::with(['ley'])->orderBy('id','desc')->get();
       // return $ley=Lote::where('lote_id','id')->get();
       return Termino::all();
    }
    public function ley() 
    {
        //return $this->belongsTo(Ley::class, 'lote_id'); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Liquidacion  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function show(Liquidacion $liquidacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Liquidacion  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Liquidacion $liquidacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liquidacion  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liquidacion $liquidacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Liquidacion  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liquidacion $liquidacion)
    {
        //
    }
}
