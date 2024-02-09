<div class="container-fluid">
    <h1>Laporan Pembayaran</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>Report" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>Report/payment_report" method="get">
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
        <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>No. Kartu</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Subtotal</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
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
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url() ?>Report/export_payment?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-primary">Export <i class="ti ti-download"></i></a>
            <a href="<?= base_url() ?>Report/print_payment?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-primary">Cetak <i class="ti ti-file"></i></a>
        </div>
    </div>
</div>