<div class="container-fluid">
    <h1>Data Pembayaran</h1>
    <form action="<?= base_url() ?>Payment/index" method="get">
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
                    <a href="<?= base_url() ?>Payment" class="btn btn-danger">batal</i></a>
                </div>
            </div>
        </div>
    </form>


    <div class="card mt-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="<?= base_url() ?>Payment/list_rekam_medis" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Pembayaran Baru</a>
                </div>
                <div class="col">
                    <div class="d-flex flex-nowrap input-group mb-3">
                        <input class="form-control border-dark" id="myInput" type="text" placeholder="Search..">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No.</th>
                            <th>No. Kartu</th>
                            <th>Nama Pasien</th>
                            <th>Jasa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $no = 0;
                        $subTotal = 0;
                        $totalBayar = 0;
                        $totalKembalian = 0;

                        foreach ($data_payment as $pembayaran) :
                            $no++;
                            $subTotal += $pembayaran->subtotal;
                            $totalBayar += $pembayaran->bayar;
                            $totalKembalian += $pembayaran->kembalian;

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

                                <td>
                                    <div class="d-flex flex-nowrap">
                                        <a href="<?= base_url() ?>Payment/detail_pembayaran/<?= $pembayaran->id_pembayaran ?>" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                                        <a href="<?= base_url() ?>Payment/ubah_pembayaran/<?= $pembayaran->id_pembayaran ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                        <a href="<?= base_url() ?>Payment/hapus_pembayaran/<?= $pembayaran->id_pembayaran ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="ti ti-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td></td>
                            <td colspan="4" class="fw-bold text-center">Subtotal</td> <!-- Merentangkan kolom dari kolom 1 hingga 3 -->
                            <td><?= $subTotal ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <div class="pagination-container">
                        <button id="prevPage" class="btn btn-sm btn-primary">Previous</button>
                        <span id="paginationStatus" class="pagination-status"></span>
                        <button id="nextPage" class="btn btn-sm btn-primary">Next</button>
                    </div>
                </div>
            </div>
        </div>

    </div>