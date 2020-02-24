<!-- Begin Page Content -->
<div class="container-fluid">
     <div class="row">
       <div class="flash-data" data-flashdata="<?= Flasher::flash(); ?>"></div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-list"></i> &nbsp;List Projek </h6>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mydatatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Leader</th>
                            <th>Projek</th>
                            <th>Tugas</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
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
                                    <?= $mp['jenis_projek'] ?>
                                </td>
                                <td>
                                    <?= $mp['tugas'] ?>
                                </td>
                                <td>
                                    <?= $mp['tanggal_awal'] ?>
                                </td>
                                  <td>
                                    <?= $mp['tanggal_akhir'] ?>
                                </td>
                                <td width="30%" class="t-scale">
                                    <a class=" tombol-hapus" href="<?= BASEURL ?>/Proses_projek/hapus_projek/<?= $mp['id_projek'] ?>">
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Hapus
                                        </button></a>
                                     <a href="<?= BASEURL?>/projek/list_member/<?= $mp['id_projek'] ?>/<?= $mp['id_jenis'] ?>">
                                        <button class="btn btn-dark">
                                        <i class="fas fa-user"></i> &nbsp;Member 
                                        </button>
                                    </a>
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

