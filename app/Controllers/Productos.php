<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Productos extends BaseController
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
        $productos = $productoModel->findAll();
        return view('productos/index', ['userSession' => $this->userSession, 'admin' => $this->admin, 'productos' => $productos]);
    }

    public function add()
    {
        if ($this->admin) {
            if ($this->request->getPost()) {
                $data = $this->request->getPost();
                $productoModel = new \App\Models\Producto();
                $imagen = $this->request->getFile('imagen');
                if ($imagen->isValid() && !$imagen->hasMoved()) {
                    $newName = $imagen->getRandomName();
                    $imagen->move('./uploads/img', $newName);
                    $data['imagen'] = $newName;
                }
                $productoModel->insert($data);
                return redirect()->to('/productos')->with('success', 'Registro exitoso de producto ' . $data['nombre'] . '.');
            }
            return view('productos/add');
        } else {
            return redirect()->to('/')->with('error', 'Agregar fallido. No es administrador.');
        }
    }

    public function view($id)
    {
        $productoModel = new \App\Models\Producto();
        $producto = $productoModel->find($id);
        return view('productos/view', ['producto' => $producto]);
    }

    public function edit($id)
    {
        if ($this->admin) {
            $productoModel = new \App\Models\Producto();
            $producto = $productoModel->find($id);
            if ($this->request->getPost()) {
                $data = $this->request->getPost();
                $imagen = $this->request->getFile('imagen');
                if ($imagen->isValid() && !$imagen->hasMoved()) {
                    $oldImage = $producto['imagen'];
                    if ($oldImage && file_exists('./uploads/img/' . $oldImage)) {
                        unlink('./uploads/img/' . $oldImage);
                    }
                    $newName = $imagen->getRandomName();
                    $imagen->move('./uploads/img', $newName);
                    $data['imagen'] = $newName;
                }
                $productoModel->update($id, $data);
                return redirect()->to('/productos')->with('success', 'Editado exitoso de producto ' . $data['nombre'] . '.');
            }
            return view('productos/edit', ['producto' => $producto]);
        } else {
            return redirect()->to('/')->with('error', 'Edición fallida. No es administrador.');
        }
    }

    public function delete($id)
    {
        if ($this->admin) {
            $productoModel = new \App\Models\Producto();
            $producto = $productoModel->find($id);
            $imagen = $producto['imagen'];
            if ($imagen && file_exists('./uploads/img/' . $imagen)) {
                unlink('./uploads/img/' . $imagen);
            }
            $productoModel->delete($id);
            return redirect()->to('/productos')->with('success', 'Borrado exitoso de producto.');
        } else {
            return redirect()->to('/')->with('error', 'Eliminación fallida. No es administrador.');
        }
    }
}
