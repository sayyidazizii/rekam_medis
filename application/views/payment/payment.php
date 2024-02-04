<div class="container-fluid">
    <h1>Data Pembayaran</h1>
    <div class="row">
        <div class="col">
            <a href="<?= base_url() ?>RekamMedis/tambah_rekam_medis" class="d-grip gap-2 btn btn-primary"><i class="ti ti-plus me-2"></i>Tambah Pembayaran Baru</a>
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
                    <th>No. Pasien</th>
                    <th>No. Kartu</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Tindakan</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
               
            </tbody>
        </table>
    </div>
</div>