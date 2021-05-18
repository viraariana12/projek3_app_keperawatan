<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('judul-halaman')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Administrasi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nama Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>
                    Profil Admin
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>
                    Keluar
                  </p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{route('admin.pasien.index')}}" class="nav-link">
                  <i class="fas fa-user-injured nav-icon"></i>
                  <p>
                    Pasien
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.perawat.index')}}" class="nav-link">
                  <i class="fas fa-user-nurse nav-icon"></i>
                  <p>
                    Perawat
                  </p>
                </a>
            </li>
            <li class="nav-header">Data Keperawatan</li>
            <li class="nav-item">
                <a href="{{ route('admin.diagnosis.index') }}" class="nav-link">
                    <i class="fas fa-book-medical nav-icon"></i>
                    <p>SDKI (Diagnosis)</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.intervensi.index') }}" class="nav-link">
                    <i class="fas fa-book-medical nav-icon"></i>
                    <p>SIKI (Intervensi)</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.luaran.index') }}" class="nav-link">
                    <i class="fas fa-book-medical nav-icon"></i>
                    <p>SLKI (Luaran)</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('judul-halaman')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                @yield('breadcrumb')

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('isi')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      #
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@yield('script')

</body>
</html>
