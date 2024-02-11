<div class="container-fluid">
    <h1>Edit User</h1>
                    <!-- Isi form tambah user -->
                    <form action="<?= base_url() ?>User/processEdit" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $data_user->id_user ?>" required>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_user->nama ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $data_user->username ?>"required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select" name="level" id="level" reqired>
                                <option value="1">Admin</option>
                                <option value="2">Dokter</option>
                                <option value="3">Apoteker</option>
                            </select>
                        </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="<?= base_url() ?>User" >Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
    <!-- End of Modal -->
</div>