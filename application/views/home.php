          <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">

            <?php if($_SESSION['level'] == 1){?>
            <div class="col-sm-6 col-xl-4">
              <div class="card overflow-hidden rounded-2">
                <div class="card-body pt-5 p-4">
                  <h6 class="fw-semibold fs-4"> 
                  <div class="row">
                    <div class="col">
                    <i class="fas fa-user fs-8"></i>    
                    </div>
                    <div class="col">
                    Total Pasien
                    <h6 class="fw-semibold fs-4 mb-0">
                    <?= $user ?>  
                      <span class="ms-2 fw-normal text-muted fs-3">
                      </span>
                    </h6>
                      </div>
                  </div>         
                  </h6>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 3){?>
          <div class="col-sm-6 col-xl-4">
            <div class="card overflow-hidden rounded-2">
              <div class="card-body pt-5 p-4">
                <h6 class="fw-semibold fs-4">
                <div class="row">
                    <div class="col">
                      <i class="fas fa-shopping-bag fs-8"></i>             
                    </div>
                    <div class="col">
                    Data Obat
                      <h6 class="fw-semibold fs-4 mb-0">
                      <?= $obat ?>
                        <span class="ms-2 fw-normal text-muted fs-3">
                        </span>
                      </h6>
                    </div>
                </div>  
                  </h6>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){?>
          <div class="col-sm-6 col-xl-4">
            <div class="card overflow-hidden rounded-2">
              <div class="card-body pt-5 p-4">
                <h6 class="fw-semibold fs-4">
                    <div class="row">
                      <div class="col">
                        <i class="fas fa-hospital fs-8"></i>             
                      </div>
                      <div class="col">
                      Total Rekam Medis
                        <h6 class="fw-semibold fs-4 mb-0">
                        <?= $rekam_medis ?>
                          <span class="ms-2 fw-normal text-muted fs-3">
                          </span>
                        </h6>
                      </div>
                    </div>  
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="container">
            <h6>Data Rekam Medis</h6>
          <canvas id="myChart" style="width: 100%; max-width:300px; margin-left:auto; margin-right:auto;"></canvas>
          </div>

        </div>