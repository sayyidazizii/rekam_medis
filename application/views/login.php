<?php $this->load->view('layout/top') ?>
<body>
    <div class="container">
        <div class="container w-80" style="position:relative;margin-top:10%;display: flex;align-items: center;justify-content:center">
            <div class="card text">
                <div class="card-body shadow">
                    <!-- form -->
                    <form action="<?php echo site_url() ?>/Login/Auth" method="POST">
                        <h2 class="text-center" style="font-family:Lato">Login</h2>


                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>