<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="flash-data" data-flashdata="<?= Flasher::flash(); ?>"></div>
    </div>

    <!-- add projek -->
    <div class="d-flex justify-content-end t-scale">
        <a data-toggle="modal" data-target="#laporanModal">
            <button class="btn btn-primary mb-3 shadow-lg">Tambah Member&nbsp;<i class="fas fa-plus"></i></button>
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> &nbsp;Daftar Member</h6>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mydatatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member</th>
                            <th>Mulai Projek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i=1 ?>
                        <?php foreach ($data['TD'] as $mp): ?>
                                 <tr>
                                    <td><?= $i++ ?></td>
                                     <td>
                                        <?= $mp['nama'] ?>
                                    </td>
                                     <td>
                                        <?= $mp['tanggal_awal'] ?>
                                    </td>
                                    <td class="t-scale">
                                          <a href="<?= BASEURL?>/proses_projek/hapus_MP/<?= $mp['id_detail']?>" class="tombol-hapus" > 
                                            <button class="btn btn-danger "><i class="fas fa-trash-alt"></i> &nbsp;Hapus </button>
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Tambah Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/proses_projek/addMember" method="POST">
                    <div class="form-group">
                        <label for="leader">Member</label>
                        <select name="member" id="" class="form-control">
                            <option value="">pilihan</option>
                             <?php if ($data['member']) : ?>
                                <?php foreach ($data['member'] as $leader) : ?>
                                    <option value="<?= $leader['id_auth']; ?>">
                                        <?= $leader['nama']; ?>
                                    </option>
                                 <?php endforeach; ?>
                            <?php else : ?>
                                    <option value="null">No jurusan detected.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_jenis"  value="<?= $data['MB']['id_jenis'] ?>">
                    <input type="hidden"  name="id_projek" value="<?= $data['MB']['id_projek'] ?>">
            </div>
            <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary w-100">Tambah Member &nbsp;<i class="fas fa-plus"></i></button>
            </div>
            </form>

        </div>
    </div>
</div>
