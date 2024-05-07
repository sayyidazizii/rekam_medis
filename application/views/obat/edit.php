<div class="container-fluid">
    <h1>Tambah Obat Baru</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>obat" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>/obat/simpan_ubah_obat" method="post">
        <table style="width: 100%">
            <input type="hidden" name="id_obat" value="<?= $data_obat->id_data_obat ?>">
            <tr>
                <th>Nama Obat</th>
                <td><input type="text" name="nama_obat" class="form-control my-2 border-dark" value="<?= $data_obat->nama_obat ?>"></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>
                    <select name="kategori" class="form-select">
                        <option value="Obat Ringan" <?php if ($data_obat->kategori == "Obat Ringan") {
                                                        echo "selected";
                                                    } ?>>Obat Ringan</option>
                        <option value="Obat Sedang" <?php if ($data_obat->kategori == "Obat Sedang") {
                                                        echo "selected";
                                                    } ?>>Obat Sedang</option>
                        <option value="Obat Keras" <?php if ($data_obat->kategori == "Obat Keras") {
                                                        echo "selected";
                                                    } ?>>Obat Keras</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Stok</th>
                <td><input type="number" name="stok" class="form-control my-2 border-dark" value="<?= $data_obat->stok ?>"></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td><input type="number" name="harga" class="form-control my-2 border-dark" value="<?= $data_obat->harga ?>"></td>
            </tr>
            <tr>
                <th>Expired date</th>
                <td><input type="date" name="expired_date" class="form-control my-2 border-dark" value="<?= $data_obat->expired_date ?>"></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><input type="text" name="keterangan" class="form-control my-2 border-dark" value="<?= $data_obat->keterangan ?>"></td>
            </tr>
            <tr>
                <th></th>
                <td><button type="submit" class="btn btn-primary my-2">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>