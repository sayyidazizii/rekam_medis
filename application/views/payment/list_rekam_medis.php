<div class="container-fluid">
    <h1>Pilih Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>payment" class="btn btn-dark">Kembali</a>
    </div>
        <div class="container mt-2">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                    <div class="d-flex flex-nowrap input-group mb-3">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </div>
            </div>
        </div>
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
                    <th>Aksi</th>
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
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="<?= base_url() ?>Payment/tambah_pembayaran/<?= $rekam_medis->id_rekam_medis ?>" class="btn btn-sm btn-secondary"><i class="ti ti-plus"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
        </div>
</div>