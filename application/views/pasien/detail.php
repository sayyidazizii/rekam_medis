<div class="container-fluid">
    <h1>Data Pasien</h1>
    <table class="table mt-3" style="max-width: 720px; width: 100%;">
        <tr>
            <th>Nomor Kartu</th>
            <th>:</th>
            <td><?= $data_pasien->no_kartu ?></td>
        </tr>
        <tr>
            <th>Nama Pasien</th>
            <th>:</th>
            <td><?= $data_pasien->nama_pasien ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <th>:</th>
            <td><?= $data_pasien->jenis_kelamin ?></td>
        </tr>
        <tr>
            <th>Usia</th>
            <th>:</th>
            <td><?= $data_pasien->umur ?></td>
        </tr>
        <tr>
            <th>Nomor HP</th>
            <th>:</th>
            <td><?= $data_pasien->no_telepon ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <th>:</th>
            <td><?= $data_pasien->alamat ?></td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <th>:</th>
            <td><?= $data_pasien->pekerjaan ?></td>
        </tr>
    </table>
</div>
<script>
    window.print()
</script>