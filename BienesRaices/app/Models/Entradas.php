<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    public function rol()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];
}
