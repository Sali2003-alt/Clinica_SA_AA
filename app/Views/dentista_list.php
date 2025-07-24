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

    #dentistas_wrapper {
        margin-top: 1rem;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4 text-primary">Lista de Dentistas</h2>

    <table id="dentistas" class="table table-bordered table-striped table-hover shadow-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dentistas as $dentista): ?>
                <tr>
                    <td><?= esc($dentista['id_dentista']) ?></td>
                    <td><?= esc($dentista['nombre']) ?></td>
                    <td><?= esc($dentista['especialidad']) ?></td>
                    <td><?= esc($dentista['telefono']) ?></td>
                    <td><?= esc($dentista['email']) ?></td>
                    <td><?= esc(ucfirst($dentista['estado'])) ?></td>
                    <td>
                        <a href="<?= base_url('dentista_editar/' . $dentista['id_dentista']) ?>" class="btn btn-warning btn-sm">
                            <i class="ti ti-pencil"></i>Editar
                        </a>
                        <a href="<?= base_url('dentista_eliminar/' . $dentista['id_dentista']) ?>"
                           onclick="return confirm('¿Estás seguro de eliminar este dentista?')"
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
        $('#dentistas').DataTable({
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
