<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-flex justify-content-between t-scale">
        <div class="">
            <button class="btn btn-primary mb-3 shadow-lg" data-toggle="modal" data-target="#cetaklaporanpdf">Cetak Laporan PDF &nbsp;<i class="fas fa-print"></i></button>
            <button class="btn btn-success mb-3 shadow-lg" data-toggle="modal" data-target="#cetaklaporanexel">Export Laporan Excel &nbsp;<i class="fas fa-print"></i></button>
        </div>
        <div class=""></div>
        <div class=""></div>
    </div>
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
                                <td width="20%">
                                    <?= $mp['nama'] ?>
                                </td>
                                <td>
                                    <?= $mp['jenis_projek'] ?>
                                </td>
                                <td width="15%">
                                    <?= $mp['tugas'] ?>
                                </td>
                                <td width="15%">
                                    <?= $mp['tanggal_awal'] ?>
                                </td>
                                  <td width="15%">
                                    <?= $mp['tanggal_akhir'] ?>
                                </td>
                                <td width="25%" class="t-scale">
                                    <a class=" tombol-hapus" href="<?= BASEURL ?>/Proses_projek/hapus_projekL/<?= $mp['id_projek'] ?>">
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Hapus
                                        </button></a>
                                    <a href="<?= BASEURL?>/leader/list_member/<?= $mp['id_projek'] ?>/<?= $mp['id_jenis'] ?>">
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

<div class="modal fade" id="cetaklaporanpdf" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Cetak Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/laporan/cetakLprojek" method="POST" target="_blank">
                      <input type="hidden" name="auth" value="<?= $_SESSION['auth'] ?>">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                       <input type="date" class="form-control" name="tgl_awal">
                    </div>
                    <div class="form-group">
                         <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                           <input type="date" class="form-control" name="tgl_akhir">
                        </div>
                    </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary">Cetak PDF <i class="fas fa-print"></i></button>
            </div>
            </form>

        </div>
    </div>
</div>
</div>

<div class="modal fade" id="cetaklaporanexel" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Cetak Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/laporan/cetakexcelleader" method="POST" target="_blank">
                    <input type="hidden" name="auth" value="<?= $_SESSION['auth'] ?>">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                       <input type="date" class="form-control" name="tgl_awal">
                    </div>
                    <div class="form-group">
                         <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                           <input type="date" class="form-control" name="tgl_akhir">
                        </div>
                    </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary">Cetak PDF <i class="fas fa-print"></i></button>
            </div>
            </form>

        </div>
    </div>
</div>
</div> 
