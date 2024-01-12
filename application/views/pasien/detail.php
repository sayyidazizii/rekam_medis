<div class="container-fluid">
    <h1>Data Pasien</h1>
    <table class="table mt-3" style="max-width: 720px; width: 100%;">
        <?php foreach ($data_pasien as $pasien) : ?>
            <tr>
                <th>Nomor Kartu</th>
                <th>:</th>
                <td><?= $pasien->no_kartu ?></td>
            </tr>
            <tr>
                <th>Nama Pasien</th>
                <th>:</th>
                <td><?= $pasien->nama_pasien ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <th>:</th>
                <td><?= $pasien->jenis_kelamin ?></td>
            </tr>
            <tr>
                <th>Usia</th>
                <th>:</th>
                <td><?= $pasien->umur ?></td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <th>:</th>
                <td><?= $pasien->no_telepon ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?= $pasien->alamat ?></td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <th>:</th>
                <td><?= $pasien->pekerjaan ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<script>
    window.print()
</script>