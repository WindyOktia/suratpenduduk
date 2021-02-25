<button type="button" id="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
    Tambah KK
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah KK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('test/insertKK') ?>" method="post">
                    <div class="form-group">
                        <label for="">No KK</label>
                        <input type="text" name="no_kk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <select name="NIK" id="" class="form-control">
                            <?php foreach ($penduduk as $pd) : ?>
                                <option value="<?= $pd['NIK'] ?>"><?= $pd['NIK'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
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
    <h5>Daftar KK</h5>
    <div class="responsive-table mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No KK</th>
                    <th>NIK</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kk as $kdata) : ?>
                    <tr>
                        <td><?= $kdata['no_kk'] ?></td>
                        <td><?= $kdata['NIK'] ?></td>
                        <td><?php if ($kdata['status'] == '1') {
                                echo 'active';
                            } else {
                                echo 'inactive';
                            }; ?>
                        </td>
                        <td>
                            <button type="button" id="" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modalEdit<?= $kdata['id_kk'] ?>">
                                Edit
                            </button>
                            <a href="<?= base_url('test/deleteKK') ?>/<?= $kdata['id_kk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($kk as $kedit) : ?>
    <div class="modal fade" id="modalEdit<?= $kedit['id_kk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit KK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('test/updateKK') ?>" method="post">
                        <div class="form-group">
                            <label for="">No KK</label>
                            <input type="hidden" name="id_kk" value="<?= $kedit['id_kk'] ?>" class="form-control">
                            <input type="text" name="no_kk" value="<?= $kedit['no_kk'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <select name="NIK" id="" class="form-control">
                                <?php foreach ($penduduk as $pdd) : ?>
                                    <option value="<?= $pdd['NIK'] ?>"><?= $pdd['NIK'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1" <?php if ($kedit['status'] == '1') {
                                                        echo 'selected';
                                                    }; ?>>Active</option>
                                <option value="2" <?php if ($kedit['status'] == '2') {
                                                        echo 'selected';
                                                    }; ?>>Inactive</option>
                            </select>
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