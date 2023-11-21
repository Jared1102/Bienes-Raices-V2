<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;
    protected $table="respuestas";
    protected $fillable = [
        'respuesta',
        'pregunta_id'
    ];

    public function pregunta() {
        return $this->belongsTo(Pregunta::class);
    }
}
