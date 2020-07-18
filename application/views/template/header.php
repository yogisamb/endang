<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dahshboard WO</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('admin'); ?>" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets/image/user_profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $user['username']; ?></a>
            <?php
            $jabatan = $this->db->where('id =', $user['role_id']);
            $jabatan = $this->db->get('user_role')->row_array();
            ?>
            <a href="#" class="d-block"><?= $jabatan['role_title']; ?></a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <!-- query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu =  "SELECT user_menu.id, menu, url, icon
                                        FROM user_menu JOIN user_access_menu
                                        ON user_menu.menu_id = user_access_menu.menu_id
                                        WHERE user_access_menu.role_id = $role_id
                                        ORDER BY user_access_menu.menu_id ASC
                                        ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- looping menu -->
            <?php foreach ($menu as $m) : ?>
              <!-- sub menu -->
              <li class="nav-item">
                <?php if ($title == $m['menu']) : ?>
                  <a href="<?= base_url($m['url']); ?>" class="nav-link active">
                  <?php else : ?>
                    <a href="<?= base_url($m['url']); ?>" class="nav-link">
                    <?php endif; ?>
                    <i class="nav-icon <?= $m['icon']; ?>"></i>
                    <p>
                      <?= $m['menu']; ?>
                    </p>
                    </a>
              </li>
            <?php endforeach; ?>
            <li class="nav-item active">
              <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Logout
                  <span class="right badge badge-danger">Important!</span>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section>
        <?= $this->session->flashdata('message'); ?>
      </section>
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Session login as:</li>
                <li class="breadcrumb-item active"><a href="#"><?= $user['username']; ?></a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>