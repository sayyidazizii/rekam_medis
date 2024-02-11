<div class="container-fluid">
    <h1>Ubah Password</h1>
                    <!-- Isi form tambah user -->
                    <form action="<?= base_url() ?>User/processAdd" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $data_user->id_user ?>" required>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data_user->nama ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $data_user->username ?>"readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="masukan password baru" required>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="level" id="level" value="<?= $data_user->level ?>" required>
                        </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" href="<?= base_url() ?>User" >Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
    <!-- End of Modal -->
</div>