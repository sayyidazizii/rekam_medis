<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Laporan Pembayaran</title>
</head>
<body>
  <h3><center>LAPORAN PEMBAYARAN</center></h3>
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
                    <th>Status</th>
                </tr>
    </thead>
    <tbody>
            <<?php
                $no = 0;
                foreach ($data_rekam_medis as $rekam_medis) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $rekam_medis->no_rm ?></td>
                        <td><?= $rekam_medis->no_kartu ?></td>
                        <td><?= $rekam_medis->nama_pasien ?></td>
                        <td><?= $rekam_medis->amnesa ?></td>
                        <td><?= $rekam_medis->diagnosa ?></td>
                        <td><?= $rekam_medis->tanggal_periksa ?></td>
                        <td><?= $rekam_medis->tindakan ?></td>
                        <?php if($rekam_medis->status_bayar == 1){ ?>
                            <td>Dibayar</td>
                        <?php }else{?>
                            <td>Belum Dibayar</td>
                        <?php }?>
                    </tr>

                <?php endforeach ?>
            </tbody>
  </table>
</body>
</html>