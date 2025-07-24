<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Editar Cita</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= base_url('cita_actualizar/' . $cita['id_cita']) ?>" method="post" class="p-4 border rounded bg-light">

                <div class="mb-3">
                    <label for="fecha_cita" class="form-label">Fecha de la Cita:</label>
                    <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" required
                        value="<?= esc($cita['fecha_cita']) ?>">
                </div>

                <div class="mb-3">
                    <label for="hora_cita" class="form-label">Hora de la Cita:</label>
                    <input type="time" class="form-control" name="hora_cita" id="hora_cita" required
                        value="<?= esc($cita['hora_cita']) ?>">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-control" name="estado" id="estado" required>
                        <option value="">Seleccione estado</option>
                        <option value="Pendiente" <?= $cita['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="Confirmada" <?= $cita['estado'] == 'Confirmada' ? 'selected' : '' ?>>Confirmada</option>
                        <option value="Cancelada" <?= $cita['estado'] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
                        <option value="Finalizada" <?= $cita['estado'] == 'Finalizada' ? 'selected' : '' ?>>Finalizada</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo:</label>
                    <textarea class="form-control" name="motivo" id="motivo" rows="3" required><?= esc($cita['motivo']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="fk_paciente" class="form-label">Paciente:</label>
                    <select class="form-control" name="fk_paciente" id="fk_paciente" required>
                        <option value="">Seleccione un paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= esc($paciente['id_paciente']) ?>" <?= $cita['fk_paciente'] == $paciente['id_paciente'] ? 'selected' : '' ?>>
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
                            <option value="<?= esc($dentista['id_dentista']) ?>" <?= $cita['fk_dentista'] == $dentista['id_dentista'] ? 'selected' : '' ?>>
                                <?= esc($dentista['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg mx-2">Actualizar</button>
                    <a href="<?= base_url('cita_listar') ?>" class="btn btn-secondary btn-lg mx-2">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
