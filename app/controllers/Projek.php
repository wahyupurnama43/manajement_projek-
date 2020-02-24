<?php 



class Projek extends Controller
{
 	public function index()
    {
    	$data['judul'] ='Daftar Projek';
    	// diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetail(); 
        $data['leader'] = $this->model('Get_models')->ambilallLeader();
        $data['projek'] =  $this->model('Get_models')->ambilallProjek(); 
    	$this->view('template/header',$data);
    	$this->view('projek/index',$data);
    	$this->view('template/footer');
    }

    public function member($id_projek,$id_jenis)
    {
        $data['judul'] ='Daftar Projek';
        // diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetailallbyid($id_projek,$id_jenis); 
        $data['MB'] = $this->model('Get_models')->ambilDetailbyid($id_projek,$id_jenis); 
        $data['member'] = $this->model('Get_models')->ambilUserMember();
        $this->view('template/header',$data);
        $this->view('projek/member',$data);
        $this->view('template/footer');
    }

    public function ubah_projek($id)
    {
        $data['judul'] ='Daftar Projek';
        // diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetailby2($id);
        $data['leader'] = $this->model('Get_models')->ambilallLeader();
        $data['projek'] =  $this->model('Get_models')->ambilallProjek();  
        $this->view('template/header',$data);
        $this->view('projek/ubah_projek',$data);
        $this->view('template/footer');
    }


    /* ---------------------------> menu user <-------------------------------- */

    public function user()
    {
        $data['judul'] = 'Daftar User';
        $data['user'] = $this->model('Get_models')->ambilUser();
        $this->view('template/header',$data);
        $this->view('projek/user', $data);
        $this->view('template/footer');
    }

    /* ---------------------------> Menu Laporan <-------------------------------- */

    public function laporan()
    {
        $data['judul'] = 'Laporan Harian';
        $data['Laporan'] = $this->model('Get_models')->ambilLaporan();
        $data['member'] = $this->model('Get_models')->ambilUserMember();
        $data['jenis_projek'] = $this->model('Get_models')->ambilJenisProjek();
        $this->view('template/header',$data);
        $this->view('projek/laporan_harian', $data);
        $this->view('template/footer');
    }

    public function Edit_laporan($id)
    {
        $data['judul'] = 'Edit Laporan';
        $data['Laporan'] = $this->model('Get_models')->editLaporan($id);
        $data['member'] = $this->model('Get_models')->ambilMemberbyid($id);
        $data['jenis_projek'] = $this->model('Get_models')->ambilProjekbyid($id);
        $this->view('template/header',$data);
        $this->view('projek/Edit_laporan', $data);
        $this->view('template/footer');
    }

    /* ---------------------------> Menu List <-------------------------------- */

    public function list()
    {
        $data['judul'] = 'List Projek';
        $data['TD'] = $this->model('Get_models')->ambilDetailselesai(); 
        $data['leader'] = $this->model('Get_models')->ambilallLeader();
        $data['projek'] =  $this->model('Get_models')->ambilallProjek(); 
        $this->view('template/header',$data);
        $this->view('projek/list', $data);
        $this->view('template/footer');
    }

    public function list_member($id_projek,$id_jenis)
    {
        $data['judul'] ='Daftar Projek';
        // diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetailallbyid($id_projek,$id_jenis); 
        $data['MB'] = $this->model('Get_models')->ambilDetailbyid($id_projek,$id_jenis); 
        $data['member'] = $this->model('Get_models')->ambilUserMember();
        $this->view('template/header',$data);
        $this->view('projek/list_member',$data);
        $this->view('template/footer');
    }

     /* ---------------------------> Menu Dashboard <-------------------------------- */

    public function dashboard()
    {
        $data['judul'] = 'Dashboard';
        $data['Tuser'] = $this->model('Get_models')->totalCountuser(); 
        $data['Tprojek'] = $this->model('Get_models')->totalCountprojek(); 
        $data['Tselesai'] = $this->model('Get_models')->totalCountselesai(); 
        $data['TLP'] = $this->model('Get_models')->totalCountLp(); 
        $this->view('template/header',$data);
        $this->view('projek/dashboard', $data);
        $this->view('template/footer');
    }


}
