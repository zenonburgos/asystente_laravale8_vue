<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $guarded =[
        'id', 'created_at', 'updated_at'
    ];
    public function category(){
        //return $this->belongsTo('App\Models\Category'); laravel 5.8
        return $this->belongsTo(Category::class);
    }
}
