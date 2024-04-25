<div class="container-fluid">
    <h1>Laporan Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>Report" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>Report/rekam_medis_report" method="get">
    <div class="row">
        <div class="col">
            <label for="start_date" class="form-label">Tanggal Awal</label>
            <div class="d-flex flex-nowrap input-group mb-3">
                <input class="form-control" name="start_date" id="start_date" value="<?= $start_date ?>" type="date">
            </div>
        </div>
        <div class="col">
            <label for="end_date" class="form-label">Tanggal Akhir</label>
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input class="form-control" name="end_date" id="end_date" value="<?= $end_date ?>" type="date">
                </div>
        </div>
        <div class="col">
            <label for="search" class="form-label"></label>
                <div class="d-flex flex-nowrap input-group mt-2">
                    <button type="submit" class="btn btn-primary">cari <i class="ti ti-search"></i></button>
                </div>
        </div>
    </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>No. RM</th>
                    <th>No. Kartu</th>
                    <th>Nama</th>
                    <th>Amnesa</th>
                    <th>Diagnosa</th>
                    <th>Tanggal</th>
                    <th>Tindakan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="myTable">
            <?php
                $no = 0;
                foreach ($data_rekam_medis as $rekam_medis) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $rekam_medis->no_rm ?></td>
                        <td><?= $rekam_medis->no_kartu ?></td>
                        <td><?= $rekam_medis->nama_pasien ?></td>
                        <td><?= $rekam_medis->amnesa ?></td>
                        <td><?= $rekam_medis->diagnosa ?></td>
                        <td><?= $rekam_medis->tanggal_periksa ?></td>
                        <td><?= $rekam_medis->tindakan ?></td>
                        <?php if($rekam_medis->status_bayar == 1){ ?>
                            <td>Dibayar</td>
                        <?php }else{?>
                            <td>Belum Dibayar</td>
                        <?php }?>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url() ?>Report/export_rekam_medis?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-primary">Export <i class="ti ti-download"></i></a>
            <a href="<?= base_url() ?>Report/print_rekam_medis?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-primary">Cetak <i class="ti ti-file"></i></a>
        </div>
    </div>
</div>