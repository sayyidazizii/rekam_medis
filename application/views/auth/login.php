<?php $this->load->view('layout/top') ?>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?= base_url('')?>/assets/img/logo.jpg" class="rounded-circle" width="100" alt="">
                </a>
                <p class="text-center">Login</p>
                <form action="<?= base_url('Login/Auth')?>" method="POST">
                  <div class="mb-3">
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="username">
                  </div>
                  <div class="mb-4">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url() ?>assets/Modernize-1.0.0/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/Modernize-1.0.0/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>