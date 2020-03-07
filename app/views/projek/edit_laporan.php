<div class="row">
        <div class="flash-data" data-flashdata="<?= Flasher::flash(true); ?>"></div>
    </div>
 <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="row d-flex justify-content-center ">
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-download"></i> &nbsp;Edit Laporan</h6>
                                </div>
                                <div class="card-body">
                                  <form action="<?= BASEURL ?>/proses_projek/ubah_Laporan" method="POST">
                                  <input type="hidden" name="id" id="id" value="<?= $data['Laporan']['id_laporan']?>"> 
                                   <div class="form-group">
                                        <label for="nama">Nama Member</label>
                                          <select name="member"  class="form-control">
                                            <option value="">Pilih</option>
                                             <?php if ($data['member']) : ?>
                                                    <?php foreach ($data['member'] as $member) : ?>
                                                        <option <?= $member['id_auth'] === $data['Laporan']['id_auth']  ? "selected" : ""; ?> value="<?= $member['id_auth']; ?>">
                                                            <?= $member['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="null">No jurusan detected.</option>
                                                <?php endif; ?>
                                          </select>
                                    </div>
                                  <div class="form-group">
                                        <label for="nama">Projek</label>
                                        <select name="projek"  class="form-control">
                                            <?php if ($data['jenis_projek']) : ?>
                                                    <?php foreach ($data['jenis_projek'] as $projek) : ?>
                                                        <option <?= $projek['id_jenis'] === $data['Laporan']['id_jenis']  ? "selected" : ""; ?> value="<?= $projek['id_jenis']; ?>">
                                                            <?= $projek['jenis_projek']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="null">No jurusan detected.</option>
                                                <?php endif; ?>
                                        </select>
                                    </div> 
                                     <div class="form-group">
                                        <label for="nama">Tugas</label>
                                        <textarea name="tugas" id="" cols="20" rows="3" class="form-control" ><?= $data['Laporan']['tugas']?></textarea >
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" >Edit Laporan <i class="fas fa-plus"></i></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
