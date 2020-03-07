<?php 



class Proses_projek extends Controller
{
    public function addProjek()
    {
        $add = $this->model('Projek_models')->addProjek($_POST);
    	if ($add['status']) {
    		Flasher::setFlash('Projek ', 'Berhasil di Tambah','success');
    		header('Location: '. BASEURL . '/projek/index');
    		exit();
    	}else {
    		Flasher::setFlash('Projek ', 'Gagal di Tambah ', 'error');
    		header('Location: '. BASEURL . '/projek/index');
    		exit();
    	}
    }
    public function addProjekL()
    {
        $add = $this->model('Projek_models')->addProjek($_POST);
        if ($add['status']) {
            Flasher::setFlash('Projek ', 'Berhasil di Tambah','success');
            header('Location: '. BASEURL . '/leader/projek');
            exit();
        }else {
            Flasher::setFlash('Projek ', 'Gagal di Tambah ', 'error');
            header('Location: '. BASEURL . '/leader/projek');
            exit();
        }
    }


    public function updateProjek()
    {
        $add = $this->model('Projek_models')->updateProjek($_POST);
    	if ($add['status']){
    		Flasher::setFlash('Projek ', 'Berhasil di Ubah','success');
    		header('Location: '. BASEURL . '/projek/index');
    		exit();
    	}else {
    		Flasher::setFlash('Projek ', 'Gagal di Ubah ', 'error');
    		header('Location: '. BASEURL . '/projek/ubah_projek/'.$_POST['id']);
    		exit();
    	}
    }

    public function updateProjekL()
    {
        $add = $this->model('Projek_models')->updateProjek($_POST);
        if ($add['status']){
            Flasher::setFlash('Projek ', 'Berhasil di Ubah','success');
            header('Location: '. BASEURL . '/leader/projek');
            exit();
        }else {
            Flasher::setFlash('Projek ', 'Gagal di Ubah ', 'error');
            header('Location: '. BASEURL . '/leader/edit/'.$_POST['id']);
            exit();
        }
    }

    public function addUser()
    {
        $add = $this->model('Projek_models')->addUser($_POST);
    	if ($add['status']) {
    		Flasher::setFlash('User ', 'Berhasil Di Tambah', 'success');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}else{
    		Flasher::setFlash('User ', 'Gagal Di Tambah', 'error');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}
    }

    public function hapus($id)
    {
        $add = $this->model('Projek_models')->hapus($id);
    	if ($add['status']) {
    		Flasher::setFlash('User ', 'Berhasil Di Hapus', 'success');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}else{
    		Flasher::setFlash('User ', 'Gagal Di Hapus', 'error');
    		header('Location: '.BASEURL. '/projek/user');
    		exit();
    	}
    }

    public function addLaporan()
    {
        $add =  $this->model('Projek_models')->addLaporan($_POST);
    	if ($add['status']) {
    		Flasher::setFlash('Berhasil ', 'Di Tambah', 'success');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}else{
    		Flasher::setFlash('Laporan ', 'Gagal Di Tambah', 'error');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}
    }

    public function addLaporanUser()
    {
        $add =  $this->model('Projek_models')->addLaporan($_POST);
        if ($add['status']) {
            Flasher::setFlash('Laporan ', 'Berhasil Di Tambah', 'success');
            header('Location: '.BASEURL. '/user/laporan');
            exit();
        }else{
            Flasher::setFlash('Laporan ', 'Gagal Di Tambah', 'error');
            header('Location: '.BASEURL. '/user/laporan');
            exit();
        }
    }

    public function hapus_Laporan($id)
    {
        $add =  $this->model('Projek_models')->hapus_Laporan($id);
    	if ($add['status']) {
    		Flasher::setFlash('Laporan ', 'Berhasil Di Hapus', 'success');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}else{
    		Flasher::setFlash('Laporan ', 'Gagal Di Hapus', 'error');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}
    }

    public function ubah_Laporan()
    {
        $add = $this->model('Projek_models')->ubah_Laporan($_POST);
    	if ($add['status']) {
    		Flasher::setFlash('Laporan ', 'Berhasil Di Ubah', 'success');
    		header('Location: '.BASEURL. '/projek/laporan');
    		exit();
    	}else{
    		Flasher::setFlash('Laporan ', 'Gagal Di Ubah', 'error');
    		header('Location: '.BASEURL. '/projek/Edit_Laporan/'.$_POST['id']);
    		exit();
    	}
    }


    public function addMember()
    {
        $add = $this->model('Projek_models')->addMember($_POST);
        if ($add['status']) {
            Flasher::setFlash('User ', 'Berhasil di Tambah', 'success');
            header('Location: ' . BASEURL . '/projek/member/' . $_POST['id_projek'] . '/' . $_POST['id_jenis']);
            exit();
        } else {
            Flasher::setFlash('User ', 'Sudah di Tambahkan ', 'error');
            header('Location: ' . BASEURL . '/projek/member/' . $_POST['id_projek'] . '/' . $_POST['id_jenis']);
            exit();
        }
    }

     public function addMemberL()
    {
        $add = $this->model('Projek_models')->addMember($_POST);
        if ($add['status']) {
            Flasher::setFlash('User ', 'Berhasil di Tambah', 'success');
            header('Location: ' . BASEURL . '/leader/member/' . $_POST['id_projek'] . '/' . $_POST['id_jenis']);
            exit();
        } else {
            Flasher::setFlash('User ', 'Sudah di Tambahkan ', 'error');
            header('Location: ' . BASEURL . '/leader/member/' . $_POST['id_projek'] . '/' . $_POST['id_jenis']);
            exit();
        }
    }

    public function hapus_MP($id,$id_projek,$id_jenis)
    {
        $add = $this->model('Projek_models')->hapus_MP($id);
    	if ($add['status']) {
    		Flasher::setFlash('Member', ' Berhasil Di hapus', 'success');
    		header('Location: '.BASEURL. '/projek/member/'.$id_projek.'/'.$id_jenis);
    		exit();
    	}else{
    		Flasher::setFlash('Member', ' Gagal Di hapus', 'error');
    		header('Location: '.BASEURL. '/projek/member/'.$id_projek.'/'.$id_jenis);
    		exit();
    	}
    }

    public function hapus_Le($id,$id_projek,$id_jenis)
    {
        $add = $this->model('Projek_models')->hapus_MP($id);
        if ($add['status']) {
            Flasher::setFlash('Member', ' Berhasil Di hapus', 'success');
            header('Location: '.BASEURL. '/leader/member/'.$id_projek.'/'.$id_jenis);
            exit();
        }else{
            Flasher::setFlash('Member', ' Gagal Di hapus', 'error');
            header('Location: '.BASEURL. '/leader/member/'.$id_projek.'/'.$id_jenis);
            exit();
        }
    }

    public function projek_selesai($id)
    {   $add = $this->model('Projek_models')->projek_selesai($id);
        if ($add['status']) {
            Flasher::setFlash('Projek', ' Berhasil Di Selesaikan', 'success');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }else{
            Flasher::setFlash('Projek', ' Gagal Di Selesaikan', 'error');
            header('Location: '.BASEURL. '/projek/index');
            exit();
        }
    }

    public function projek_selesaiL($id) //untuk menu leader
    {
        $add = $this->model('Projek_models')->projek_selesai($id);
        if ($add['status']) {
            Flasher::setFlash('Projek', ' Berhasil Di Selesaikan', 'success');
            header('Location: '.BASEURL. '/leader/list');
            exit();
        }else{
            Flasher::setFlash('Projek', ' Gagal Di Selesaikan', 'error');
            header('Location: '.BASEURL. '/leader/projek');
            exit();
        }
    }


    public function hapus_projek($id)
    {
        $add =  $this->model('Projek_models')->hapus_projek($id);
        if ($add['status']) {
            Flasher::setFlash('Projek', ' Berhasil Di Hapus', 'success');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }else{
            Flasher::setFlash('Projek', ' Gagal Di Hapus', 'error');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }
    }

    public function hapus_projekL($id)
    {
        if ( $this->model('Projek_models')->hapus_projek($id) ) {
            Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
            header('Location: '.BASEURL. '/leader/list');
            exit();
        }else{
            Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
            header('Location: '.BASEURL. '/leader/list');
            exit();
        }
    }

    public function logout()
    {
        if ( $this->model('Projek_models')->logout() ) {
            Flasher::setFlash('Berhasil', 'Logout', 'success');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }else{
            Flasher::setFlash('Gagal', 'Logout', 'danger');
            header('Location: '.BASEURL. '/projek/list');
            exit();
        }
    }


}
