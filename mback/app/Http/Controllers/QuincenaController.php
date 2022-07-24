<?php

namespace App\Http\Controllers;

use App\Models\Quincena;
use App\Http\Requests\StoreQuincenaRequest;
use App\Http\Requests\UpdateQuincenaRequest;

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
