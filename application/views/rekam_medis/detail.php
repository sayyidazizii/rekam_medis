<div class="container-fluid">
    <h1>Detail Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>RekamMedis" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>RekamMedis/update_rekam_medis" method="post">
        <div class="container mt-2"> 
            <table style="width: 100%">
                <tr>
                <tr>
                    <th>Nomor Kartu</th>
                    <td>
                        <input type="text" name="id_rekam_medis" hidden id="id_rekam_medis" class="form-control my-2 border-dark bg-warning" value="<?= $data_rekam_medis->id_rekam_medis ?>" readonly>
                        <input type="text" name="nama_pasien" id="nama_pasien" class="form-control my-2 border-dark bg-warning" value="<?= $data_rekam_medis->no_kartu ?>" readonly>
                        <input type="text" name="id_pasien" hidden id="id_pasien" class="form-control my-2 border-dark bg-warning" value="<?= $data_rekam_medis->id_pasien ?>" readonly>

                    </td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td><input type="text" name="nama_pasien" id="nama_pasien" class="form-control my-2 border-dark  bg-warning" value="<?= $data_rekam_medis->nama_pasien ?>" readonly></td>
                </tr>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td><input type="date" name="tanggal_periksa" id="tanggal_periksa" class="form-control my-2 border-dark" value="<?= $data_rekam_medis->tanggal_periksa ?>" readonly></td>
                </tr>
                <tr>
                    <th>Amnesa</th>
                    <td><input type="text" name="amnesa" id="amnesa" class="form-control my-2 border-dark" value="<?= $data_rekam_medis->amnesa ?>" readonly></td>
                </tr>
                <tr>
                    <th>Diagnosa</th>
                    <td><input type="text" name="diagnosa" id="diagnosa" class="form-control my-2 border-dark" value="<?= $data_rekam_medis->diagnosa ?>" readonly></td>
                </tr>
                <tr>
                    <th>Tindakan</th>
                    <td><input type="text" name="tindakan" id="tindakan" class="form-control my-2 border-dark" value="<?= $data_rekam_medis->tindakan ?>" readonly></td>
                </tr>
            </table>
            <hr>
            <h4>Detail Rekam Medis</h4>
        <div class="row">
            <div class="col">
            <table class="table table-borderless table-hover" id="table-jasa">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Jasa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data_rekam_medis_tarif as $item){ ?>
                <tr>
                    <td><?= $tarifArray[$item->id_data_tarif]?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
            </div>
            <div class="col">
            <table class="table table-borderless table-hover" id="table-obat">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Obat</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data_rekam_medis_obat as $item){ ?>
                <tr>
                    <td><?= $obatArray[$item->id_data_obat]?></td>
                    <td><?= $item->quantity?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
            </div>
        </div>
    </form>

</div>
