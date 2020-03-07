<?php   



class Leader extends Controller
 {
     public function dashboard()
     {
        $data['judul'] = 'Menu Leader';
        $data['Tuser'] = $this->model('Get_models')->totalCountuser(); 
        $data['Tprojek'] = $this->model('Get_models')->totalCountprojekL(); 
        $data['Tselesai'] = $this->model('Get_models')->totalCountselesaiL(); 
        $data['TLP'] = $this->model('Get_models')->totalCountLp(); 
        $this->view('template/leader/header',$data);
        $this->view('leader/dashboard',$data);
        $this->view('template/leader/footer');
     }

     public function projek()
     {
        $data['judul'] = 'Menu Leader';
        $data['leader'] = $this->model('Get_models')->ambilMenuLeader();
        $data['projek'] =  $this->model('Get_models')->ambilallProjek(); 
        $data['TD'] = $this->model('Get_models')->ambilDetail(); 
        $this->view('template/leader/header',$data);
        $this->view('leader/projek',$data);
        $this->view('template/leader/footer');
     }

    public function member($id_projek,$id_jenis)
    {
        $data['judul'] ='Daftar Projek';
        // diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetailallbyid($id_projek,$id_jenis); 
        $data['MB'] = $this->model('Get_models')->ambilDetailbyid($id_projek,$id_jenis); 
        $data['member'] = $this->model('Get_models')->ambilUserMember();
        $this->view('template/leader/header',$data);
        $this->view('leader/member',$data);
        $this->view('template/leader/footer');
    }

    public function list()
    {
        $data['judul'] = 'List Projek';
        $data['TD'] = $this->model('Get_models')->ambilDetailselesaiL(); 
        $this->view('template/leader/header',$data);
        $this->view('leader/list', $data);
        $this->view('template/leader/footer');
    }

    public function list_member($id_projek,$id_jenis)
    {
        $data['judul'] ='Daftar Projek';
        // diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetailallbyid($id_projek,$id_jenis); 
        $data['MB'] = $this->model('Get_models')->ambilDetailbyid($id_projek,$id_jenis); 
        $data['member'] = $this->model('Get_models')->ambilUserMember();
        $this->view('template/leader/header',$data);
        $this->view('leader/list_member', $data);
        $this->view('template/leader/footer');
    }

    public function edit($id)
    {
        $data['judul'] ='Daftar Projek';
        // diambil dari class model dengn methodnya 
        $data['TD'] = $this->model('Get_models')->ambilDetailby2($id);
        $data['leader'] = $this->model('Get_models')->ambilallLeader();
        $data['projek'] =  $this->model('Get_models')->ambilallProjek();  
        $this->view('template/leader/header',$data);
        $this->view('leader/edit', $data);
        $this->view('template/leader/footer');
    }
 } 