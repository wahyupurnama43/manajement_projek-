 <!-- Begin Page Content -->
                <div class="container-fluid">
                     
                    <!-- DataTales Example -->
                    <div class="row d-flex justify-content-center ">
                        <div class="col-lg-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> &nbsp;Add Projek</h6>
                                </div>
                                <div class="card-body">
                                  <form action="<?= BASEURL ?>/Projek/tambah_projek" method="POST"> 
                                  <input type="hidden" id="id" id="id">
                                    <div class="form-group">
                                        <label for="nama">Nama Leader</label>
                                        <select name="leader" id="" class="form-control">
                                            <option value="">Pilih</option>
                                              <?php if ($data['leader']) : ?>
                                                    <?php foreach ($data['leader'] as $leader) : ?>
                                                        <option value="<?= $leader['nama']; ?>">
                                                            <?= $leader['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="null">No Leader detected.</option>
                                                <?php endif; ?>
                                        </select>
                                    </div>  
                                  <div class="form-group">
                                        <label for="nama">Nama Member</label>
                                        <select name="member" id="" class="form-control">
                                            <option value="">Pilih</option>
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
                                        <label for="nama">Projek</label>
                                        <select name="jenis_projek" id="" class="form-control">
                                            <option value="">Pilih</option>
                                              <?php if ($data['jurusan']) : ?>
                                                    <?php foreach ($data['jurusan'] as $jurusan) : ?>
                                                        <option value="<?= $jurusan['id_projek']; ?>">
                                                            <?= $jurusan['jenis_projek']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="null">No jurusan detected.</option>
                                                <?php endif; ?>
                                        </select>
                                    </div>
                                   
                                    
                                     <div class="form-group">
                                        <label for="nama">Tugas</label>
                                        <textarea name="tugas" id="" cols="20" rows="3" class="form-control"></textarea>
                                    </div>
                                  
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary tambah" >Add Projek <i class="fas fa-plus"></i></button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<script src=" <?= BASEURL ?>/js/sweetalert2.all.min.js"></script>
<script>
    const tombol = document.querySelector('.tambah');
       tombol.addEventListener('click', function(){
        Swal.fire({
          title: 'Berhasil Tambah Data',
          text: 'Do you want to continue',
          icon: 'success',
          confirmButtonText: 'Cool'
        });
       });
</script>