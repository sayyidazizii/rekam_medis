<div class="container-fluid">
    <h1>Edit Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>RekamMedis" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>RekamMedis/update_rekam_medis" method="post">
        <div class="container mt-2"> 
            <table style="width: 100%">
                <tr>
                <tr>
                    <th>Nomor Kartu</th>
                    <td>
                        <input type="text" name="id_rekam_medis" hidden id="id_rekam_medis" class="form-control my-1 bg-warning" value="<?= $data_rekam_medis->id_rekam_medis ?>" readonly>
                        <input type="text" name="nama_pasien" id="nama_pasien" class="form-control my-1 bg-warning" value="<?= $data_rekam_medis->no_kartu ?>" readonly>
                        <input type="text" name="id_pasien" hidden id="id_pasien" class="form-control my-1 bg-warning" value="<?= $data_rekam_medis->id_pasien ?>" readonly>

                    </td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td><input type="text" name="nama_pasien" id="nama_pasien" class="form-control my-1  bg-warning" value="<?= $data_rekam_medis->nama_pasien ?>" readonly></td>
                </tr>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td><input type="date" name="tanggal_periksa" id="tanggal_periksa" class="form-control my-1" value="<?= $data_rekam_medis->tanggal_periksa ?>"></td>
                </tr>
                <tr>
                    <th>Amnesa</th>
                    <td><input type="text" name="amnesa" id="amnesa" class="form-control my-1" value="<?= $data_rekam_medis->amnesa ?>"></td>
                </tr>
                <tr>
                    <th>Diagnosa</th>
                    <td><input type="text" name="diagnosa" id="diagnosa" class="form-control my-1" value="<?= $data_rekam_medis->diagnosa ?>"></td>
                </tr>
                <tr>
                    <th>Tindakan</th>
                    <td><input type="text" name="tindakan" id="tindakan" class="form-control my-1" value="<?= $data_rekam_medis->tindakan ?>"></td>
                </tr>
            </table>
            <hr>
            <h4>Detail Rekam Medis</h4>
        <div class="row">
            <div class="col">
            <table class="table table-borderless table-hover" id="table-jasa">
            <thead>
                <tr>
                    <th>Jasa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data_rekam_medis_tarif as $item){ ?>
                <tr>
                    <td><?= $tarifArray[$item->id_data_tarif]?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
            </div>
            <div class="col">
            <table class="table table-borderless table-hover" id="table-obat">
            <thead>
                <tr>
                    <th>Obat</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data_rekam_medis_obat as $item){ ?>
                <tr>
                    <td><?= $obatArray[$item->id_data_obat]?></td>
                    <td><?= $item->quantity?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
            </div>
        </div>
        <button type="submit" class=" btn btn-primary">simpan</button>
    </form>

</div>

    <script>
        $(document).ready(function() {
            
        //nama pasien
        $('#id_pasien').change(function() {
        // Mendapatkan nilai yang dipilih
        var idPasien = $(this).val();
        
            $.ajax({
                url: '<?= base_url() ?>/RekamMedis/nama_Pasien',
                type: 'POST',
                data: {
                    id_pasien: idPasien
                },
                success: function(response) {
                    console.log(response);
                    $('#nama_pasien').val(response);
                    console.log('Data jasa berhasil disimpan di session.');
                },
                error: function() {
                    console.log('Terjadi kesalahan saat menyimpan data jasa.');
                }
            });
    });    


        $('#id_data_obat').change(function() {
        // Mendapatkan nilai yang dipilih
        var idObat = $(this).val();
        console.log(idObat);
        
            $.ajax({
                url: '<?= base_url() ?>/RekamMedis/stock_Obat',
                type: 'POST',
                data: {
                    id_data_obat: idObat
                },
                success: function(response) {
                    console.log(response);
                    $('#stock_quantity').val(response);
                    console.log('Data jasa berhasil disimpan di session.');
                },
                error: function() {
                    console.log('Terjadi kesalahan saat menyimpan data jasa.');
                }
            });
    });    


        // Logika untuk menambahkan jasa ke tabel
        $('#add-jasa').click(function() {
            var selectedJasa = $('.js-example-basic-single[name="id_data_tarif"] option:selected').text();
            $('#table-jasa tbody').append('<tr><td>' + selectedJasa + '</td><td><button class="btn btn-danger btn-sm remove-jasa">Hapus</button></td></tr>');
        });

        // Logika untuk menambahkan obat ke tabel
        $('#add-obat').click(function() {
            var selectedObat = $('.js-example-basic-single[name="id_data_obat"] option:selected').text();
            var quantity = $('#quantity').val();
            $('#table-obat tbody').append('<tr><td>' + selectedObat + '</td><td>' + quantity + '</td><td><button class="btn btn-danger btn-sm remove-obat">Hapus</button></td></tr>');
        });

        // Logika untuk menghapus jasa
        $(document).on('click', '.remove-jasa', function() {
            $(this).closest('tr').remove();
        });

        // Logika untuk menghapus obat
        $(document).on('click', '.remove-obat', function() {
            $(this).closest('tr').remove();
        });

        $('#add-jasa').click(function() {
            var selectedJasa    = $('.js-example-basic-single[name="id_data_tarif"] option:selected').val();
            $.ajax({
                url: '<?= base_url() ?>/RekamMedis/simpan_data_jasa',
                type: 'POST',
                data: {selected_jasa: selectedJasa},
                success: function(response) {
                    console.log('Data jasa berhasil disimpan di session.');
                },
                error: function() {
                    console.log('Terjadi kesalahan saat menyimpan data jasa.');
                }
            });
        });

        $('#add-obat').click(function() {
            var selectedObat    = $('.js-example-basic-single[name="id_data_obat"] option:selected').val();
            var quantity        = $('#quantity').val();

            $.ajax({
                url: '<?= base_url() ?>/RekamMedis/simpan_data_obat',
                type: 'POST',
                data: {
                    selected_obat   : selectedObat,
                    quantity        : quantity,
                },
                success: function(response) {
                    console.log('Data obat berhasil disimpan di session.');
                },
                error: function() {
                    console.log('Terjadi kesalahan saat menyimpan data obat.');
                }
            });
        });

    });

    </script>