<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link">Hello, <b>{{ Auth::user()->name }}</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div style="text-align: center;" class="brand-link">
        <i class="nav-icon fas fa-home"></i><span class="brand-text font-weight-light"></span>
      </div>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('images/user.png')}}" class="img-circle">
          </div>
          <div class="info">
            <a href="" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MAIN MENU</li>
            <li class="nav-item">
              <a href="/barang" class="nav-link <?php if ($active == 'Barang') echo 'active'; ?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Barang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/users" class="nav-link <?php if ($active == 'Users') echo 'active'; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/invoice" class="nav-link <?php if ($active == 'Invoice') echo 'active'; ?>">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Invoice
                </p>
              </a>
            </li>
            <li class="nav-header">SETTINGS</li>
            <li class="nav-item">
              <form id="logout-form" action="{{route('logout')}}" method="POST">
                @csrf
                <a href="javascript:;" onclick="document.getElementById('logout-form').submit();" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    Log out
                  </p>
                </a>
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>