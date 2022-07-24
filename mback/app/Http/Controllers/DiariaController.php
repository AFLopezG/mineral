<?php

namespace App\Http\Controllers;

use App\Models\Diaria;
use App\Http\Requests\StoreDiariaRequest;
use App\Http\Requests\UpdateDiariaRequest;

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
