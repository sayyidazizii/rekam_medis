<div class="container-fluid">
    <h1>Tambah Obat Baru</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>obat" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>/obat/simpan_obat" method="post">
        <table style="width: 100%">
            <tr>
                <th>Nama Obat</th>
                <td><input type="text" name="nama_obat" class="form-control my-2 border-dark"></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>
                    <select name="kategori" class="form-select">
                        <option value="Obat Ringan">Obat Ringan</option>
                        <option value="Obat Sedang">Obat Sedang</option>
                        <option value="Obat Keras">Obat Keras</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Stok</th>
                <td><input type="number" name="stok" class="form-control my-2 border-dark"></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td><input type="number" name="harga" class="form-control my-2 border-dark"></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><input type="text" name="keterangan" class="form-control my-2 border-dark"></td>
            </tr>
            <tr>
                <th></th>
                <td><button type="submit" class="btn btn-primary my-2">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>