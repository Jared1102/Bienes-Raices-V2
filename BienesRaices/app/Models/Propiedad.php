<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Propiedad extends Model
{
    protected $table="propiedades";

    protected $fillable = [
        'nombrePropiedad',
        'descripcion',
        'precio',
        'noToilet',
        'noCocheras',
        'noHabitaciones',
        'imagen',
        'resumen'
    ];

    use HasFactory;

    public function getUrlImagenAttribute(){
        
        return $this->imagen ? asset("storage/propiedades/{$this->imagen}"):null;
    }
}
