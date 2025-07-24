<?php

namespace App\Controllers;

use App\Models\PacienteModel;

class Paciente extends BaseController
{
    public function listar()
    {
        $model = new PacienteModel();
        $data['pacientes'] = $model->findAll();
        
        return view('paciente_list', $data);
    }

    public function agregar()
    {
        return view('paciente_form');
    }

    public function guardar()
    {
        $model = new PacienteModel();

        if (!$this->validate($model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'cedula' => $this->request->getPost('cedula'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion')
        ];

        $model->insert($data);

        return redirect()->to(base_url('paciente_listar'))->with('mensaje', 'Paciente guardado correctamente');
    }

    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('paciente_listar'))->with('error', 'ID inválido');
        }

        $model = new PacienteModel();
        $paciente = $model->find($id);
        
        if (!$paciente) {
            return redirect()->to(base_url('paciente_listar'))->with('error', 'Paciente no encontrado');
        }

        $model->delete($id);

        return redirect()->to(base_url('paciente_listar'))->with('mensaje', 'Paciente eliminado correctamente');
    }

    public function editar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('paciente_listar'))->with('error', 'ID inválido');
        }

        $model = new PacienteModel();
        $data['paciente'] = $model->find($id);
        
        if (!$data['paciente']) {
            return redirect()->to(base_url('paciente_listar'))->with('error', 'Paciente no encontrado');
        }

        return view('paciente_editar', $data);
    }

    public function actualizar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('paciente_listar'))->with('error', 'ID inválido');
        }

        $model = new PacienteModel();
        
        if (!$this->validate($model->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'cedula' => $this->request->getPost('cedula'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
            'direccion' => $this->request->getPost('direccion')
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('paciente_listar'))->with('mensaje', 'Paciente actualizado correctamente');
    }
}