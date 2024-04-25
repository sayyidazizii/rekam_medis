<div class="container-fluid">
    <h1>Tambah Rekam Medis</h1>
    <div class="d-flex justify-content-end">
        <a href="<?= base_url() ?>RekamMedis" class="btn btn-dark">Kembali</a>
    </div>
    <form action="<?= base_url() ?>RekamMedis/simpan_rekam_medis" method="post">
        <div class="container mt-2"> 
            <table style="width: 100%">
                <tr>
                <tr>
                    <th>Nomor Kartu</th>
                    <td style="width:80%">
                    <select class="form-control js-example-basic-single" name="id_pasien" id="id_pasien">
                            <option value="0">-- Pilih data --</option>
                        <?php foreach($data_pasien as $item){?> 
                            <option value="<?= $item->id_pasien ?>"><?= $item->no_kartu ?></option>
                        <?php }?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td><input type="text" name="nama_pasien" id="nama_pasien" class="form-control my-2 border-dark" readonly></td>
                </tr>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td><input type="date" name="tanggal_periksa" id="tanggal_periksa" class="form-control my-2 border-dark"></td>
                </tr>
                <tr>
                    <th>Amnesa</th>
                    <td><input type="text" name="amnesa" id="amnesa" class="form-control my-2 border-dark"></td>
                </tr>
                <tr>
                    <th>Diagnosa</th>
                    <td><input type="text" name="diagnosa" id="diagnosa" class="form-control my-2 border-dark"></td>
                </tr>
                <tr>
                    <th>Tindakan</th>
                    <td><input type="text" name="tindakan" id="tindakan" class="form-control my-2 border-dark"></td>
                </tr>
            </table>
            <hr>
            <h4>Detail Rekam Medis</h4>
            <div class="row">
                <div class="col">Jasa</div>
                <div class="col">
                    <select class="form-control js-example-basic-single" name="id_data_tarif" id="id_data_tarif">
                            <!-- <option value="0">-- Pilih data --</option> -->
                        <?php foreach($data_tarif as $item){?> 
                            <option value="<?= $item->id_data_tarif ?>"><?= $item->nama_jasa ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                    <div class="col"><button type="button" id="add-jasa" class="btn btn-primary my-1 mb-2">Pilih Jasa</button></div>
            </div>

            <div class="row">
                <div class="col">Obat</div>
                <div class="col">
                    <select class="form-control js-example-basic-single" name="id_data_obat" id="id_data_obat">
                            <option value="0">-- Pilih data --</option>
                        <?php foreach($data_obat as $item){?> 
                            <option value="<?= $item->id_data_obat ?>"><?= $item->nama_obat ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">Stok Tersedia</div>
                <div class="col">
                    <input type="text" name="stock_quantity" id="stock_quantity" class="form-control my-2 border-dark"readonly> 
                </div>
            </div>
            <div class="row">
                <div class="col">Quantity</div>
                <div class="col">
                    <input type="number" name="quantity" id="quantity" class="form-control my-2 border-dark" >
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                    <div class="col"><button type="button" id="add-obat" class="btn btn-primary my-1">Pilih obat</button></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
            <table class="table table-borderless table-hover" id="table-jasa">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Jasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">

            </tbody>
        </table>
            </div>
            <div class="col">
            <table class="table table-borderless table-hover" id="table-obat">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Obat</th>
                    <th>Quantity</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">

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

        // Periksa apakah ID obat tidak terdefinisi atau 0
        if (!idObat || idObat === '0') {
            $('#stock_quantity').val('0'); // Set stok quantity menjadi 0
        } else {
            // Jika ID obat terdefinisi, lakukan AJAX untuk mendapatkan stok
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
        }
    });   


        // Logika untuk menambahkan jasa ke tabel
        $('#add-jasa').click(function() {
            var selectedJasa = $('.js-example-basic-single[name="id_data_tarif"] option:selected').text();
            $('#table-jasa tbody').append('<tr><td>' + selectedJasa + '</td><td><button class="btn btn-danger btn-sm remove-jasa">Hapus</button></td></tr>');
        });

        // Logika untuk menambahkan obat ke tabel
       $('#add-obat').click(function() {
            // Mendapatkan nilai quantity
            var quantity = $('#quantity').val();

            // Mendapatkan nilai stok quantity
            var stockQuantity = $('#stock_quantity').val();

            // Periksa apakah quantity sudah diisi dan stok quantity tidak sama dengan 0
            if(quantity === '' || stockQuantity === '0') {
                alert('Maaf, stok obat tidak tersedia atau quantity belum diisi.');
            } else {
                // Lanjutkan dengan menampilkan dialog pemilihan obat
                var selectedObat = $('.js-example-basic-single[name="id_data_obat"] option:selected').text();
                $('#table-obat tbody').append('<tr><td>' + selectedObat + '</td><td>' + quantity + '</td><td><button class="btn btn-danger btn-sm remove-obat">Hapus</button></td></tr>');
            }
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