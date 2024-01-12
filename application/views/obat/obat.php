<div class="container-fluid">
    <h1>Data obat</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>obat/tambah_obat" class="btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Obat Baru</a>
        </div>
        <div class="col">
            <form action="<?= base_url() ?>obat" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari obat" name="data_obat" style="width: 100%; max-width: 300px;"  value="<?php if ($pencarian != null) {echo $pencarian;} ?>">
                    <button class="btn btn-secondary" type="submit"><i class="ti ti-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 0;
                foreach ($data_obat as $obat) : 
                    $no++;
                    ?>
            
            <tr>
                <td><?= $no ?></td>
                <td><?= $obat->nama_obat ?></td>
                <td><?= $obat->kategori ?></td>
                <td><?= $obat->stok ?></td>
                <td><?= $obat->harga ?></td>
                <td><?= $obat->keterangan ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                    <a href="<?= base_url() ?>obat/ubah_obat/<?= $obat->id_data_obat ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                    <a href="<?= base_url() ?>obat/hapus_obat/<?= $obat->id_data_obat ?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                </td>
            </tr>

            <?php endforeach?>
        </tbody>
    </table>
</div>