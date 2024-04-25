<div class="container-fluid">
    <h1>Detail Pembayaran</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>Payment" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>Payment/update_rekam_medis" method="post">
        <div class="container mt-2"> 
            <table style="width: 100%">
                <tr>
                <tr>
                    <th>Nomor RM</th>
                    <td style="width:80%">
                        <input type="text" hidden name="id_pembayaran" id="id_pembayaran" class="form-control my-2 border-dark" value="<?= $data_pembayaran->id_pembayaran ?>" readonly>
                        <input type="text" hidden name="id_rekam_medis" id="id_rekam_medis" class="form-control my-2 border-dark" value="<?= $rekam_medis->id_rekam_medis ?>" readonly>
                        <input type="text" name="no_rm" id="no_rm" class="form-control my-2 border-dark" value="<?= $rekam_medis->no_rm ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <input type="text" hidden name="id_pasien" id="id_pasien" class="form-control my-2 border-dark" value="<?= $rekam_medis->id_pasien ?>" readonly>
                    <td><input type="text" name="nama_pasien" id="nama_pasien"  class="form-control my-2 border-dark" value="<?= $rekam_medis->nama_pasien ?>" readonly></td>
                </tr>
                <tr>
                    <th>Nomor Kartu</th>
                    <td><input type="text" name="no_kartu" id="no_kartu" class="form-control my-2 border-dark" value="<?= $rekam_medis->no_kartu ?>" readonly></td>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td><input type="text" name="tanggal_pembayaran" id="tanggal_pembayaran" value="<?= $data_pembayaran->tanggal_pembayaran ?>" class="form-control my-2 border-dark" readonly></td>
                </tr>
                <tr>
                    <th>Tindakan</th>
                    <td><input type="text" name="tindakan" id="tindakan" class="form-control my-2 border-dark" value="<?= $rekam_medis->tindakan ?>" readonly></td>
                </tr>
            </table>
            <hr>
            <h4>Detail Rekam Medis</h4>
        <div class="row">
            <div class="col">
            <table class="table table-bordered table-hover" id="table-jasa">
            <thead class="bg-primary">
                <tr>
                    <th>Jasa</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total_tarif = 0;
                foreach($data_rekam_medis_tarif as $item){ 
                $total_tarif += $hargaTarif[$item->id_data_tarif];
                ?>
                <tr>
                    <td><?= $tarifArray[$item->id_data_tarif]?></td>
                    <td><?= $hargaTarif[$item->id_data_tarif]?></td>
                </tr>
                <?php }?>
                <tr>
                    <td class="fw-bold">Total : </td>
                    <td><?= $total_tarif?></td>
                </tr>
            </tbody>
        </table>
            </div>
            <div class="col">
            <table class="table table-bordered table-hover" id="table-obat">
            <thead class="bg-primary">
                <tr>
                    <th>Obat</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $total_obat = 0;
            foreach($data_rekam_medis_obat as $item){ 
                $total_obat += $hargaObat[$item->id_data_obat];
            ?>
                <tr>
                    <td><?= $obatArray[$item->id_data_obat]?></td>
                    <td><?= $item->quantity?></td>
                    <td><?= $hargaObat[$item->id_data_obat]?></td>
                </tr>
            <?php }?>
                <tr>
                    <td class="fw-bold">Total : </td>
                    <td></td>
                    <td><?= $total_obat?></td>
                </tr>
            </tbody>
        </table>
            </div>
        </div>
        <table style="width: 100%">
                <tr>
                <tr>
                    <th>Subtotal</th>
                    <td style="width:80%">
                        <input type="text" name="subtotal" id="subtotal" class="form-control my-2 border-dark" value="<?= $total_tarif + $total_obat?>" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Bayar</th>
                    <td><input type="number" name="bayar" id="bayar"  class="form-control my-2 border-dark"  readonly></td>
                </tr>
                <tr>
                    <th>Kembalian</th>
                    <td><input type="text" name="kembalian" id="kembalian" class="form-control my-2 border-dark" value="0" readonly></td>
                </tr>
            </table>
    </form>

</div>


<script>
    // Ambil elemen-elemen yang dibutuhkan
    var subtotalInput = document.getElementById('subtotal');
    var bayarInput = document.getElementById('bayar');
    var kembalianInput = document.getElementById('kembalian');

    // Tambahkan event listener untuk menghitung kembalian setiap kali nilai bayar berubah
    bayarInput.addEventListener('input', function() {
        // Ambil nilai subtotal dan bayar
        var subtotal = parseFloat(subtotalInput.value);
        var bayar = parseFloat(bayarInput.value);

        // Hitung kembalian
        var kembalian = subtotal- bayar ;

        // Tampilkan kembalian di input kembalian
        kembalianInput.value = kembalian.toFixed(2); // Menggunakan toFixed(2) untuk menampilkan 2 desimal
    });
</script>
