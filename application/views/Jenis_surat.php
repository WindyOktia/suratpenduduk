<button type="button" id="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
    Tambah Jenis Surat
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
                <form action="<?= base_url('test/insertJenis') ?>" method="post">
                    <div class="form-group">
                        <label for="">Jenis Surat</label>
                        <input type="text" name="jenis_surat" class="form-control">
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
    <h5>Jenis Surat</h5>
    <div class="responsive-table mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Surat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getJenis as $jn) : ?>
                    <tr>
                        <td><?= $jn['nama_jenis_surat'] ?></td>
                        <td>
                            <button type="button" id="" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modalEdit<?= $jn['id_jenis_surat'] ?>">
                                Edit
                            </button>

                            <a href="<?= base_url('test/deleteJenis') ?>/<?= $jn['id_jenis_surat'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?php foreach ($getJenis as $edit) : ?>
    <div class="modal fade" id="modalEdit<?= $edit['id_jenis_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah KK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('test/updateJenis') ?>" method="post">
                        <div class="form-group">
                            <label for="">Jenis Surat</label>
                            <input type="hidden" name="id_jenis_surat" value="<?= $edit['id_jenis_surat'] ?>" class="form-control">
                            <input type="text" name="jenis_surat" value="<?= $edit['nama_jenis_surat'] ?>" class="form-control">
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