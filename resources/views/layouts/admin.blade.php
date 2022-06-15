<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <x-title />
    <x-favico />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                @if (auth()->user()->role == 'admin')
                    <x-backend.notification />
                @endif

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (auth()->user()->avatar == null)
                            <img src="https://ui-avatars.com/api/?size=128&name={{ auth()->user()->name }}"
                                class="user-image img-circle" alt="img">
                        @else
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="user-image img-circle"
                                width="128" alt="img">
                        @endif
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-primary">
                            @if (auth()->user()->avatar == null)
                                <img src="https://ui-avatars.com/api/?size=128&name={{ auth()->user()->name }}"
                                    class="img-circle" alt="img">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-circle"
                                    width="128" alt="img">
                            @endif
                            <p>
                                {{ auth()->user()->name }}
                                <small>{{ auth()->user()->created_at->format('d-M-Y') }}</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <a href="{{ route('profile.index') }}" class="btn btn-default btn-flat">Profile</a>
                            <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Sign out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->

            <a href="/" class="brand-link">
                <x-backend.sidemenu-logo />
                <x-backend.sidemenu-name />
            </a>

            <div class="status text-center mt-2 text-primary">
                <span>&bull; Online</span>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar">

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.index') }}"
                                    class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <x-backend.side-menu />

                            @if (auth()->user()->role == 'admin')
                                <li class="nav-header">MENU SISTEM</li>
                                <li
                                    class="nav-item
                            {{ Request::is('admin/user') ? 'menu-open' : '' }}
                            {{ Request::is('admin/user/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/bendera') ? 'menu-open' : '' }}
                            {{ Request::is('admin/bendera/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/pelabuhan') ? 'menu-open' : '' }}
                            {{ Request::is('admin/pelabuhan/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/terminal') ? 'menu-open' : '' }}
                            {{ Request::is('admin/terminal/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/jenis_kapal') ? 'menu-open' : '' }}
                            {{ Request::is('admin/jenis_kapal/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/status_kapal') ? 'menu-open' : '' }}
                            {{ Request::is('admin/status_kapal/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/status_trayek') ? 'menu-open' : '' }}
                            {{ Request::is('admin/status_trayek/*') ? 'menu-open' : '' }}
                            {{ Request::is('admin/permissions') ? 'menu-open' : '' }}
                            {{ Request::is('admin/permissions/*') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link ">
                                        <i class="nav-icon fas fa-database"></i>
                                        <p>
                                            Master Data
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item ">
                                            <a href="{{ route('user.index') }}"
                                                class="nav-link {{ Request::is('admin/user/*') ? 'active' : '' }}{{ Request::is('admin/user') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-user"></i>
                                                <p>
                                                    Data User
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}"
                                                class="nav-link {{ Request::is('admin/permissions/*') ? 'active' : '' }}{{ Request::is('admin/permissions') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-shield-alt"></i>
                                                <p>
                                                    Permission
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="{{ route('bendera.index') }}"
                                                class="nav-link {{ Request::is('admin/bendera/*') ? 'active' : '' }}{{ Request::is('admin/bendera') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-flag"></i>
                                                <p>
                                                    Data Bendera
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('pelabuhan.index') }}"
                                                class="nav-link {{ Request::is('admin/pelabuhan/*') ? 'active' : '' }}{{ Request::is('admin/pelabuhan') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-anchor"></i>
                                                <p>
                                                    Data Pelabuhan
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('terminal.index') }}"
                                                class="nav-link {{ Request::is('admin/terminal/*') ? 'active' : '' }}{{ Request::is('admin/terminal') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-dolly"></i>
                                                <p>
                                                    Data Terminal
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('jenis_kapal.index') }}"
                                                class="nav-link {{ Request::is('admin/jenis_kapal/*') ? 'active' : '' }}{{ Request::is('admin/jenis_kapal') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-ship"></i>
                                                <p>
                                                    Jenis Kapal
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('status_kapal.index') }}"
                                                class="nav-link {{ Request::is('admin/status_kapal/*') ? 'active' : '' }}{{ Request::is('admin/status_kapal') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-ship"></i>
                                                <p>
                                                    Status Kapal
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('status_trayek.index') }}"
                                                class="nav-link {{ Request::is('admin/status_trayek/*') ? 'active' : '' }}{{ Request::is('admin/status_trayek') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-clock"></i>
                                                <p>
                                                    Status Trayek
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pemberitahuan.index') }}"
                                        class="nav-link {{ Request::is('admin/pemberitahuan') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Pemberitahuan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pengaturan.index') }}"
                                        class="nav-link {{ Request::is('admin/pengaturan/index') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>
                                            Pengaturan
                                        </p>
                                    </a>
                                </li>
                            @endif
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
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            @yield('breadcump')
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <small>Copyright &copy; 2022 strawBerry | Tg.pinang <a href="#"></a>.</small>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/dist/js/adminlte.js"></script>
    {{-- Sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>

    {{-- tooltip --}}
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    {{-- confirm deleted --}}
    <script>
        $(document).on('click', '#btn-hapus', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya,Hapus !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                }
            })
        });
    </script>
    @stack('js')
</body>

</html>
