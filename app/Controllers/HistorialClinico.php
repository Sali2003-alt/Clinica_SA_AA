<?php

namespace App\Controllers;

use App\Models\HistorialClinicoModel;
use App\Models\PacienteModel;
use App\Models\DentistaModel;
use CodeIgniter\Controller;

class HistorialClinico extends Controller
{
    public function listar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('historial_clinico hc');
        $builder->select('hc.*, p.nombre AS paciente_nombre, d.nombre AS dentista_nombre');
        $builder->join('paciente p', 'hc.fk_paciente = p.id_paciente');
        $builder->join('dentista d', 'hc.fk_dentista = d.id_dentista');
        $query = $builder->get();
        $data['historiales'] = $query->getResultArray();

        return view('historialclinico_list', $data);
    }


    public function agregar()
    {
        $modelPaciente = new PacienteModel();
        $modelDentista = new DentistaModel();

        $data['pacientes'] = $modelPaciente->findAll();
        $data['dentistas'] = $modelDentista->findAll();

        return view('historialclinico_form', $data);
    }

    public function guardar()
    {
        $model = new HistorialClinicoModel();

        if (!$this->validate([
            'diagnostico' => 'required',
            'tratamiento_realizado' => 'required',
            'fecha' => 'required|valid_date',
            'observaciones' => 'permit_empty',
            'fk_paciente' => 'required|integer',
            'fk_dentista' => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'diagnostico' => $this->request->getPost('diagnostico'),
            'tratamiento_realizado' => $this->request->getPost('tratamiento_realizado'),
            'fecha' => $this->request->getPost('fecha'),
            'observaciones' => $this->request->getPost('observaciones'),
            'fk_paciente' => $this->request->getPost('fk_paciente'),
            'fk_dentista' => $this->request->getPost('fk_dentista'),
        ];

        $model->insert($data);

        return redirect()->to(base_url('historialclinico_listar'))->with('mensaje', 'Historial clínico guardado correctamente');
    }

    public function eliminar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('historialclinico_listar'))->with('error', 'ID inválido');
        }

        $model = new HistorialClinicoModel();
        $historial = $model->find($id);

        if (!$historial) {
            return redirect()->to(base_url('historialclinico_listar'))->with('error', 'Historial clínico no encontrado');
        }

        $model->delete($id);

        return redirect()->to(base_url('historialclinico_listar'))->with('mensaje', 'Historial clínico eliminado correctamente');
    }

    public function editar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('historialclinico_listar'))->with('error', 'ID inválido');
        }

        $model = new HistorialClinicoModel();
        $historial = $model->find($id);

        if (!$historial) {
            return redirect()->to(base_url('historialclinico_listar'))->with('error', 'Historial clínico no encontrado');
        }

        $modelPaciente = new PacienteModel();
        $modelDentista = new DentistaModel();

        $data['historial'] = $historial;
        $data['pacientes'] = $modelPaciente->findAll();
        $data['dentistas'] = $modelDentista->findAll();

        return view('historialclinico_editar', $data);
    }

    public function actualizar($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('historialclinico_listar'))->with('error', 'ID inválido');
        }

        if (!$this->validate([
            'diagnostico' => 'required',
            'tratamiento_realizado' => 'required',
            'fecha' => 'required|valid_date',
            'observaciones' => 'permit_empty',
            'fk_paciente' => 'required|integer',
            'fk_dentista' => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new HistorialClinicoModel();

        $data = [
            'diagnostico' => $this->request->getPost('diagnostico'),
            'tratamiento_realizado' => $this->request->getPost('tratamiento_realizado'),
            'fecha' => $this->request->getPost('fecha'),
            'observaciones' => $this->request->getPost('observaciones'),
            'fk_paciente' => $this->request->getPost('fk_paciente'),
            'fk_dentista' => $this->request->getPost('fk_dentista'),
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('historialclinico_listar'))->with('mensaje', 'Historial clínico actualizado correctamente');
    }
}
