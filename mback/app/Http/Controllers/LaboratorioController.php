<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use App\Http\Requests\StoreLaboratorioRequest;
use App\Http\Requests\UpdateLaboratorioRequest;

class LaboratorioController extends Controller
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
     * @param  \App\Http\Requests\StoreLaboratorioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaboratorioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaboratorioRequest  $request
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratorioRequest $request, Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratorio  $laboratorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorio $laboratorio)
    {
        //
    }
}
