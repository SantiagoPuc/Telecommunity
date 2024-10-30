<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
public function create(Request $request)
{
    $data = $request->validate([
        'nombre' => 'required|string|max:40',
        'apellido_1' => 'required|string|max:40',
        'apellido_2' => 'required|string|max:40',
        'telefono' => 'required|string|max:10',
        'fecha_ingreso' => 'required|date',
        'correo' => 'required|string|email|max:320',
        'username' => 'required|string|max:40|unique:usuario',
        'password' => 'required|string|max:255',
        'id_tipo' => 'required|integer',
    ]);

    $data['password'] = bcrypt($data['password']); // Hash the password

    $usuario = Usuario::create($data);

    return response()->json(['success' => true, 'usuario' => $usuario], 201);
}
}
