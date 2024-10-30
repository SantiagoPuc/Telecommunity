<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUsuariosController extends Controller
{
    public function showLoginForm()
    {
        return view('login_registro'); // Cambia a la vista de tu login
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Autenticación exitosa, redirigir al usuario
            return redirect()->intended('/'); // Cambia '/' por la ruta a la que quieras redirigir
        }

        // Si la autenticación falla, redirigir de nuevo con un mensaje de error
        return back()->withErrors([
            'username' => 'Las credenciales son incorrectas.',
        ])->onlyInput('username');
    }
}
