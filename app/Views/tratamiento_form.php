<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Agregar Tratamiento</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('tratamiento_guardar') ?>" method="post" class="p-4 border rounded bg-light">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Tratamiento:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= old('nombre') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción Tratamiento:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required><?= old('descripcion') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label">Costo:</label>
                    <input type="number" step="0.01" class="form-control" name="costo" id="costo" value="<?= old('costo') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?= old('fecha_inicio') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= old('fecha_fin') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="fk_paciente" class="form-label">Paciente:</label>
                    <select class="form-control" name="fk_paciente" id="fk_paciente" required>
                        <option value="">Seleccione un paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= esc($paciente['id_paciente']) ?>" <?= old('fk_paciente') == $paciente['id_paciente'] ? 'selected' : '' ?>>
                                <?= esc($paciente['nombre'] . ' ' . $paciente['apellido']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mx-2">Guardar</button>
                    <a href="<?= base_url('tratamiento_listar') ?>" class="btn btn-danger btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
