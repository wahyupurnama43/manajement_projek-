<?php 



class Proses_projek extends Controller
{
    public function addProjek()
    {
    	if ($this->model('Projek_models')->addProjek($_POST) > 0){
    		Flasher::setFlash('berhasil', 'di Tambah','success');
    		header('Location: '. BASEURL . '/projek/index');
    		exit();
    	}else {
    		Flasher::setFlash('Gagal','di Tambah','danger');
    		header('Location: '. BASEURL . '/projek/index');
    		exit();
    	}
    }

    public function updateProjek()
    {
    	if ($this->model('Projek_models')->updateProjek($_POST) > 0){
    		Flasher::setFlash('berhasil', 'di Ubah','success');
    		header('Location: '. BASEURL . '/projek/index');
    		exit();
    	}else {
    		Flasher::setFlash('Gagal','di Ubah','danger');
    		header('Location: '. BASEURL . '/ubah_projek');
    		exit();
    	}
    }

    public function addUser()
    {
    	if ( $this->model('Projek_models')->addUser($_POST) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal ', 'Di ambah', 'Danger');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}
    }

    public function hapus($id)
    {
    	if ( $this->model('Projek_models')->hapus($id) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal ', 'Di Tambah', 'Danger');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}
    }

    public function addLaporan()
    {
    	if ( $this->model('Projek_models')->addLaporan($_POST) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal ', 'Di Tambah', 'danger');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}
    }

    public function addLaporanUser()
    {
        if ( $this->model('Projek_models')->addLaporan($_POST) > 0 ) {
            Flasher::setFlash('Berhasil', 'Di Tambah', 'success');
            header('Location: '.BASEURL. '/user/laporan');
            exit();
        }else{
            Flasher::setFlash('Gagal ', 'Di Tambah', 'danger');
            header('Location: '.BASEURL. '/user/laporan');
            exit();
        }
    }

    public function hapus_Laporan($id)
    {
    	if ( $this->model('Projek_models')->hapus_Laporan($id) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}
    }

    public function ubah_Laporan()
    {
    	if ( $this->model('Projek_models')->ubah_Laporan($_POST) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di Ubah', 'success');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}
    }

    public function addMember()
    {
    	if ( $this->model('Projek_models')->addMember($_POST) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di Ditambah', 'success');
    		header('Location: '.BASEURL. '/projek/index');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal', 'Di Ditambah', 'danger');
    		header('Location: '.BASEURL. '/projek/index');
    		exit();
    	}
    }

    public function hapus_MP($id)
    {
    	if ( $this->model('Projek_models')->hapus_MP($id) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di hapus', 'success');
    		header('Location: '.BASEURL. '/projek/index');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal', 'Di hapus', 'danger');
    		header('Location: '.BASEURL. '/projek/index');
    		exit();
    	}
    }

    public function index($id)
    {
    	if ( $this->model('Projek_models')->selesai($id) > 0 ) {
    		Flasher::setFlash('Berhasil', 'Di selesaikan', 'success');
    		header('Location: '.BASEURL. '/projek/list');
    		exit();
    	}else{
    		Flasher::setFlash('Gagal', 'Di selesaikan', 'danger');
    		header('Location: '.BASEURL. '/projek/list');
    		exit();
    	}
    }

    public function hapus_projek($id)
    {
        if ( $this->model('Projek_models')->hapus_projek($id) > 0 ) {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }else{
            Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }
    }

    public function logout()
    {
        if ( $this->model('Projek_models')->logout() > 0 ) {
            Flasher::setFlash('Berhasil', 'Logout', 'success');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }else{
            Flasher::setFlash('Gagal', 'Logout', 'danger');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }
    }

    public function getmember()
    {
        echo json_encode($this->model('Get_models')->getmember($_POST['id']));
    }
    


}
