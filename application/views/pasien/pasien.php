<div class="container-fluid">
    <h1>Data Pasien</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>pasien/tambah_pasien" class="btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Pasien Baru</a>
        </div>
        <div class="col">
            <form action="<?= base_url() ?>pasien" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari pasien" name="data_pasien" style="width: 100%; max-width: 300px;"  value="<?php if ($pencarian != null) {echo $pencarian;} ?>">
                    <button class="btn btn-secondary" type="submit"><i class="ti ti-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Kartu</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No. HP</th>
                <th>Usia</th>
                <th>Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 0;
                foreach ($data_pasien as $pasien) : 
                    $no++;
                    ?>
            
            <tr>
                <td><?= $no ?></td>
                <td><?= $pasien->no_kartu ?></td>
                <td><?= $pasien->nama_pasien ?></td>
                <td><?= $pasien->alamat ?></td>
                <td><?= $pasien->jenis_kelamin ?></td>
                <td><?= $pasien->no_telepon ?></td>
                <td><?= $pasien->umur ?></td>
                <td><?= $pasien->pekerjaan ?></td>
                <td>
                    <a href="<?= base_url() ?>pasien/detail_pasien/<?= $pasien->id_pasien ?>" target="_blank" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                    <a href="<?= base_url() ?>pasien/ubah_pasien/<?= $pasien->id_pasien ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                    <a href="<?= base_url() ?>pasien/hapus_pasien/<?= $pasien->id_pasien ?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                </td>
            </tr>

            <?php endforeach?>
        </tbody>
    </table>
</div>