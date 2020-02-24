<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="row d-flex justify-content-center ">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-book"></i> &nbsp;Ubah Projek</h6>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL ?>/Proses_projek/updateProjek" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $data['TD']['id_projek']?>">
                        <div class="form-group">
                            <label for="nama">Projek</label>
                            <select name="projek" class="form-control">
                                <option value="">Pilih</option>
                                <?php if ($data['projek']) : ?>
                                    <?php foreach ($data['projek'] as $projek): ?>
                                        <option <?= $projek['id_jenis'] === $data['TD']['id_jenis']  ? "selected" : ""; ?> value="<?= $projek['id_jenis']; ?>">
                                            <?= $projek['jenis_projek']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                        <option value="null">No jurusan detected.</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Leader</label>
                            <select name="leader" class="form-control">
                                <option value="">Pilih</option>
                                <?php if ($data['leader']) : ?>
                                    <?php foreach ($data['leader'] as $leader): ?>
                                        <option <?= $leader['id_auth'] === $data['TD']['id_auth']  ? "selected" : ""; ?> value="<?= $leader['id_auth']; ?>">
                                            <?= $leader['nama']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                        <option value="null">No jurusan detected.</option>
                                <?php endif; ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Tugas</label>
                            <textarea name="tugas" id="" cols="20" rows="3" class="form-control"><?= $data['TD']['tugas'] ?></textarea>
                        </div>

                        <div class="text-center t-scale">
                            <button type="submit" class="btn btn-primary">Ubah Projek <i class="fas fa-plus"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
