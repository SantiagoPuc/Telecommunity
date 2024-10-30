<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class Adm_Usuarios_controller extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('adm_index', compact('usuarios'));
    }

    public function create(Request $request)
    {
        // Validar y crear el usuario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_1' => 'required|string|max:255',
            'apellido_2' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:15',
            'fecha_ingreso' => 'required|date',
            'correo' => 'required|email|unique:usuario,correo',
            'username' => 'required|string|unique:usuario,username|max:255',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|image|max:2048',
            'id_tipo' => 'required|integer',
        ]);

        $usuario = Usuario::create($validatedData);
        return response()->json(['success' => true]);
    }

    public function get_user($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:usuario,id',
            'nombre' => 'required|string|max:255',
            'apellido_1' => 'required|string|max:255',
            'apellido_2' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|unique:usuario,correo,'.$request->id,
            'username' => 'required|string|unique:usuario,username,'.$request->id.'|max:255',
            'password' => 'nullable|string|min:8',
            'foto' => 'nullable|image|max:2048',
            'id_tipo' => 'required|integer',
        ]);

        $usuario = Usuario::findOrFail($request->id);
        $usuario->update($validatedData);
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id);
        $usuario->delete();
        return response()->json(['success' => true]);
    }

    public function search_user(Request $request)
    {
        $query = $request->input('query');
        $usuarios = Usuario::where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('apellido_1', 'LIKE', "%{$query}%")
            ->orWhere('apellido_2', 'LIKE', "%{$query}%")
            ->orWhere('correo', 'LIKE', "%{$query}%")
            ->get();
        
        return response()->json($usuarios);
    }
}
?>