<div class="body-wrapper">
  <header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <li class="mx-2">
            <a href="<?= base_url()?>login/logout" class="btn" style="background-color: #dc3545; color: white">Logout</a>
          </li>
          <li class="mx-2">
            <h4 class="mt-2"><?= $this->session->userdata('nama') ?></h4>
          </li>
          <li class="mx-2">
            <img src="<?php echo base_url() ?>assets/Modernize/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
          </li>
        </ul>
      </div>
    </nav>
  </header>