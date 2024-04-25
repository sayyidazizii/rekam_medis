<div class="container-fluid">
    <h1>Data User</h1>
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                <i class="ti ti-plus me-2"></i>Tambah User Baru
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUserModalLabel">Tambah User Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Isi form tambah user -->
                    <form action="<?= base_url() ?>User/processAdd" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" name="level" id="level" reqired>
                                <option value="1">Admin</option>
                                <option value="2">Dokter</option>
                                <option value="3">Apoteker</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End of Modal -->


        </div>
        <div class="col">
                <div class="d-flex flex-nowrap input-group mb-3">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $no = 0;
                foreach ($data_user as $user) :
                    $no++;
                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->nama ?></td>
                        <?php if ($user->level == 1){
                            echo  '<td>Admin</td>';
                        }else if($user->level == 2){
                            echo '<td>Dokter</td>';
                        }else{
                            echo '<td>Apoteker</td>';

                        } ?>
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="<?= base_url() ?>User/edit/<?= $user->id_user ?>" class="btn btn-sm btn-warning"><i class="ti ti-pencil"></i></a>
                                <a href="<?= base_url() ?>User/hapus/<?= $user->id_user ?>" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></a>
                                <a href="<?= base_url() ?>User/edit_password/<?= $user->id_user ?>" class="btn btn-sm btn-secondary"><i class="ti ti-pencil">ubah password</i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>