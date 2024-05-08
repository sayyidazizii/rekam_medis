<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan Pembayaran</title>
</head>

<body>
    <center>
    <h3>
        <h3>Klinik Gigi Drg. Adriyanto Suryamin</h3>
        <hr>
        <p class="mt-5">LAPORAN PEMBAYARAN</p>
    </h3>
    </center>
    
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
                $subTotal = 0;

      foreach ($data_payment as $pembayaran) :
        $no++;
          $subTotal += $pembayaran->subtotal;
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
          <td>Rp.<?= number_format( $pembayaran->subtotal) ?></td>
        </tr>
      <?php endforeach ?>
      <tr>
                    <td></td>
                    <td colspan="4">Subtotal</td> <!-- Merentangkan kolom dari kolom 1 hingga 3 -->
                    <td>Rp.<?= number_format($subTotal) ?></td>
      </tr>
    </tbody>
  </table>
</body>

</html>