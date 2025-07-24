<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Editar Tratamiento</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= base_url('tratamiento_actualizar/' . $tratamiento['id_tratamiento']) ?>" method="post" class="p-4 border rounded bg-light">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Tratamiento:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required
                        value="<?= esc($tratamiento['nombre']) ?>">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required><?= esc($tratamiento['descripcion']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="costo" class="form-label">Costo:</label>
                    <input type="number" step="0.01" class="form-control" name="costo" id="costo" required
                        value="<?= esc($tratamiento['costo']) ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required
                        value="<?= esc($tratamiento['fecha_inicio']) ?>">
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required
                        value="<?= esc($tratamiento['fecha_fin']) ?>">
                </div>

                <div class="mb-3">
                    <label for="fk_paciente" class="form-label">Paciente:</label>
                    <select class="form-control" name="fk_paciente" id="fk_paciente" required>
                        <option value="">Seleccione un paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= esc($paciente['id_paciente']) ?>"
                                <?= $tratamiento['fk_paciente'] == $paciente['id_paciente'] ? 'selected' : '' ?>>
                                <?= esc($paciente['nombre'] . ' ' . $paciente['apellido']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg mx-2">Actualizar</button>
                    <a href="<?= base_url('tratamiento_listar') ?>" class="btn btn-secondary btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
