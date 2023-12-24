<?php $this->load->view('layout/top')?>
<body>
    <?php $this->load->view('layout/nav')?>
<center>
    <h2>Hal Edit Buku</h2>
</center>
    <form action="<?= base_url('Buku/simpan_edit') ?>" method = "POST">
         <div class="container mt-3"style="position:relative;width:50%;margin-Left:25%">  
              <input hidden type="text" name="id"value="<?= $buku->id?>">       
                  <label> <b>Judul Buku</b></label>             
                  <input class="form-control" type="text" name="judul"value="<?= $buku->judul?>">
                  <label> <b> Pengarang</b></label>
                  <input class="form-control" type="text" name="pengarang"value="<?= $buku->pengarang?>">
          <center>
           <button  class="btn btn-outline-primary mt-2"type="submit">Simpan</button>
         </center>
        </div>               
    </form>   
</body>
</html>