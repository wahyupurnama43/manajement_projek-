<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="flash-data" data-flashdata="<?= Flasher::flash(); ?>"></div>
    </div>

    <!-- add projek -->
    <div class="d-flex justify-content-end t-scale">
        <a data-toggle="modal" data-target="#laporanModal">
            <button class="btn btn-primary mb-3 shadow-lg">Projek Baru &nbsp;<i class="fas fa-plus"></i></button>
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> &nbsp;Daftar Projek </h6>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mydatatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Projek</th>
                            <th>Leader</th>
                            <th>Tugas Projek</th>
                            <th>Tanggal Awal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i=1; ?>

                        <?php foreach ($data['TD'] as $td) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <?= $td['jenis_projek'] ?>
                                </td>
                                 <td>
                                    <?= $td['nama'] ?>
                                </td>
                                 <td width="20%">
                                    <?= $td['tugas'] ?>
                                </td>
                                <td>
                                    <?= $td['tanggal_awal'] ?>
                                </td>
                                <td width="90%" class="d-inline-flex">
                                    <div class="t-scale pr-1">
                                    <a href="<?= BASEURL?>/projek/ubah_projek/<?= $td['id_projek']?>">
                                        <button  class="btn btn-primary btn-ubah "><i class="fas fa-edit"></i> &nbsp;Edit
                                        </button></a>
                                    </div>
                                    <div class="t-scale pr-1">
                                    <a href="<?= BASEURL?>/leader/member/<?= $td['id_projek'] ?>/<?= $td['id_jenis'] ?>" ><button class="btn btn-dark"><i class="fas fa-user"></i> &nbsp;Member</button> </a>
                                </div>
                                    <div class="t-scale">
                                     <a href="<?= BASEURL?>/proses_projek/projek_selesaiL/<?= $td['id_projek'] ?>" class="tombol-end">
                                        <button class="btn btn-success"><i class="fas fa-check"></i> &nbsp;End </button></a>
                                 </div> 
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
                <h5 class="modal-title" id="judul">Tambah Projek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/proses_projek/addProjekL" method="POST">
                    <div class="form-group">
                        <label for="projek">Projek</label>
                        <select name="projek" id="" class="form-control">
                            <option value="">pilihan</option>
                            <?php if ($data['projek']) : ?>
                                <?php foreach ($data['projek'] as $projek) : ?>
                                    <option value="<?= $projek['id_jenis']; ?>">
                                        <?= $projek['jenis_projek']; ?>
                                    </option>
                                 <?php endforeach; ?>
                            <?php else : ?>
                                    <option value="null">No jurusan detected.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="leader">Leader</label>
                        <select name="leader" id="" class="form-control">
                            <option value="">pilihan</option>
                             <?php if ($data['leader']) : ?>
                                <?php foreach ($data['leader'] as $leader) : ?>
                                    <option value="<?= $leader['id_auth']; ?>">
                                        <?= $leader['nama']; ?>
                                    </option>
                                 <?php endforeach; ?>
                            <?php else : ?>
                                    <option value="null">No jurusan detected.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tugas">Tugas</label>
                        <textarea name="tugas" id="tugas" cols="1" rows="2" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary w-100">Tambah Projek &nbsp;<i class="fas fa-plus"></i></button>
            </div>
            </form>

        </div>
    </div>
</div>
