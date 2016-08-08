<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = "generos";
    protected $fillable = ['genero'];//colocar esta linea de codigo para rellenar el genero
}
