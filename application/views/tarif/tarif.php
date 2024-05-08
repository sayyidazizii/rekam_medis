<div class="container-fluid">
    <h1>Data Tarif</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>tarif/tambah_tarif" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Tarif Baru</a>
        </div>
        <div class="col">
            <form action="<?= base_url() ?>tarif" method="get">
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input type="text" class="form-control border-dark" placeholder="Cari tarif" name="data_tarif" style="width: 100%; max-width: 300px;" value="<?php if ($pencarian != null) {
                                                                                                                                                                        echo $pencarian;
                                                                                                                                                                    } ?>">
                    <button class="btn btn-secondary" type="submit"><i class="ti ti-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>Nama Jasa</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $no = 0;
                foreach ($data_tarif as $tarif) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $tarif->nama_jasa ?></td>
                        <td>Rp <?= number_format( $tarif->harga) ?></td>
                        <td><?= $tarif->keterangan ?></td>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="<?= base_url() ?>tarif/ubah_tarif/<?= $tarif->id_data_tarif ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                <a href="<?= base_url() ?>tarif/hapus_tarif/<?= $tarif->id_data_tarif ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="ti ti-trash"></i></a>

                            </div>
                        </td>
                    </tr>

                <?php endforeach ?>
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