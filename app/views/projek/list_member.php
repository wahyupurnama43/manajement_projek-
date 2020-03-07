<!-- Begin Page Content -->
<div class="container-fluid">
     <div class="d-flex justify-content-between t-scale">
         <a href="<?= BASEURL ?>/projek/list">
            <button class="btn btn-primary mb-3 shadow-lg"><i class="fas fa-sign-out-alt" style="transform: rotateY(180deg);"></i> &nbsp;Kembali</button>
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
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

