<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funko extends Model
{
    public static string $IMAGE_DEFAULT = 'https://via.placeholder.com/150';
    protected $table = 'funkos';


    protected $fillable =[
        'nombre',
        'precio',
        'imagen',
        'cantidad',
        'categoria',
        'isDeleted',
    ];

    public $timestamps = true;


    protected $hidden =[
        'isDeleted',
    ];

    protected $casts = [
        'isDeleted' => 'boolean',
    ];

    public function scopeIsDeleted($query){
        return $query->where('isDeleted', false);
    }

    public function scopeSearch($query, $search){
        return $query->whereRaw('LOWER(nombre) like ? ', ["%".strtolower($search)."%"]);
    }

    public function scopeCategory($query, $category){
        return $query->where('categoria', $category);
    }

    public function scopePrice($query, $price){
        return $query->where('precio', '>=', $price);
    }
}
