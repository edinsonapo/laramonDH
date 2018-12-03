<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos() //Ver la lista de Pokémon
    {
        return view('Pokemon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()// Agregar un nuevo Pokémon
    {
        return view('Pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)// Agregar un nuevo Pokémon
    {
        $pokemon = Pokemon::create([
            'name' => $request->input('name'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'type_id' => $request->input('type_id'),
            'evolves' => $request->input('evolves'),
        ]);

        return view('pokemon.show')->with('pokemon', $pokemon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function uno(Pokemon $pokemon) //Ver el detalle de un Pokémon
    {
        return view('pokemon.show')->with('pokemon', $pokemon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function editar(Pokemon $pokemon)// Modificar un Pokémon
    {
        return view('pokemon.editar')->with('pokemon', $pokemon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Pokemon $pokemon)// Modificar un Pokémon
    {
        $pokemon->name = $request->input('name');
        $pokemon->weight = $request->input('weight');
        $pokemon->height = $request->input('height');
        $pokemon->type_id = $request->input('type_id');
        $pokemon->evolves = $request->input('evolves');

        $pokemon->save();

        return redirect('/pokemon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function borrar(Pokemon $pokemon)//Eliminar un Pokémon
    {
        $pokemon->delete();
        return redirect('/pokemon');
    }
}
