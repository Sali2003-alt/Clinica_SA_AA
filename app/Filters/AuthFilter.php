<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $router = service('router');
        $currentRoute = $router->getMatchedRoute();
        
        // Excluir rutas públicas (login, proceso de login, etc.)
        $publicRoutes = ['/login', '/login/auth'];
        
        // Si la ruta actual es pública, no hacer nada
        if (in_array($currentRoute[0], $publicRoutes)) {
            return;
        }
        
        // Verificar autenticación para rutas protegidas
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Por favor inicia sesión para acceder a esta página');
        }
        
        // Aquí puedes agregar validaciones adicionales de roles/perfiles si es necesario
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario hacer nada después de la ejecución del controlador
    }
}