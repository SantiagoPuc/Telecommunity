<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'usuario';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre',
        'apellido_1',
        'apellido_2',
        'telefono',
        'fecha_ingreso',
        'correo',
        'username',
        'password',
        'id_tipo',
        'foto', // Si usas fotos, asegúrate de agregarlo
    ];

    // Si no tienes los campos 'created_at' y 'updated_at' en tu tabla,
    // puedes desactivar el uso de timestamps
    public $timestamps = true;

    // Si decides que tu tabla no tiene los campos de timestamp,
    // puedes comentar o eliminar la línea anterior y agregar esta:
    // public $timestamps = false;
}
