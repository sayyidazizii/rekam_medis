<div class="container-fluid">
    <h1>Tambah Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>RekamMedis" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>/pasien/simpan_pasien" method="post">
        <table style="width: 100%">
            <tr>
                <th></th>
                <td><button type="submit" class="btn btn-primary my-2">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>