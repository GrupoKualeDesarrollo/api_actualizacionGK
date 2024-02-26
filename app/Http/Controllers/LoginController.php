<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validación de campos
        $request->validate([
            'usuario' => 'required',
            'password' => 'required'
        ]);

        // Intento de inicio de sesión
        if (Auth::attempt(['username' => $request->usuario, 'password' => $request->password])) {
            // Autenticación exitosa

            return redirect()->intended('index'); // Redirecciona a la ruta deseada después del inicio de sesión exitoso
        } else {
            // Autenticación fallida
            return redirect()->back()->withInput()->withErrors(['usuario' => 'Credenciales inválidas']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión del usuario

        $request->session()->invalidate(); // Invalidar la sesión actual
        $request->session()->regenerateToken(); // Regenerar el token CSRF

        return redirect('login'); // Redirigir a la página de inicio de sesión
    }

    public function registrarUsuario()
    {
        $usuario = new User();

        try {
            $usuario->name              = 'Supervisor';
            $usuario->email             = 'misael@grupokuale.com.mx';
            $usuario->password          = Hash::make('#Mmo2005/?');
            $usuario->username          = 'SUPERVISOR';

            $usuario->save();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        dd('registrado');

    }
}
