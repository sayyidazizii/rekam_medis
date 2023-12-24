<nav class="navbar nav-dark navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="<?php echo base_url('Home')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo base_url('buku')?>">Data Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo base_url('User')?>">Data User</a>
        </li>
        <?php if ($this->session->userdata('id_level') == 1){ ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo base_url('Join')?>">Join tabler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
        <?php }?>
      </ul>
      <form class="d-flex" role="search">
        <a class="btn btn-danger" href="<?php echo base_url('Login/logout')?>">Logout</a>
      </form>
    </div>
  </div>
</nav>