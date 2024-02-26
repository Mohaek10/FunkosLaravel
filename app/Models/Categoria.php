<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public static function getIdPorNombre($nombre)
    {
        $categoria = self::where('nombre', $nombre)->first();
        return $categoria ? $categoria->id : null;

    }

    public static function getNombrePorId($id)
    {
        $categoria = self::find($id);
        return $categoria ? $categoria->nombre : null;
    }

    public static function getNombres()
    {
        return self::all()->pluck('nombre');
    }

    protected $fillable = ['nombre'];

    public function funkos(){
        return $this->hasMany(Funko::class);
    }
}
