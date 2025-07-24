<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Agregar Dentista</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= site_url('dentista_guardar') ?>" method="post" class="p-4 border rounded bg-light">

                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= old('nombre') ?>" required maxlength="100">
                </div>

                <div class="mb-3">
                    <label for="especialidad" class="form-label">Especialidad:</label>
                    <input type="text" class="form-control" name="especialidad" id="especialidad" value="<?= old('especialidad') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?= old('telefono') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-select" name="estado" id="estado" required>
                        <option value="" <?= old('estado') == '' ? 'selected' : '' ?>>Seleccione estado</option>
                        <option value="activo" <?= old('estado') == 'activo' ? 'selected' : '' ?>>Activo</option>
                        <option value="inactivo" <?= old('estado') == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mx-2">Guardar</button>
                    <a href="<?= base_url('dentista_listar') ?>" class="btn btn-danger btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
