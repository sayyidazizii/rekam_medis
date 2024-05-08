<div class="body-wrapper">

<!--  Header Start -->
<header class="app-header  bg-primary">
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?php echo base_url() ?>assets/Modernize/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                  <span class="mx-2 text-sm"><?= $_SESSION['nama'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                    <p class="text-center">
                    <i class="fas fa-user"></i>    
                      <?= $_SESSION['nama'] ?>
                  </p>
                  </div>
                  <div class="message-body">
                    <a href="<?= base_url()?>login/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

