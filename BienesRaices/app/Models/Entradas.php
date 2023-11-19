<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
        'created_at',
    ];
    public function getUrlImagenAttribute(){
        
        return $this->imagen ? asset("storage/blog/{$this->imagen}"):null;
    }
}
