<?php

namespace Cinema\Http\Controllers;
use Session;
use Redirect;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;//se pone esta extencion cuando usamos el request de store y recuerda poner en true el USserCreatereRequest
use Cinema\Http\Requests\UserUpdateRequest;//se pone esta extencion cuando usamos el request de store y recuerda poner en true el USserUpdatereRequest
use Illuminate\Routing\Route;
class UsuarioController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');//con esto protege cualquier parte de la aplicacion que no este alguien logueado no podra ingrasar a ninguna zona
		$this->middleware('admin');

	}
    public function index()
    {
    	$users = \Cinema\User::paginate(2);
    	/*antes tenia all() para mostrar todo slos reguistros, pero se cambio para la paginacion, recuerda ir al 
    	index.blade.php para establecer y que se muestre la paginacion con el codigo {!!$users->render()!!} */
		return view('usuario.index', compact('users'));
    }

    public function create()
    {
    	return view('usuario.create');
    }
    public function store(UserCreateRequest $request)//UserCreateRequest hace referencia al UserCreateRequest para validar
    {
    	\Cinema\User::create([
    			'name'=>$request['name'],
    			'email'=>$request['email'],
    			'password'=>$request['password'],

    		]);
    	return redirect('/usuario')->with('message','usuario agregado correctamente');
    }

     public function edit($id)
    {
    	$user = \Cinema\User::find($id);
    	return view('usuario.edit',['user'=>$user]);
    }

     public function update($id, UserUpdateRequest $request)//UserUpdateRequest hace referencia al UserUpdateRequest para validar
   
    {
    	$user = \Cinema\User::find($id);
    	$user->fill($request->all());
    	$user->save();
    	Session::flash('message', 'usuario editado correctamente');
    	return redirect::to('/usuario');
    }

     public function destroy($id)
    {	//antes se destruia el recurso o registro por decirlo asi, y se cambia acontinuacion para que no se elimine completamente
    	//$user = \Cinema\User::destroy($id); este era el codigo para eliminar anteriormente
    	$user = \Cinema\User::find($id);
    	$user->delete();
    	Session::flash('message', 'usuario eliminado correctamente');
    	return redirect::to('/usuario');
    }

}
