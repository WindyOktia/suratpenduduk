<button type="button" id="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
    Register Penduduk
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('test/insertPenduduk') ?>" method="post">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="number" name="NIK" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <Select class="form-control" name="jenis_kelamin">
                            <option value="1">Laki - laki</option>
                            <option value="2">Perempuan</option>
                        </Select>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">RT / RW</label>
                        <div class="row">
                            <div class="col">
                                <input type="number" name="rt" placeholder="RT" class="form-control">
                            </div>
                            <div class="col">
                                <input type="number" name="rw" placeholder="RW" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">No Telp</label>
                        <input type="number" name="no_telp" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card card-body">
    <h5>Daftar Penduduk</h5>
    <div class="responsive-table mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penduduk as $pd) : ?>
                    <tr>
                        <td><?= $pd['NIK'] ?></td>
                        <td><?= $pd['Nama'] ?></td>
                        <td><?php

                            if ($pd['Jenis_kelamin'] == '1') {
                                echo 'Laki - Laki';
                            } else {
                                echo 'Perempuan';
                            };

                            ?>
                        </td>
                        <td><?= $pd['alamat'] ?></td>
                        <td><?= $pd['RT'] ?></td>
                        <td><?= $pd['RW'] ?></td>
                        <td><?= $pd['Telp'] ?></td>
                        <td>
                            <button type="button" id="" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modalEdit<?= $pd['id_penduduk'] ?>">
                                Edit
                            </button>
                            <a href="<?= base_url('test/deletePenduduk') ?>/<?= $pd['id_penduduk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($penduduk as $edit) : ?>
    <div class="modal fade" id="modalEdit<?= $edit['id_penduduk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penduduk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?= base_url('test/updatePenduduk') ?>" method="post">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="hidden" name="id_penduduk" value="<?= $edit['id_penduduk'] ?>" class="form-control">
                            <input type="number" name="NIK" value="<?= $edit['NIK'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" value="<?= $edit['Nama'] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <Select class="form-control" name="jenis_kelamin">
                                <option value="1" <?php if ($edit['Jenis_kelamin'] == '1') {
                                                        echo 'selected';
                                                    }; ?>>Laki - laki</option>
                                <option value="2" <?php if ($edit['Jenis_kelamin'] == '2') {
                                                        echo 'selected';
                                                    }; ?>>Perempuan</option>
                            </Select>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control"><?= $edit['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">RT / RW</label>
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="rt" value="<?= $edit['RT'] ?>" placeholder="RT" class="form-control">
                                </div>
                                <div class="col">
                                    <input type="number" name="rw" value="<?= $edit['RW'] ?>" placeholder="RW" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input type="number" name="no_telp" value="<?= $edit['Telp'] ?>" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>