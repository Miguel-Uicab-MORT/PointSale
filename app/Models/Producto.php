<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    const Activo = 1;
    const Inactivo = 2;

    protected $guarded = [
        'id',
        'creat_at',
        'update_at',
    ];

    /**
     * Relación uno a muchos inversa
    */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
