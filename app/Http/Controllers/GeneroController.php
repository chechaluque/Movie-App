<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Requests\GeneroRequest;// asignar esta linea de coodigo 
use Cinema\Genero;//asignar el modelo para que trabaje trayendo los datos de la base de datos

class GeneroController extends Controller
{
	public function index()
    {
    	return view('genero.index');
    }
    public function listing()// datos vienen de la peticion ajax del script 
    {
    	$genero = Genero::all();
    	return response()->json(
    		$genero->toArray()
    		);
    }
    public function create()
    {
    	return view('genero.create');
    }
    public function edit($id)
    {
    	$genero = Genero::find($id);
    	return response()->json(
    		$genero->toArray()
    		);
    }
     public function destroy($id)
    {
    	$genero = Genero::find($id);
    	$genero->delete();
    	return response()->json([
    		 "mensaje"=>"borrado"
    		]);
    }
    public function update(Request $request, $id)// datos vienen de la peticion ajax del script 2
    {
    	$genero = Genero::find($id);
    	$genero->fill($request->all());
    	$genero->save();
    	return response()->json([
    		"mensaje"=> 'Listo'
    		]);
    }

    public function store(GeneroRequest $request)
    {
    	if($request->ajax())
    	{
    		Genero::create($request->all());
    		return response()->json([
    			"mensaje"=> 'Creado'
    		]);
    	}
    }
}
