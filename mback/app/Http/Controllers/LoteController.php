<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function show(Lote $lote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function edit(Lote $lote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoteRequest  $request
     * @param  \App\Models\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoteRequest $request, Lote $lote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lote $lote)
    {
        //
    }
}
