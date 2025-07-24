<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CIYA - Sistema Odontológico</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/ico.jpg') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css') ?>" />
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?= base_url() ?>" class="text-nowrap logo-img">
            <img src="<?= base_url('assets/images/logos/ico.jpg') ?>" width="100" alt="Logo CIYA" style="margin-left: 50px;"/>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <?php if(session('logged_in')): ?>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Inicio</span>
              </li>

              <!-- Pacientes -->
              <li class="nav-small-cap mt-3">
                <i class="ti ti-user-plus nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Pacientes</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)">
                  <i class="ti ti-user-heart"></i>
                  <span class="hide-menu">Gestión de Pacientes</span>
                </a>
                <ul class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?= base_url('paciente_agregar') ?>" class="sidebar-link">
                      <i class="ti ti-user-plus"></i><span class="hide-menu">Registrar Paciente</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="<?= base_url('paciente_listar') ?>" class="sidebar-link">
                      <i class="ti ti-list"></i><span class="hide-menu">Lista de Pacientes</span>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Dentistas -->
              <li class="nav-small-cap mt-3">
                <i class="ti ti-user-star nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Dentistas</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)">
                  <i class="ti ti-dental"></i>
                  <span class="hide-menu">Gestión de Dentistas</span>
                </a>
                <ul class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?= base_url('dentista_agregar') ?>" class="sidebar-link">
                      <i class="ti ti-user-plus"></i><span class="hide-menu">Registrar Dentista</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="<?= base_url('dentista_listar') ?>" class="sidebar-link">
                      <i class="ti ti-list"></i><span class="hide-menu">Lista de Dentistas</span>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Citas -->
              <li class="nav-small-cap mt-3">
                <i class="ti ti-calendar nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Citas</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)">
                  <i class="ti ti-calendar-plus"></i>
                  <span class="hide-menu">Gestión de Citas</span>
                </a>
                <ul class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?= base_url('cita_agregar') ?>" class="sidebar-link">
                      <i class="ti ti-calendar-plus"></i><span class="hide-menu">Agregar Cita</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="<?= base_url('cita_listar') ?>" class="sidebar-link">
                      <i class="ti ti-list-details"></i><span class="hide-menu">Lista de Citas</span>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Tratamientos -->
              <li class="nav-small-cap mt-3">
                <i class="ti ti-medical-cross nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Tratamientos</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)">
                  <i class="ti ti-medical-cross"></i>
                  <span class="hide-menu">Gestión de Tratamientos</span>
                </a>
                <ul class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?= base_url('tratamiento_agregar') ?>" class="sidebar-link">
                      <i class="ti ti-medical-cross"></i><span class="hide-menu">Agregar Tratamiento</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="<?= base_url('tratamiento_listar') ?>" class="sidebar-link">
                      <i class="ti ti-list-details"></i><span class="hide-menu">Lista de Tratamientos</span>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Historial Clínico -->
              <li class="nav-small-cap mt-3">
                <i class="ti ti-file-text nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Historial Clínico</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)">
                  <i class="ti ti-file-text"></i>
                  <span class="hide-menu">Gestión de Historial Clínico</span>
                </a>
                <ul class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="<?= base_url('historial_agregar') ?>" class="sidebar-link">
                      <i class="ti ti-file-plus"></i><span class="hide-menu">Agregar Historial</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="<?= base_url('historial_listar') ?>" class="sidebar-link">
                      <i class="ti ti-list-details"></i><span class="hide-menu">Lista de Historiales</span>
                    </a>
                  </li>
                </ul>
              </li>

              <!-- Reportes -->
              <li class="nav-small-cap mt-3">
                <i class="ti ti-report-medical nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Reportes</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('reportes') ?>">
                  <i class="ti ti-chart-bar"></i>
                  <span class="hide-menu">Generar Reportes</span>
                </a>
              </li>
            <?php else: ?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="<?= base_url('/login') ?>">
                  <i class="ti ti-login"></i>
                  <span class="hide-menu">Iniciar Sesión</span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <?php if(session('logged_in')): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="user-profile-img">
                        <img src="<?= base_url('assets/images/profile/user-1.jpg') ?>" class="rounded-circle"
                          width="35" height="35" alt="Foto de perfil" />
                      </div>
                      <div class="ms-2 d-none d-sm-block">
                        <p class="mb-0 fs-3"><?= session('nombre') ?? 'Usuario' ?></p>
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                    <div class="message-body">
                      <a href="<?= base_url('perfil') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                        <i class="ti ti-user fs-6"></i>
                        <p class="mb-0 fs-3">Mi Perfil</p>
                      </a>
                      <a href="<?= base_url('configuracion') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                        <i class="ti ti-settings fs-6"></i>
                        <p class="mb-0 fs-3">Configuración</p>
                      </a>
                      <form action="<?= base_url('logout') ?>" method="get" class="mt-2">
                        <button type="submit" class="btn btn-outline-primary mx-3 w-100">Cerrar Sesión</button>
                      </form>
                    </div>
                  </div>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a href="<?= base_url('/login') ?>" class="btn btn-primary">Iniciar Sesión</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Header End -->

      <div class="container-fluid">
        <!-- Mostrar mensajes flash -->
        <?php if(session('msg')): ?>
          <div class="alert alert-<?= session('msg_type') ?? 'info' ?> alert-dismissible fade show mt-3">
            <?= session('msg') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
      </div>
    </div>
  </div>

  <!-- Scripts necesarios -->
  <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
  <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

  <!-- Sección de scripts personalizados -->
  <?= $this->renderSection('scripts') ?>
</body>
</html>