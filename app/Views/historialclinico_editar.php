<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Editar Historial Clínico</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= base_url('historialclinico_actualizar/' . $historial['id_historial']) ?>" method="post" class="p-4 border rounded bg-light">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="diagnostico" class="form-label">Diagnóstico :</label>
                    <input type="text" class="form-control" name="diagnostico" id="diagnostico" required
                        value="<?= esc($historial['diagnostico']) ?>">
                </div>

                <div class="mb-3">
                    <label for="tratamiento_realizado" class="form-label">Tratamiento Realizado:</label>
                    <input type="text" class="form-control" name="tratamiento_realizado" id="tratamiento_realizado" required
                        value="<?= esc($historial['tratamiento_realizado']) ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" required
                        value="<?= esc($historial['fecha']) ?>">
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones:</label>
                    <textarea class="form-control" name="observaciones" id="observaciones" rows="3"><?= esc($historial['observaciones']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="fk_paciente" class="form-label">Paciente:</label>
                    <select class="form-control" name="fk_paciente" id="fk_paciente" required>
                        <option value="">Seleccione un paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= esc($paciente['id_paciente']) ?>"
                                <?= $historial['fk_paciente'] == $paciente['id_paciente'] ? 'selected' : '' ?>>
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
                            <option value="<?= esc($dentista['id_dentista']) ?>"
                                <?= $historial['fk_dentista'] == $dentista['id_dentista'] ? 'selected' : '' ?>>
                                <?= esc($dentista['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg mx-2">Actualizar</button>
                    <a href="<?= base_url('historialclinico_listar') ?>" class="btn btn-secondary btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Aquí puedes añadir scripts específicos si los necesitas -->
<?= $this->endSection() ?>
