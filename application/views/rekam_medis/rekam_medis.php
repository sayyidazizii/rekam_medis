<div class="container-fluid">
    <h1>Data Rekam Medis</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>RekamMedis/tambah_rekam_medis" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Rekam Medis Baru</a>
        </div>
        <div class="col">
            <form action="<?= base_url() ?>RekamMedis" method="get">
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari rekam medis" name="data_rekam_medis" style="width: 100%; max-width: 300px;" value="<?php if ($pencarian != null) {echo $pencarian;} ?>">
                    <button class="btn btn-secondary" type="submit"><i class="ti ti-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. Kartu</th>
                    <th>Nama</th>
                    <th>Amnesa</th>
                    <th>Diagnosa</th>
                    <th>Tanggal</th>
                    <th>Tindakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data_rekam_medis as $rekam_medis) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $rekam_medis->no_kartu ?></td>
                        <td><?= $rekam_medis->nama_pasien ?></td>
                        <td><?= $rekam_medis->amnesa ?></td>
                        <td><?= $rekam_medis->diagnosa ?></td>
                        <td><?= $rekam_medis->tanggal_periksa ?></td>
                        <td><?= $rekam_medis->tindakan ?></td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="<?= base_url() ?>rekamMedis/detail_rekam_medis/<?= $rekam_medis->id_rekam_medis ?>" target="_blank" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                                <a href="<?= base_url() ?>rekamMedis/ubah_rekam_medis/<?= $rekam_medis->id_rekam_medis ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                <a href="<?= base_url() ?>rekamMedis/hapus_rekam_medis/<?= $rekam_medis->id_rekam_medis ?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>