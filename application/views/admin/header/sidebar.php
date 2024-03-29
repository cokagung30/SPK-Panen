<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <li class="nav-item <?php if ($halaman == 'dashboard_admin') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin/Dashboard_admin/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Kandang Menu -->
    <li class="nav-item <?php if ($halaman == 'ppl') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin/Ppl/index">
            <i class="fas fa-fw fa-home"></i>
            <span>PPL</span></a>

    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <!-- Nav Item - Pages Data Ayam Menu -->
    <li class="nav-item <?php if ($halaman == 'pemilik_kandang') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin/Pemilik_kandang/index">
            <i class="fas fa-fw fa-home"></i>
            <span>Pemilik Kandang</span></a>
    </li>

    <!-- Nav Item - Pages Data Pengajuan Menu -->

    <!-- Nav Item - Charts -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>