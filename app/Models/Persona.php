<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $guarded =[
        'id', 'created_at', 'updated_at', 'nombre'
    ];

    public function proveedor()
    {
        return $this->hasOne(Proveedor::class);
    }
}
