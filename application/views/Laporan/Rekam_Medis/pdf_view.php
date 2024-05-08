<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Laporan Rekam Medis</title>
</head>

<body>
    <center>
    <h3>
        <h3>Klinik Gigi Drg. Adriyanto Suryamin</h3>
        <hr>
        <p class="mt-5">DATA REKAM MEDIS</p>
    </h3>
    </center>
    
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
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
            </tr>
        </thead>
        <tbody id="myTable">
            <<?php
                $no = 0;
                foreach ($data_rekam_medis as $rekam_medis) :
                    $no++;
                ?> <tr>
                <td><?= $no ?></td>
                <td><?= $rekam_medis->no_rm ?></td>
                <td><?= $rekam_medis->no_kartu ?></td>
                <td><?= $rekam_medis->nama_pasien ?></td>
                <td><?= $rekam_medis->amnesa ?></td>
                <td><?= $rekam_medis->diagnosa ?></td>
                <td><?= $rekam_medis->tanggal_periksa ?></td>
                <td><?= $rekam_medis->tindakan ?></td>

                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
    <p>Dicetak pada : <?= date('d M Y') ?></p>
</body>

</html>