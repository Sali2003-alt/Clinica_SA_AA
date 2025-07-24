<?= $this->extend('templates/plantilla') ?>

<?= $this->section('content') ?>

<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.3em 0.8em;
        margin-left: 2px;
        border-radius: 0.3rem;
        background-color: #f1f1f1;
        color: #333 !important;
        border: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #072366 !important;
        color: white !important;
    }

    table.dataTable thead {
        background-color: #072366;
        color: white;
    }

    table.dataTable tbody tr:hover {
        background-color: #f3f5ff;
    }

    .btn {
        font-size: 0.85rem;
        padding: 0.4em 0.7em;
    }

    .btn i {
        margin-right: 4px;
    }

    #historiales_wrapper {
        margin-top: 1rem;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4 text-primary">Historial Clínico</h2>

    <table id="historiales" class="table table-bordered table-striped table-hover shadow-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Paciente</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
                <th>Observaciones</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historiales as $historial): ?>
                <tr>
                    <td><?= esc($historial['id_historial']) ?></td>
                    <td><?= esc($historial['paciente_nombre']) ?></td>
                    <td><?= esc($historial['diagnostico']) ?></td>
                    <td><?= esc($historial['tratamiento_realizado']) ?></td>
                    <td><?= esc($historial['observaciones']) ?></td>
                    <td><?= esc($historial['fecha']) ?></td>
                    <td>
                        <a href="<?= base_url('historialclinico_editar/' . $historial['id_historial']) ?>" class="btn btn-warning btn-sm">
                            <i class="ti ti-pencil"></i>Editar
                        </a>
                        <a href="<?= base_url('historialclinico_eliminar/' . $historial['id_historial']) ?>"
                           onclick="return confirm('¿Estás seguro de eliminar este historial?')"
                           class="btn btn-danger btn-sm">
                            <i class="ti ti-trash"></i>Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function () {
        $('#historiales').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            },
            responsive: true,
            pageLength: 5,
            lengthMenu: [[5, 10, 20], [5, 10, 20]],
        });
    });
</script>
<?= $this->endSection() ?>
