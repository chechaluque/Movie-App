<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Movie;
use Cinema\Http\Requests;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'admin']);
    }
    public function index()
    {
    	return view('index');
    }

    public function contacto()
    {
    	return view('contacto');
    }

    public function reviews()
    {
        $movies = Movie::Movies();
       
    	return view('reviews', compact('movies'));
    }
     public function admin()
    {
    	return view('admin.index');
    }
}
