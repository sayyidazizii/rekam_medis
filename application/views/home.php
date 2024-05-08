          <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
          <?php if ($_SESSION['is_login'] == true) {
          ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat Datang <?= $_SESSION['nama'] ?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php
          }
          ?>
            <?php if($_SESSION['level'] == 1){?>
            <div class="col-sm-6 col-xl-4">
              <div class="card shadow card-hover overflow-hidden rounded-2 bg-primary">
                <div class="card-body pt-5 p-4">
                  <h6 class="fw-semibold fs-4 text-white"> 
                  <div class="row">
                    <div class="col">
                    <i class="fas fa-user fs-8"></i>    
                    </div>
                    <div class="col">
                    Total Pasien
                    <h6 class="fw-semibold fs-4 mb-0 text-white">
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
            <div class="card shadow card-hover overflow-hidden rounded-2 bg-primary">
              <div class="card-body pt-5 p-4">
                <h6 class="fw-semibold fs-4 text-white">
                <div class="row">
                    <div class="col">
                      <i class="fas fa-shopping-bag fs-8"></i>             
                    </div>
                    <div class="col">
                    Data Obat
                      <h6 class="fw-semibold fs-4 mb-0 text-white">
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
            <div class="card shadow card-hover overflow-hidden rounded-2 bg-primary">
              <div class="card-body pt-5 p-4">
                <h6 class="fw-semibold fs-4 text-white">
                    <div class="row">
                      <div class="col">
                        <i class="fas fa-hospital fs-8"></i>             
                      </div>
                      <div class="col">
                      Total Rekam Medis
                        <h6 class="fw-semibold fs-4 mb-0 text-white">
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
            <canvas id="myChart" style="width: 100%; max-width:600px; margin-left:auto; margin-right:auto;"></canvas>
          <!-- <canvas id="pieChart" style="width: 100%; max-width: 600px; height: auto;"></canvas> -->

          </div>

        </div>
        
        
        <script>

        var labels = [];
        var data = [];

        <?php foreach($jumlah_rekam_medis_per_hari as $rm): ?>
            labels.push('<?= $rm->tanggal_periksa ?>');
            data.push(<?= $rm->jumlah_rekam_medis ?>);
        <?php endforeach; ?>

          // var xValues = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
          // var yValues = [55, 49, 44, 24, 15];
          var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
          ];

          new Chart("myChart", {
            type: "pie",
            data: {
              labels: labels,
              datasets: [{
                backgroundColor: barColors,
                data: data
              }]
            },
            options: {
              title: {
                display: true,
                text: "rekam medis"
              }
            }
          });
        </script>
        