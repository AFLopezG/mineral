<?php

namespace App\Http\Controllers;

use App\Models\Anticipo;
use App\Http\Requests\StoreAnticipoRequest;
use App\Http\Requests\UpdateAnticipoRequest;

class AnticipoController extends Controller
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
     * @param  \App\Http\Requests\StoreAnticipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnticipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anticipo  $anticipo
     * @return \Illuminate\Http\Response
     */
    public function show(Anticipo $anticipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anticipo  $anticipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Anticipo $anticipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnticipoRequest  $request
     * @param  \App\Models\Anticipo  $anticipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnticipoRequest $request, Anticipo $anticipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anticipo  $anticipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anticipo $anticipo)
    {
        //
    }
}
