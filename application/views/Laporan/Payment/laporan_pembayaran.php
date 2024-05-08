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
            <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>No. Kartu</th>
                    <th>Nama Pasien</th>
                    <th>Jasa</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $no = 0;
                $subTotal = 0;

                foreach ($data_payment as $pembayaran) :
                    $no++;
                    $subTotal += $pembayaran->subtotal;

                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $pembayaran->no_kartu ?></td>
                        <td><?= $pembayaran->nama_pasien ?></td>
                        <td><!-- Di dalam loop foreach untuk menampilkan data pembayaran -->
                            <!-- Tampilkan data pembayaran yang lain -->
                            <?php foreach ($pembayaran->tarif as $tarif) : ?>
                                <!-- Tampilkan nama tarif -->
                                <?= $tarif->nama_jasa ?>
                            <?php endforeach ?>
                            <!-- Tampilkan sisa data pembayaran -->
                        </td>
                        <td><?= $pembayaran->tanggal_pembayaran ?></td>
                        <td>Rp.<?= number_format($pembayaran->subtotal) ?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td></td>
                    <td colspan="4" class="fw-bold text-center">Subtotal</td> <!-- Merentangkan kolom dari kolom 1 hingga 3 -->
                    <td>Rp.<?= number_format($subTotal) ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url() ?>Report/export_payment?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-primary">Export <i class="ti ti-download"></i></a>
            <a href="<?= base_url() ?>Report/print_payment?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-primary">Cetak <i class="ti ti-file"></i></a>
        </div>
    </div>
</div>