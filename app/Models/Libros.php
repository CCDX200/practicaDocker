<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    //
    use HasFactory;
    protected $table = 'libros';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    protected $fillable = [
        'titulo',
        'genero',
        'sinopsis',
        'isbn',
        'editorial',
        'user_id'

    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
}
