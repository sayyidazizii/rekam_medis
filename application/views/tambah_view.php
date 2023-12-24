<?php $this->load->view('layout/top')?>
<body>
    <?php $this->load->view('layout/nav')?>
<center>
    <h2>Hal Tambah Buku</h2>
</center>
    <form action="<?= base_url('Buku/simpan') ?>" method = "POST">

            <div class="container mt-3"style="position:relative;width:50%;margin-Left:25%">
                
                <label><b>Judul Buku</b></label>
             
                <input class="form-control" type="text" name="judul">
          
            
                <label><b>Pengarang</b></label>
               
                <input  class="form-control"type="text" name="pengarang">
            
            
                
 
    <center>
    <button  class="btn btn-outline-primary mt-2"type="submit">Simpan</button>
</center>
</div>
</form>
    
</body>
</html>