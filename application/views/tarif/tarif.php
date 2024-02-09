<div class="container-fluid">
    <h1>Data Tarif</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>tarif/tambah_tarif" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Tarif Baru</a>
        </div>
        <div class="col">
            <form action="<?= base_url() ?>tarif" method="get">
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari tarif" name="data_tarif" style="width: 100%; max-width: 300px;" value="<?php if ($pencarian != null) {echo $pencarian;} ?>">
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
                    <th>Nama Jasa</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($data_tarif as $tarif) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $tarif->nama_jasa ?></td>
                        <td><?= $tarif->harga ?></td>
                        <td><?= $tarif->keterangan ?></td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="<?= base_url() ?>tarif/ubah_tarif/<?= $tarif->id_data_tarif ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                <a href="<?= base_url() ?>tarif/hapus_tarif/<?= $tarif->id_data_tarif ?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>