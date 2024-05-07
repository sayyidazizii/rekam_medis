<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan Pembayaran</title>
</head>

<body>
  <h3>
    <center>LAPORAN PEMBAYARAN</center>
  </h3>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr>
        <th>No.</th>
        <th>No. Kartu</th>
        <th>Nama Pasien</th>
        <th>Nama Jasa</th>
        <th>Tanggal Pembayaran</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
      $no = 0;
      foreach ($data_payment as $pembayaran) :
        $no++;
      ?>

        <tr>
          <td><?= $no ?></td>
          <td><?= $pembayaran->no_kartu ?></td>
          <td><?= $pembayaran->nama_pasien ?></td>
          <td><!-- Di dalam loop foreach untuk menampilkan data pembayaran -->
            <!-- Tampilkan data pembayaran yang lain -->
            <?php foreach ($pembayaran->tarif as $tarif) : ?>
              <!-- Tampilkan nama tarif -->
              <?= $tarif->nama_jasa ?>
            <?php endforeach ?>
            <!-- Tampilkan sisa data pembayaran -->
          </td>
          <td><?= $pembayaran->tanggal_pembayaran ?></td>
          <td><?= $pembayaran->subtotal ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>