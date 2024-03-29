<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = [
        'id', 'contacto', 'telefono_contacto'
    ];

    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
