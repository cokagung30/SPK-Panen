<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <?php
                if ($this->session->userdata('level') == 1){
                    echo "Pemilik";
                } else if($this->session->userdata('level') == 2){
                    echo "Pegawai";
                } else{
                    echo "PPL";
                }
            ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <li class="nav-item <?php if ($halaman == 'dashboard') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>pemilik_kandang/Dashboard/index">
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
    <li class="nav-item <?php if ($halaman == 'kandang') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>pemilik_kandang/Kandang/index">
            <i class="fas fa-fw fa-home"></i>
            <span>Kandang</span></a>

    </li>

    <!-- Nav Item - Pegawai Menu -->
    <li class="nav-item <?php if ($halaman == 'pegawai') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>pemilik_kandang/Pegawai/index">
            <i class="fas fa-fw fa-user"></i>
            <span>Pegawai</span></a>

    </li>
    <!-- Nav Item - Pages Periode Menu -->

    <li class="nav-item <?php if ($halaman == 'periode') { echo 'active'; } else{ echo '';} ?>">
        <a class="nav-link" href="<?= base_url(); ?>pemilik_kandang/Periode/index">
            <i class="fas fa-fw fa-table"></i>
            <span>Periode</span></a>

    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <!-- Nav Item - Pages Data Ayam Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Ayam</span>
        </a>
    </li>
    <!-- Nav Item - Pages Data Pengajuan Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengajuan</span>
        </a>
    </li>

    <!-- Nav Item - Charts -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>