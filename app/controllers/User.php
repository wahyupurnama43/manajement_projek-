<?php 



 class User extends Controller
 {
     public function dashboard()
     {
        $data['TD'] = $this->model('Get_models')->ambilDetail();
    	$this->view('template/user/header');
    	$this->view('user/index',$data);
    	$this->view('template/user/footer');
     }

     public function laporan()
     {
     	$data['Laporan'] = $this->model('Get_models')->ambilLaporanL();
        $data['member'] = $this->model('Get_models')->ambilUserMemberU();
        $data['jenis_projek'] = $this->model('Get_models')->ambilJenisProjek();
    	$this->view('template/user/header');
    	$this->view('user/laporan',$data);
    	$this->view('template/user/footer');
     }

     public function getmember($id_projek,$id_jenis)
     {
        $data['TD'] = $this->model('Get_models')->ambilDetailallbyid($id_projek,$id_jenis); 
        $this->view('template/user/header');
        $this->view('user/member',$data);
        $this->view('template/user/footer');
     }

 }
 