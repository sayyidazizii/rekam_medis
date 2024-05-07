<div class="container-fluid">
    <h1>Data Rekam Medis</h1>
    <div class="row">
        <div class="col">
            <?php if ($_SESSION['level'] == 1) { ?>
                <a href="<?= base_url() ?>RekamMedis/tambah_rekam_medis" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Rekam Medis Baru</a>
            <?php } ?>
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
                                <a href="<?= base_url() ?>rekamMedis/detail_rekam_medis/<?= $rekam_medis->id_rekam_medis ?>" class="btn btn-sm btn-info"><i class="ti ti-eye"></i></a>
                                <?php if ($_SESSION['level'] == 1) { ?>
                                    <a href="<?= base_url() ?>rekamMedis/ubah_rekam_medis/<?= $rekam_medis->id_rekam_medis ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                    <a href="<?= base_url() ?>rekamMedis/hapus_rekam_medis/<?= $rekam_medis->id_rekam_medis ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="ti ti-trash"></i></a>

                                <?php } ?>


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