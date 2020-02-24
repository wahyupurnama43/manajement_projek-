<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="flash-data" data-flashdata="<?= Flasher::flash(); ?>"></div>
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

