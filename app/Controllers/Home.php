<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;
    protected $admin = false;
    protected $userSession;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userSession = $this->session->get('user');
        if ($this->userSession) {
            $userModel = new \App\Models\User();
            $admin = $userModel->where('email', $this->userSession['email'])->where('admin', true)->first();
            if (!empty($admin)) {
                $this->admin = true;
            }
        }
    }

    public function index()
    {
        $productoModel = new \App\Models\Producto();
        $productos = $productoModel->orderBy('stock', 'DESC')->findAll(3);
        return view('home/index', ['userSession' => $this->userSession, 'admin' => $this->admin, 'productos' => $productos]);
    }

    public function register()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            if (empty($data['email']) || empty($data['password']) || empty($data['nombre']) || empty($data['apellido'])) {
                return redirect()->to('/register')->with('error', 'Registro fallido. Por favor, revisa los campos.');
            }
            $userModel = new \App\Models\User();
            $user = $userModel->where('email', $data['email'])->first();
            if (!empty($user)) {
                return redirect()->to('/register')->with('error', 'Registro fallido. Email ya registrado.');
            }
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $userModel->insert($data);
            $this->session->set('user', $data);
            return redirect()->to('/')->with('success', 'Registro exitoso. Bienvenido ' . $data['nombre'] . '.');
        }
        return view('home/register');
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $userModel = new \App\Models\User();
            $user = $userModel->where('email', $data['email'])->first();
            if (!empty($user) && password_verify($data['password'], $user['password'])) {
                $this->session->set('user', $user);
                return redirect()->to('/')->with('success', 'Inicio de sesión exitoso. Bienvenido ' . $user['nombre'] . '.');
            } else {
                return redirect()->to('/login')->with('error', 'Email o contraseña incorrecto.');
            }
        }
        return view('home/login');
    }

    public function logout()
    {
        $this->session->remove('user');
        return redirect()->to('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
