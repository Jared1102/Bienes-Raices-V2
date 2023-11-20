<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Entradas extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
    // protected $table="entradas";
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
        'resumen',
    ];
    
    public function getUrlImagenAttribute(){
        
        return $this->imagen ? asset("storage/blog/{$this->imagen}"):null;
    }
}
