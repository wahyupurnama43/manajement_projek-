<div class="container">
        <h1 class="judul text-center my-5">Daftar Projek Bamboo Media</h1>
           <div class="row">
            <?php foreach ($data['TD'] as $lp): ?>
                 <div class="col-lg-4">
                    <div class="card shadow" style="width: 21rem;">
                      <div class="card-body text-center">
                        <h5 class="card-title "><?= $lp['jenis_projek'] ?></h5>
                        <p class="card-text"><?= $lp['tugas'] ?></p>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">Leader : <?= $lp['nama'] ?></li>
                         </ul>
                       
                        <!-- Button trigger modal -->
                        <div class="t-scale">
                        <a href="<?= BASEURL ?>/User/getmember/<?=$lp['id_projek']?>/<?=$lp['id_jenis']?>" type="button" class="member">
                          <button class="btn btn-primary ">
                          Member&nbsp;&nbsp;<i class="fas fa-user"></i>
                        </button></a>
                          </div>
                      </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
</div>


