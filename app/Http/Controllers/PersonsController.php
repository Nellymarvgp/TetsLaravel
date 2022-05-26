<?php

namespace App\Http\Controllers;

use App\Persons;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Persons::all();
        return $persons;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
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
        $persons = new Persons();
        $persons->first_name = $request->first_name;
        $persons->last_name = $request->last_name;
        $persons->document = $request->document;
        // $persons->ima_profile = $request->ima_profile;
        $persons->type_person = $request->type_person;

        $persons->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Persons $persons)
    {
        $persons = Persons::findOrFail($request->id);
        return $persons;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function edit(Persons $persons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persons $persons)
    {
        $persons = Persons::findOrFail($request->id);

        $persons->first_name = $request->first_name;
        $persons->last_name = $request->last_name;
        $persons->document = $request->document;
        // $persons->ima_profile = $request->ima_profile;
        $persons->type_person = $request->type_person;

        $persons->save();

        return $persons;
        //Esta función actualizará la tarea que hayamos seleccionado
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persons  $persons
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Persons $persons)
    {
        $persons = Persons::destroy($request->id);
        return $persons;
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }
}
