<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Agregar Historial Clínico</h3>

    <?php if (session()->has('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= base_url('historialclinico_guardar') ?>" method="post" class="p-4 border rounded bg-light">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="diagnostico" class="form-label">Diagnóstico: </label>
                    <input type="text" name="diagnostico" id="diagnostico" class="form-control" value="<?= old('diagnostico') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tratamiento_realizado" class="form-label">Tratamiento Realizado</label>
                    <input type="text" name="tratamiento_realizado" id="tratamiento_realizado" class="form-control" value="<?= old('tratamiento_realizado') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?= old('fecha') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" class="form-control" rows="3"><?= old('observaciones') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="fk_paciente" class="form-label">Paciente</label>
                    <select name="fk_paciente" id="fk_paciente" class="form-select" required>
                        <option value="">Seleccione un paciente</option>
                        <?php foreach ($pacientes as $paciente) : ?>
                            <option value="<?= esc($paciente['id_paciente']) ?>" <?= old('fk_paciente') == $paciente['id_paciente'] ? 'selected' : '' ?>>
                                <?= esc($paciente['nombre']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fk_dentista" class="form-label">Dentista</label>
                    <select name="fk_dentista" id="fk_dentista" class="form-select" required>
                        <option value="">Seleccione un dentista</option>
                        <?php foreach ($dentistas as $dentista) : ?>
                            <option value="<?= esc($dentista['id_dentista']) ?>" <?= old('fk_dentista') == $dentista['id_dentista'] ? 'selected' : '' ?>>
                                <?= esc($dentista['nombre']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mx-2">Guardar</button>
                    <a href="<?= base_url('historialclinico_listar') ?>" class="btn btn-danger btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
