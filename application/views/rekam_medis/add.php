<div class="container-fluid">
    <h1>Tambah Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>RekamMedis" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>/pasien/simpan_pasien" method="post">
        <div class="container"> 
            <table style="width: 100%">
                <tr>
                <tr>
                    <th>Nomor Kartu</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td><input type="date" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
                <tr>
                    <th>Amnesa</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
                <tr>
                    <th>Diagnosa</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
                <tr>
                    <th>TIndakan</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
            </table>
            <hr>
            <table style="width: 100%">
                <tr>
                <tr>
                    <th>Jasa</th>
                    <td> 
                        <select class="form-select">
                          <option>Disabled select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Obat</th>
                    <td> 
                        <select class="form-select">
                          <option>Disabled select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Stock Tersedia</th>
                    <td><input type="date" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-1"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><button type="submit" class="btn btn-primary my-1">Tambah</button></td>
                </tr>
            </table>
        </div>
    </form>
</div>