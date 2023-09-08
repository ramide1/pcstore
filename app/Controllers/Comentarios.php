<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Comentarios extends BaseController
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
        $comentarioModel = new \App\Models\Comentario();
        $comentarios = $comentarioModel->orderBy('id', 'DESC')->findAll();
        return view('home/comentarios', ['userSession' => $this->userSession, 'admin' => $this->admin, 'comentarios' => $comentarios]);
    }

    public function add()
    {
        if (!$this->userSession) {
            return redirect()->to('/comentarios')->with('error', 'Agregar fallido. No esta logeado.');
        }
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            if (empty($data['descripcion'])) {
                return redirect()->to('/comentarios')->with('error', 'Agregar fallido. No puede estar vacio.');
            }
            $comentarioModel = new \App\Models\Comentario();
            $data['user_id'] = $this->userSession['id'];
            $comentarioModel->insert($data);
            return redirect()->to('/comentarios')->with('success', 'Registro exitoso de comentario.');
        }
    }

    public function edit($id)
    {
        if (!$this->userSession) {
            return redirect()->to('/comentarios')->with('error', 'Editado fallido. No esta logeado.');
        }
        $comentarioModel = new \App\Models\Comentario();
        $comentario = $comentarioModel->find($id);
        if ($this->userSession['id'] != $comentario['user_id']) {
            if (!$this->admin) {
                return redirect()->to('/comentarios')->with('error', 'Editado fallido. Este comentario no es suyo.');
            }
        }
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $comentarioModel->update($id, $data);
            return redirect()->to('/comentarios')->with('success', 'Editado exitoso de comentario.');
        }
    }

    public function delete($id)
    {
        if (!$this->userSession) {
            return redirect()->to('/comentarios')->with('error', 'Borrado fallido. No esta logeado.');
        }
        $comentarioModel = new \App\Models\Comentario();
        $comentario = $comentarioModel->find($id);
        if ($this->userSession['id'] != $comentario['user_id']) {
            if (!$this->admin) {
                return redirect()->to('/comentarios')->with('error', 'Borrado fallido. Este comentario no es suyo.');
            }
        }
        $comentarioModel->delete($id);
        return redirect()->to('/comentarios')->with('success', 'Borrado exitoso de comentario.');
    }
}
