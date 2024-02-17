<div class="container-fluid">
    <h1>Tambah Tarif Baru</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>tarif" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>/tarif/simpan_ubah_tarif" method="post">
        <table style="width: 100%">
                <input type="hidden" name="id_tarif" value="<?= $data_tarif->id_data_tarif  ?>">
                <tr>
                    <th>Nama Jasa</th>
                    <td><input type="text" name="nama_jasa" class="form-control my-2 border-dark" value="<?= $data_tarif->nama_jasa  ?>"></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td><input type="number" name="harga" class="form-control my-2 border-dark" value="<?= $data_tarif->harga  ?>"></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td><input type="text" name="keterangan" class="form-control my-2 border-dark" value="<?= $data_tarif->keterangan  ?>"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button type="submit" class="btn btn-primary my-2">Simpan</button></td>
                </tr>
        </table>
    </form>
</div>