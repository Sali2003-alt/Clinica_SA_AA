<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Agregar Paciente</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= site_url('paciente_guardar') ?>" method="post" class="p-4 border rounded bg-light">

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
                    <label for="nombre" class="form-label">Nombre Paciente:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= old('nombre') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?= old('apellido') ?>" required>
                </div>

                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula:</label>
                    <input type="text" class="form-control" name="cedula" id="cedula" value="<?= old('cedula') ?>" required>
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
                    <label for="direccion" class="form-label">Dirección:</label>
                    <textarea class="form-control" name="direccion" id="direccion" rows="3"><?= old('direccion') ?></textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mx-2">Guardar</button>
                    <a href="<?= base_url('paciente_listar') ?>" class="btn btn-danger btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
