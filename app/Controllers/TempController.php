<?php

namespace App\Controllers;

use App\Models\LoginModel;

class TempController extends BaseController
{
    public function insertarUsuario()
    {
        $loginModel = new LoginModel();

        $loginModel->insert([
            'email' => 'admin@correo.com',
            'contrasena' => 'admin123' // Se hashea automáticamente por LoginModel
        ]);

        echo "Usuario insertado correctamente.";
    }
}
