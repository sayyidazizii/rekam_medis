<?php $this->load->view('layout/top') ?>
<body>
<?php $this->load->view('layout/nav') ?>
    <div class="container">
    
    <h2>Data Buku</h2>
    <a class="btn btn-primary"href="<?= base_url("Buku/tambah"); ?>">Tambah Data</a>
    
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>judul</th>
            <th>pengarang</th>
            <th>aksi</th>
        </tr>

    

    <?php
    foreach($buku as $row){
        ?>
    <tr>
        <td><?php echo $row->id ?></td>
        <td><?php echo $row->judul ?></td>
        <td><?php echo $row->pengarang ?></td>
    
        <td align='center'>
            <a class="btn btn-warning" href="<?php echo base_url('Buku/edit') ?>/<?php echo $row->id ?>">edit</a>
            <a class="btn btn-danger" href="<?php echo base_url('Buku/hapus') ?>/<?php echo $row->id ?>">hapus</a>
        </td>
    </tr>
        <?php
    }
    ?>
    
    </table>
</body>
</html>