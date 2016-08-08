<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Cinema\Http\Requests;
use Cinema\Movie;
use Cinema\Genero;

class MovieController extends Controller

{
	
    public function index()
	{
		$movies = Genero::Movies();
		return view('pelicula.index', compact('movies'));
	}
	public function edit($id)
	{
		 $generos = Genre::lists('genero', 'id');
        return view('pelicula.edit',['movie'=>$this->movie,'genres'=>$generos]);
	}
	
	
	   public function create()
	{
		$generos = Genero::lists('genero', 'id');
		return view('pelicula.create', compact('generos'));
	}
	public function store(Request $request)
	{
		Movie::create($request->all());
		return redirect::to('/pelicula');
	}
	public function update(Request $request, $id)
    {
    	$movie= Movie::find($request->getParameter($id));
        $movie->movie->fill($request->all());
        $movie->movie->save();
        Session::flash('message','Pelicula Editada Correctamente');
        return Redirect::to('/pelicula');
    }
}