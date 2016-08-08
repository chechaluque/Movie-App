<?php

namespace Cinema;
use Illuminate\Database\Eloquent\SoftDeletes;//se coloca esta linea para poder hacer la eliminacion soft
//use Illuminate\Contracts\Auth\CanResetPassword;//se coloca esta linea para poder hacer la el reseteo de contrasenia
//use Illuminate\Auth\Passwords\CanResetPassword;//se coloca esta linea para poder hacer la el reseteo de contrasenia
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use SoftDeletes;//se hace referencia que se va usar softDeletes y se agraga abajo la siguiente linea de codigo protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     protected $dates = ['deleted_at'];// se agraga aca para crear el campo en la base de datos. Recuerda usar el comando php artisan  make:migration add_deleted_to_users_table --table=users
    
//tambien recuerda ir a base de datos en migracion para configurar
    public function setPasswordAttribute($valor)
    {
            if(!empty($valor))
            {
                $this->attributes['password'] = \Hash::make($valor);//estas lineas de codigo se ponen para decir que el password esta vacio o no y verifica
            }
    }
}
