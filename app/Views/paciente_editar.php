<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h3 class="text-center">Editar Paciente</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="<?= base_url('paciente_actualizar/' . $paciente['id_paciente']) ?>" method="post" class="p-4 border rounded bg-light">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required
                        value="<?= esc($paciente['nombre']) ?>">
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" required
                        value="<?= esc($paciente['apellido']) ?>">
                </div>

                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula:</label>
                    <input type="text" class="form-control" name="cedula" id="cedula" required
                        value="<?= esc($paciente['cedula']) ?>">
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" required
                        value="<?= esc($paciente['telefono']) ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="<?= esc($paciente['email']) ?>">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <textarea class="form-control" name="direccion" id="direccion" rows="3"><?= esc($paciente['direccion']) ?></textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg mx-2">Actualizar</button>
                    <a href="<?= base_url('paciente_listar') ?>" class="btn btn-secondary btn-lg mx-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->endSection() ?>
