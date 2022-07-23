<?php

namespace App\Http\Controllers;

use App\Models\Cooperativa;
use App\Http\Requests\StoreCooperativaRequest;
use App\Http\Requests\UpdateCooperativaRequest;

class CooperativaController extends Controller
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
     * @param  \App\Http\Requests\StoreCooperativaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCooperativaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperativa $cooperativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperativa $cooperativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCooperativaRequest  $request
     * @param  \App\Models\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCooperativaRequest $request, Cooperativa $cooperativa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperativa  $cooperativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperativa $cooperativa)
    {
        //
    }
}
