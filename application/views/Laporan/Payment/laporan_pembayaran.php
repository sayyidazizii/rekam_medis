<div class="container-fluid">
    <h1>Laporan Pembayaran</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>Report" class="btn btn-dark">Kembali</a>
    </div>
    <div class="row">
        <div class="col">
            <label for="startdate" class="form-label">Tanggal Awal</label>
            <div class="d-flex flex-nowrap input-group mb-3">
                <input class="form-control" id="startdate" type="date">
            </div>
        </div>
        <div class="col">
            <label for="enddate" class="form-label">Tanggal Akhir</label>
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input class="form-control" id="enddate" type="date">
                </div>
        </div>
        <div class="col">
            <label for="search" class="form-label"></label>
                <div class="d-flex flex-nowrap input-group mt-2">
                    <button type="submit" class="btn btn-primary">cari <i class="ti ti-search"></i></button>
                </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. RM</th>
                    <th>No. Kartu</th>
                    <th>Nama</th>
                    <th>Amnesa</th>
                    <th>Diagnosa</th>
                    <th>Tanggal</th>
                    <th>Tindakan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
               
            </tbody>
        </table>
        <a href="<?= base_url() ?>Report/print_payment" class="btn btn-primary">Cetak</a>
    </div>
</div>