<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Auth;// poner esta linea 
use Session;// poner esta linea
use Redirect;//poner esta linea
use Cinema\Http\Requests;
use Cinema\Http\Requests\LoginReques;// importar esta linea del request y se pone en store

class LogController extends Controller
{
    public function store(LoginReques $request)
    {
    	if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']]))
    	{
    		return Redirect::to('admin');
    	}
    	Session::flash('message-error', 'Los datos son incorrectos!');
    	return Redirect::to('/');
    }
    public function logout()
    {
    	Auth::logout();
    	return Redirect('/');//cierra session, y hay que espcificarle la ruta en donde se cerrara por ejemple en en href de algun vinculo /logout
    }
}
