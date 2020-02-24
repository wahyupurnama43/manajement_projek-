<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
       <div class="flash-data" data-flashdata="<?= Flasher::flash(); ?>"></div>
    </div>

    <!-- add user -->
    <div class="d-flex justify-content-end t-scale">
        <button class="btn btn-primary mb-3 shadow-lg" data-toggle="modal" data-target="#laporanModal">Laporan Harian &nbsp;<i class="fas fa-plus"></i></button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-download"></i> &nbsp;Laporan Harian </h6>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mydatatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member </th>
                            <th>Projek</th>
                            <th>Tugas Harian</th>
                            <th>Tanggal - Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $i=1; ?>
                        <?php foreach ($data['Laporan'] as $lp): ?>
                            <tr>
                                <td>
                                    <?= $i++ ?>
                                </td>
                                <td>
                                    <?= $lp['nama'] ?>
                                </td>
                                <td>
                                    <?= $lp['jenis_projek'] ?>
                                </td>
                                <td>
                                    <?= $lp['tugas'] ?>
                                </td>
                                <td>
                                    <?= $lp['tanggal_input'] ?>
                                </td>
                                <td width="30%" class="t-scale">
                                    <a href="<?= BASEURL ?>/projek/Edit_Laporan/<?= $lp['id_laporan']?>">
                                        <button  class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Edit </button>
                                        </a>
                                    <a href="<?= BASEURL ?>/proses_projek/hapus_Laporan/<?= $lp['id_laporan']?>" class="tombol-hapus">
                                        <button class="btn btn-danger "><i class="fas fa-trash-alt mr-1"></i>Hapus
                                        </button></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
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
                <h5 class="modal-title" id="judul">Laporann Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/proses_projek/addLaporan" method="POST">
                    <div class="form-group">
                        <label for="member">Member</label>
                        <select name="member" id="" class="form-control">
                            <option value="">pilihan</option>
                            <?php if ($data['member']) : ?>
                                <?php foreach ($data['member'] as $member) : ?>
                                    <option value="<?= $member['id_auth']; ?>">
                                        <?= $member['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                    <option value="null">No jurusan detected.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="projek">Projek</label>
                        <select name="projek" id="" class="form-control">
                            <option value="">pilihan</option>
                            <?php if ($data['jenis_projek']) : ?>
                                <?php foreach ($data['jenis_projek'] as $jenis_projek) : ?>
                                    <option value="<?= $jenis_projek['id_jenis']; ?>">
                                        <?= $jenis_projek['jenis_projek']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                    <option value="null">No jurusan detected.</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tugas_harian">Tugas Harian</label>
                        <textarea name="tugas_harian" id="tugas_harian" cols="1" rows="2" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Laporkan</button>
            </div>
            </form>

        </div>
    </div>
</div>

