<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Mail;// poner esta liniea para los correos
use Session;// poner esta liniea para los correos
use Redirect;// poner esta liniea para los correos
use Cinema\Http\Requests;

class MailController extends Controller
{
     public function store(Request $request)
    {
        Mail::send('emails.contact',$request->all(), function($msj){
            $msj->subject('Correo de Contacto');
            $msj->to('cesarluque2000@gmail.com');
        });
        Session::flash('message','Mensaje enviado correctamente');
        return Redirect::to('contacto');
    }
}
