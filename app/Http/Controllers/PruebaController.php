<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;

class PruebaController extends Controller
{
    public function index()
	{
		return "Hola desde el controlador";
	}
	public function nombre($nombre)
	{
		return "Hola mi nombre es: " . $nombre;
	}
}
