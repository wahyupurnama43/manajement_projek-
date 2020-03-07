
 <!-- Begin Page Content -->
                <div class="container-fluid">
                 

                    <!-- add user -->
                    <div class="d-flex justify-content-end t-scale">
                        <button class="btn btn-primary mb-3 shadow-lg" data-toggle="modal" data-target="#usermodal">User Baru &nbsp;<i class="fas fa-plus"></i></button>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> &nbsp;Daftar User </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mydatatable" style="width: 100%; text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        <?php foreach ($data['user'] as $us): ?>
                                          <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $us['nama'] ?></td>
                                            <td><?= $us['level']?></td>
                                            <td class="t-scale"><a href="<?= BASEURL ?>/Proses_projek/hapus/<?=$us['id_auth'] ?>"class=" tombol-hapus">
                                              <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button></a></td>
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
                <div class="modal fade" id="usermodal" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="judul">Daftar User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= BASEURL ?>/Proses_projek/addUser" method="POST">
                          <input type="hidden" name="id" id="id">
                          <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" name="nama" required="">
                          </div>
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username" required="">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required="">
                          </div>
                          <div class="form-group">
                              <label for="">Pilih Status</label>
                              <select class="form-control" name="id_level">
                                <option >-> Pilih <-</option>
                                <option value="3">Admin</option>
                                <option value="2">Leader</option>
                                <option value="1">User</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
                      </div>
                    </form>

                    </div>
                  </div>
                </div>