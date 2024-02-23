<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funko extends Model
{
    protected $table = 'funkos';
    protected $fillable =[
        'nombre',
        'precio',
        'imagen',
        'cantidad',
        'categoria',
        'isDeleted',
    ];

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
        return $query->where('nombre', 'LIKE', "%$search%");
    }

    public function scopeCategory($query, $category){
        return $query->where('categoria', $category);
    }

    public function scopePrice($query, $price){
        return $query->where('precio', '>=', $price);
    }
}
