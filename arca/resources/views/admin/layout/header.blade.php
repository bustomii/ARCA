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
          <!-- <a href="#" class="nav-link">>nbs.</a> -->
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link"><b></b></a>
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
            <a href="" class="d-block">Bustomi</a>
          </div>
        </div>
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MAIN MENU</li>
            <?php if ('home' == 'home') { ?>
              <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link active">
                  <i class="nav-icon fas fa-briefcase"></i>
                <?php } else { ?>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="nav-icon fas fa-briefcase"></i>
                <?php } ?>
                <p>
                  Barang
                </p>
                </a>
              </li>
              <?php if ('home' == 'users') { ?>
                <li class="nav-item has-treeview menu-open">
                  <a href="" class="nav-link active">
                    <i class="nav-icon fas fa-users"></i>
                  <?php } else { ?>
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                  <?php } ?>
                  <p>
                    User
                  </p>
                  </a>
                </li>
                <?php if ('home' == 'invoice') { ?>
                  <li class="nav-item has-treeview menu-open">
                    <a href="" class="nav-link active">
                      <i class="nav-icon fas fa-file-invoice"></i>
                    <?php } else { ?>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="nav-icon fas fa-file-invoice"></i>
                    <?php } ?>
                    <p>
                      Invoice
                    </p>
                    </a>
                  </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>