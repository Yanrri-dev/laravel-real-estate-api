<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';

    protected $fillable = ['direccion', 'ciudad', 'precio', 'descripcion'];


    public function solicitudes()
    {
        return $this->hasMany(SolicitudVisita::class);
    }


}
