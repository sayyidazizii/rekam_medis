<div class="container-fluid">
    <h1>Tambah Pasien Baru</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>pasien" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>/pasien/simpan_pasien" method="post">
        <table style="width: 100%">
            <tr>
                <th>Nomor Kartu</th>
                <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-2"></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><input type="text" name="nama_pasien" id="nama" class="form-control my-2"></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><input type="text" name="alamat" id="alamat" class="form-control my-2"></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>
                    <div class="my-2">
                        <div class="d-flex flex-nowrap">
                            <input class="form-check-input mx-2" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki">
                            <label for="laki_laki">Laki-laki</label>
                            <input class="form-check-input mx-2" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>No HP</th>
                <td><input type="text" name="no_hp" id="no_hp" class="form-control my-2"></td>
            </tr>
            <tr>
                <th>Usia</th>
                <td><input type="number" name="umur" id="umur" class="form-control my-2"></td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td><input type="text" name="pekerjaan" id="pekerjaan" class="form-control my-2"></td>
            </tr>
            <tr>
                <th></th>
                <td><button type="submit" class="btn btn-primary my-2">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>