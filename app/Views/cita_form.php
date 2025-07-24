<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Agregar Cita</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= site_url('cita_guardar') ?>" method="post" class="p-4 border rounded bg-light">

                <div class="mb-3">
                    <label for="fecha_cita" class="form-label">Fecha de la Cita:</label>
                    <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" required>
                </div>

                <div class="mb-3">
                    <label for="hora_cita" class="form-label">Hora de la Cita:</label>
                    <input type="time" class="form-control" name="hora_cita" id="hora_cita" required>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-control" name="estado" id="estado" required>
                        <option value="">Seleccione estado</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Confirmada">Confirmada</option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Finalizada">Finalizada</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo:</label>
                    <textarea class="form-control" name="motivo" id="motivo" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="fk_paciente" class="form-label">Paciente:</label>
                    <select class="form-control" name="fk_paciente" id="fk_paciente" required>
                        <option value="">Seleccione un paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= esc($paciente['id_paciente']) ?>">
                                <?= esc($paciente['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fk_dentista" class="form-label">Dentista:</label>
                    <select class="form-control" name="fk_dentista" id="fk_dentista" required>
                        <option value="">Seleccione un dentista</option>
                        <?php foreach ($dentistas as $dentista): ?>
                            <option value="<?= esc($dentista['id_dentista']) ?>">
                                <?= esc($dentista['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mx-2">Guardar</button>
                    <a href="<?= base_url('cita_listar') ?>" class="btn btn-danger btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
