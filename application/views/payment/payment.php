<div class="container-fluid">
    <h1>Data Pembayaran</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>Payment/list_rekam_medis" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Pembayaran Baru</a>
        </div>
        <div class="col">
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>No. Kartu</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Subtotal</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
            <?php
                $no = 0;
                foreach ($data_payment as $pembayaran) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $pembayaran->nama_pasien ?></td>
                        <td><?= $pembayaran->no_kartu ?></td>
                        <td><?= $pembayaran->tanggal_pembayaran ?></td>
                        <td><?= $pembayaran->subtotal ?></td>
                        <td><?= $pembayaran->bayar ?></td>
                        <td><?= $pembayaran->kembalian ?></td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="<?= base_url() ?>Payment/detail_pembayaran/<?= $pembayaran->id_pembayaran ?>" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                                <a href="<?= base_url() ?>Payment/ubah_pembayaran/<?= $pembayaran->id_pembayaran ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                <a href="<?= base_url() ?>Payment/hapus_pembayaran/<?= $pembayaran->id_pembayaran ?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>