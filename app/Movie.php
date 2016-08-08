<?php

namespace Cinema;
use File;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;// usar esta linea para el path, sirve para la fecha
use DB;
class Movie extends Model
{
    protected $table = "movies";
    protected $fillable = ['name','cast','direction','duration','generos_id', 'path'];
    public function setPathAttribute($path)
    {
    	if(!empty($path))
    	{
    		$name = Carbon::now()->second.$path->getClientOriginalName();
			$this->attributes['path'] = Carbon::now()->second.$name;
			\Storage::disk('local')->put($name, \File::get($path));
    	}
    	
    }
    public static function Movies()
    {
    	return DB::table('movies')
    	->join('generos', 'generos.id', '=', 'movies.generos_id')
    	->select('movies.*', 'generos.genero')
    	->get();
    }
}
