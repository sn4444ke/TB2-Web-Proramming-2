<?= $this->extend('layout/BaseView') ?>

<?= $this->section('content') ?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Perpustakaan</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-buku" aria-expanded="true" aria-controls="menu-buku">
                <i class="fas fa-fw fa-book"></i>
                <span>Buku</span>
            </a>
            <div id="menu-buku" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/Buku' ?>">List Buku</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/Buku/Tambah' ?>">Tambah Buku</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-user" aria-expanded="true" aria-controls="menu-user">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
            <div id="menu-user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/User' ?>">List User</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/User/Tambah' ?>">Tambah User</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-anggota" aria-expanded="true" aria-controls="menu-anggota">
                <i class="fas fa-fw fa-user"></i>
                <span>Anggota</span>
            </a>
            <div id="menu-anggota" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/Anggota' ?>">List Anggota</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/Anggota/Tambah' ?>">Tambah Anggota</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-pinjaman-buku" aria-expanded="true" aria-controls="menu-pinjaman-buku">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Peminjaman Buku</span>
            </a>
            <div id="menu-pinjaman-buku" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/PeminjamanBuku' ?>">List Peminjaman</a>
                    <a class="collapse-item" href="<?php echo base_url() . '/PeminjamanBuku/Pinjam' ?>">Peminjaman Buku</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#menu-mahasiswa" aria-expanded="true" aria-controls="menu-anggota">
                <i class="fas fa-fw fa-user"></i>
                <span>Mahasiswa</span>
            </a>
            <div id="menu-mahasiswa" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() . '/mahasiswa' ?>">List Mahasiswa</a>
                    <?php if (session()->dataUser->jabatan_petugas == 'Admin') { ?>
                        <a class="collapse-item" href="<?php echo base_url() . '/mahasiswa/Tambah' ?>">Tambah Mahasiswa</a>
                    <?php } ?>
                </div>
            </div>
        </li>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() . '/Pengembalian' ?>">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Pengembalian Buku</span></a>

        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?= $this->include('layout/topBar') ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Pendapatan Bulanan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pendapatanBulanan ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Pendapatan Tahunan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pendapatanTahunan ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengembalian
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $progressPengembalian ?>%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $progressPengembalian ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Buku Dipinjam</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $bukuDipinjam ?> Buku</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Gambaran Pendapatan</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="<?php echo base_url() . '/PeminjamanBuku' ?>">Peminjaman</a>
                                        <a class="dropdown-item" href="<?php echo base_url() . '/Pengembalian' ?>">Pengembalian</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="<?php echo base_url() . '/PeminjamanBuku' ?>">Peminjaman</a>
                                        <a class="dropdown-item" href="<?php echo base_url() . '/Pengembalian' ?>">Pengembalian</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <?php foreach (explode("::", $earningSource['judul_buku']) as $key => $value) { ?>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-<?php switch ($key) {
                                                                                case 0:
                                                                                    echo 'primary';
                                                                                    break;
                                                                                case 1:
                                                                                    echo 'success';
                                                                                    break;
                                                                                case 2:
                                                                                    echo 'info';
                                                                                    break;
                                                                            } ?>"></i> <?php echo $value ?>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url() . '/login' ?>">Logout</a>

            </div>
        </div>
    </div>
</div>

<script>
    // earning overview
    var earningOverviewLabel = "<?php echo $earningOverview['month'] ?>".split('::');
    var earningOverviewData = "<?php echo $earningOverview['total'] ?>".split('::');

    // earning source
    var earningSourceLabel = "<?php echo $earningSource['judul_buku'] ?>".split('::');
    var earningSourceData = "<?php echo $earningSource['total_pinjam'] ?>".split('::');
</script>

<?= $this->endSection() ?>