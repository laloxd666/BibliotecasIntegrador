<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autores extends Model
{
    use HasFactory;
    protected $table = 'autores';

    // clave primaria de la tabla 
    protected $primaryKey = 'id_autor';




    // se va utilizar etiqutas de tiempo 
    public $timestamps = false;
    public $incrementing = true;

    // tabla que se va llenar
    protected $fillable = [
        'id_autor',
        'nombre',
        'apellidos'

    ];
}
