<?php

namespace App\Controllers;

use App\Models\DentistaModel;

class Dentista extends BaseController
{
    public function listar()
    {
        $model = new DentistaModel();
        $data['dentistas'] = $model->findAll();
        
        return view('dentista_list', $data);
    }

    public function agregar()
    {
        return view('dentista_form');
    }

    public function guardar()
    {
        $model = new DentistaModel();

        if (!$this->validate($model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'especialidad' => $this->request->getPost('especialidad'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'estado' => $this->request->getPost('estado')
        ];

        $model->insert($data);

        return redirect()->to(base_url('dentista_listar'))->with('mensaje', 'Dentista guardado correctamente');
    }

    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('dentista_listar'))->with('error', 'ID inválido');
        }

        $model = new DentistaModel();
        $dentista = $model->find($id);
        
        if (!$dentista) {
            return redirect()->to(base_url('dentista_listar'))->with('error', 'Dentista no encontrado');
        }

        $model->delete($id);

        return redirect()->to(base_url('dentista_listar'))->with('mensaje', 'Dentista eliminado correctamente');
    }

    public function editar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('dentista_listar'))->with('error', 'ID inválido');
        }

        $model = new DentistaModel();
        $data['dentista'] = $model->find($id);
        
        if (!$data['dentista']) {
            return redirect()->to(base_url('dentista_listar'))->with('error', 'Dentista no encontrado');
        }

        return view('dentista_editar', $data);
    }

    public function actualizar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('dentista_listar'))->with('error', 'ID inválido');
        }

        $model = new DentistaModel();
        
        if (!$this->validate($model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'especialidad' => $this->request->getPost('especialidad'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'estado' => $this->request->getPost('estado')
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('dentista_listar'))->with('mensaje', 'Dentista actualizado correctamente');
    }
}