<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?= base_url('')?>" class="d-flex align-items-center">
          <img src="<?= base_url('')?>/assets/img/logo.jpg" class="rounded-circle" width="40" alt="">
          <span class="fw-bolder text-dark fs-6 mx-2">REKAM MEDIS</span>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('Home') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <?php if($_SESSION['level'] == 1 ){?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('Pasien') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Pasien</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('Tarif') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-receipt-tax"></i>
                </span>
                <span class="hide-menu">Data Tarif</span>
              </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['level'] == 3){?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('Obat') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-pill"></i>
                </span>
                <span class="hide-menu">Data Obat</span>
              </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('RekamMedis') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Rekam Medis</span>
              </a>
            </li>
            <?php if($_SESSION['level'] == 1){?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('Payment') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-file-dollar"></i>
                </span>
                <span class="hide-menu">Pembayaran</span>
              </a>
            </li>
            <?php } ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('Report') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['level'] == 0  ){?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?php echo base_url('User') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">User</span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>