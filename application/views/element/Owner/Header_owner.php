<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Owner E-market</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendors/css/vendor.bundle.addons.css'); ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css'); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/admin.png'); ?>" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url('Owner_controller/Beranda'); ?>">
          <img style="width: 139px;height: 39px;" src="<?php echo base_url('assets/images/home/logo.png'); ?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('Owner_controller/Beranda'); ?>">
          <img src="<?php echo base_url('assets/admin/images/logo-mini.svg'); ?>" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a class="nav-link">Selamat datang Owner!
              <span class="badge badge-primary ml-1">Baru</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Laporan terkini</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Pelayanan terbaik</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hai, <?php echo $this->session->userdata("namaowner"); ?>!</span>
              <img class="img-xs rounded-circle" src="<?php echo base_url('assets/images/admin.png'); ?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                 <!--  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div> -->
                </div>
              </a>
              <!-- <a class="dropdown-item mt-2" href="">
                Kelola akun
              </a> -->
              <!-- <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a> -->
              <a class="dropdown-item" href="<?php echo base_url('Admin_controller/A_logout') ?>">
                Keluar
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo base_url('assets/images/admin.png'); ?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $this->session->userdata("namaowner"); ?></p>
                  <div>
                    <small class="designation text-muted">id: <?php echo $this->session->userdata("iduserowner"); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/Beranda'); ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/O_laporan'); ?>">
              <i class="menu-icon mdi mdi-receipt"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/O_user'); ?>">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Pegawai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/A_user'); ?>">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/O_produk'); ?>">
              <i class="menu-icon mdi mdi-food"></i>
              <span class="menu-title">Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/A_kategori'); ?>">
              <i class="menu-icon mdi mdi-shopping"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/A_bukti'); ?>">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Bukti pembayaran</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Owner_controller/A_contact'); ?>">
              <i class="menu-icon mdi mdi-message-text"></i>
              <span class="menu-title">Kontak</span>
            </a>
          </li>
      </nav>
