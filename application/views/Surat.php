<button type="button" id="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
    Buat Surat
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('test/insertSurat') ?>" method="post">
                    <div class="form-group">
                        <label for="">No Surat</label>
                        <input type="text" name="no_surat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Surat</label>
                        <select name="jenis_surat" id="" class="form-control">
                            <option value="" selected disabled>- Pilih Jenis Surat -</option>
                            <?php foreach ($getJenis as $jns) : ?>
                                <option value="<?= $jns['id_jenis_surat'] ?>"><?= $jns['nama_jenis_surat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Penduduk</label>
                        <select name="NIK" id="" class="form-control">
                            <option value="" selected disabled>- Pilih Penduduk -</option>
                            <?php foreach ($getPenduduk as $pd) : ?>
                                <option value="<?= $pd['NIK'] ?>"><?= $pd['Nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control">
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
    <h5>Surat</h5>
    <div class="responsive-table mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Jenis Surat</th>
                    <th>Tanggal</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($getSurat as $sr) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $sr['no_surat'] ?></td>
                        <td><?= $sr['nama_jenis_surat'] ?></td>
                        <td><?= $sr['tanggal_surat'] ?></td>
                        <td><?= $sr['NIK'] ?></td>
                        <td><?= $sr['Nama'] ?></td>
                        <td><?= $sr['alamat'] ?></td>
                        <td><?= $sr['RT'] ?></td>
                        <td><?= $sr['RW'] ?></td>
                        <td>
                            <button type="button" id="" class="btn btn-success btn-sm " data-toggle="modal" data-target="#modalDetail<?= $sr['id_surat'] ?>">
                                Detail
                            </button>
                            <button type="button" id="" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#modalEdit<?= $sr['id_surat'] ?>">
                                Edit
                            </button>
                            <a href="<?= base_url('test/deleteSurat') ?>/<?= $sr['id_surat'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($getSurat as $edit) : ?>
    <div class="modal fade" id="modalEdit<?= $edit['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('test/updateSurat') ?>" method="post">
                        <div class="form-group">
                            <label for="">No Surat</label>
                            <input type="hidden" name="id_surat" value="<?= $edit['id_surat'] ?>" class="form-control">
                            <input type="text" name="no_surat" value="<?= $edit['no_surat'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Surat</label>
                            <select name="jenis_surat" id="" class="form-control">
                                <?php foreach ($getJenis as $jns) : ?>
                                    <option value="<?= $jns['id_jenis_surat'] ?>" <?php if ($edit['id_jenis_surat'] == $jns['id_jenis_surat']) {
                                                                                        echo 'selected';
                                                                                    }; ?>><?= $jns['nama_jenis_surat'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Penduduk</label>
                            <select name="NIK" id="" class="form-control">
                                <?php foreach ($getPenduduk as $pd) : ?>
                                    <option value="<?= $pd['NIK'] ?>" <?php if ($edit['NIK'] == $pd['NIK']) {
                                                                            echo 'selected';
                                                                        }; ?>><?= $pd['Nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"><?= $edit['keterangan'] ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Surat</label>
                            <input type="date" name="tgl_surat" value="<?= $edit['tanggal_surat'] ?>" class="form-control">
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

<?php foreach ($getSurat as $detail) : ?>
    <div class="modal fade" id="modalDetail<?= $detail['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">No Surat</label>
                        <input type="text" name="no_surat" value="<?= $detail['no_surat'] ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Surat</label>
                        <select name="jenis_surat" id="" class="form-control" disabled>
                            <?php foreach ($getJenis as $jns2) : ?>
                                <option value="<?= $jns['id_jenis_surat'] ?>" <?php if ($detail['id_jenis_surat'] == $jns2['id_jenis_surat']) {
                                                                                    echo 'selected';
                                                                                }; ?>><?= $jns2['nama_jenis_surat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Penduduk</label>
                        <select name="NIK" id="" class="form-control" disabled>
                            <?php foreach ($getPenduduk as $pd2) : ?>
                                <option value="<?= $pd['NIK'] ?>" <?php if ($detail['NIK'] == $pd2['NIK']) {
                                                                        echo 'selected';
                                                                    }; ?>><?= $pd['Nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="3" class="form-control" disabled><?= $detail['keterangan'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" value="<?= $detail['tanggal_surat'] ?>" class="form-control" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>