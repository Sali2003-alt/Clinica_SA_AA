<?php 
namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\DentistaModel;

class Login extends BaseController
{
    protected $loginModel;
    protected $dentistaModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->dentistaModel = new DentistaModel();
    }

    public function index()
    {
        return view('login_form');
    }

    public function auth()
    {
        $session = session();
        
        // Validar datos del formulario
        $rules = [
            'email' => 'required|valid_email',
            'contrasena' => 'required|min_length[6]'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $email = $this->request->getPost('email');
        $contrasena = $this->request->getPost('contrasena');
        
        // Buscar usuario en la base de datos
        $user = $this->loginModel->where('email', $email)->first();
        
        if (!$user) {
            $session->setFlashdata('msg', 'Email no registrado');
            return redirect()->to('/login');
        }
        
        // Verificar contraseña (asumiendo que está hasheada)
        if (!password_verify($contrasena, $user['contrasena'])) {
            $session->setFlashdata('msg', 'Contraseña incorrecta');
            return redirect()->to('/login');
        }
        
        // Obtener datos del dentista (puede no existir)
        $dentista = $this->dentistaModel->where('fk_login', $user['id_login'])->first();
        
        // Configurar datos de sesión
        $ses_data = [
            'id_login' => $user['id_login'],
            'email' => $user['email'],
            'logged_in' => TRUE
        ];
        
        if ($dentista) {
            $ses_data['id_dentista'] = $dentista['id_dentista'];
            $ses_data['nombre'] = $dentista['nombre'];
        } else {
            $ses_data['id_dentista'] = null;
            $ses_data['nombre'] = 'Usuario';
        }
        
        $session->set($ses_data);
        return redirect()->to('/'); // Cambia '/' por la ruta que tengas para inicio
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
