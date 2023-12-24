<?php $this->load->view('layout/top') ?>
<body>
<?php $this->load->view('layout/nav') ?>
    <div class="container">
    
    <h2>Join Table</h2>
    
    <table class="table table-bordeered table-hover mt-2">
        <tr class= "table-light">
            <th>no</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
        </tr>
    <?php
    $no = 1;
    foreach($join as $row){ ?>
    <tr>
       <td><?= $no++ ?></td>
       <td><?= $row->username ?></td>
       <td><?= $row->password ?></td>
       <td><?= $row->level ?></td>
    
    </tr>
        <?php
    }
    ?>
    
    </table>
</body>
</html>