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
                    <th>Nama Pasien</th>
                    <th>No. Kartu</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Subtotal</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                </tr>
    </thead>
    <tbody>
            <?php
                $no = 0;
                foreach ($data_payment as $pembayaran) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $pembayaran->nama_pasien ?></td>
                        <td><?= $pembayaran->no_kartu ?></td>
                        <td><?= $pembayaran->tanggal_pembayaran ?></td>
                        <td><?= $pembayaran->subtotal ?></td>
                        <td><?= $pembayaran->bayar ?></td>
                        <td><?= $pembayaran->kembalian ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
  </table>
</body>
</html>