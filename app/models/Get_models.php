<?php  



class Get_models
{
	private $db;
	public function __construct()
	{
		$this->db = new Database;
	}

  public function ambilDetail()
  { 
    if (isset($_SESSION['role']) && isset($_SESSION['auth'])) {
        $group = $_SESSION['role'];
        $id_auth = $_SESSION['auth'];
        if($group =='3')
        {
          $query = "SELECT * FROM tb_projek 
                    INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
                    INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir = '0000-00-00' ";
        }
        else if($group=='2')
        {
          $query = "SELECT * FROM tb_projek 
                    INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
                    INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir = '0000-00-00' AND tb_projek.id_auth = $id_auth";
        }
        else if($group=='1')
        {
          $query = "SELECT * FROM tb_projek 
                    INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
                    INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir = '0000-00-00' AND id_projek in(select tb_detail.id_projek FROM tb_detail WHERE tb_detail.id_auth = $id_auth group by tb_detail.id_projek)";
        }
        $this->db->query($query);
        return $this->db->resultSet(); 
    }
    
  }

  public function ambilDetailselesai()
  {
    $id_auth = $_SESSION['auth'];
    $query = "SELECT * FROM tb_projek 
              INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
              INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir != 0000-00-00";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilDetailselesaiL()
  {
    $id_auth = $_SESSION['auth'];
    $query = "SELECT * FROM tb_projek 
              INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
              INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir != 0000-00-00  AND tb_projek.id_auth = $id_auth ";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilallLeader()
  {
    $query = "SELECT * FROM auth WHERE id_level = 2 ";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilMenuLeader()
  {
    $id_auth = $_SESSION['auth'];
    $query = "SELECT * FROM auth WHERE id_level = 2 AND auth.id_auth = $id_auth";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilUser()
  {
    $query = "SELECT * FROM auth 
              INNER JOIN tb_level ON auth.id_level = tb_level.id_level";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilallProjek()
  {
    $query = "SELECT * FROM jenis_projek";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilDetailallbyid($id_projek,$id_jenis)
  {

    $query = "SELECT * FROM tb_detail
              INNER JOIN auth ON tb_detail.id_auth = auth.id_auth 
              INNER JOIN jenis_projek ON tb_detail.id_jenis = jenis_projek.id_jenis WHERE id_projek = :id_projek";

    $this->db->query($query);
    $this->db->bind('id_projek', $id_projek);
    return $this->db->resultSet();
  }

  public function ambilDetailbyid($id_projek,$id_jenis)
  {
    $row = 
    [
      'id_projek' => $id_projek,
      'id_jenis' => $id_jenis,
    ];

    return $row;
   
  }

  public function ambilDetailby2($id)
  {
    $query = "SELECT * FROM tb_projek WHERE id_projek = :id_projek";
    $this->db->query($query);
    $this->db->bind('id_projek', $id);
    return $this->db->single();
  }

  public function ambilLeader($id)
  {
    $query = "SELECT * FROM auth WHERE id_level = 2";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilProjek($id)
  {
    $query = "SELECT * FROM jenis_projek";
    $this->db->query($query);
    return $this->db->resultSet();
  }
   public function ambilLaporan()
  {
     
    if (isset($_SESSION['auth'])) {
        $id_auth = $_SESSION['auth'];
        $query = "SELECT * FROM tb_laporan
                  INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                  INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis";
        $this->db->query($query);
        return $this->db->resultSet();
      }else {
        header('Location: '.BASEURL.'/auth/login');
      }
  }

  public function ambilLaporanL()
  {
     
     if (isset($_SESSION['auth'])) {
       $id_auth = $_SESSION['auth'];
        $query = "SELECT * FROM tb_laporan
                  INNER JOIN auth ON tb_laporan.id_auth =  auth.id_auth
                  INNER JOIN jenis_projek ON tb_laporan.id_jenis =  jenis_projek.id_jenis WHERE tb_laporan.id_auth = $id_auth";
        $this->db->query($query);
        return $this->db->resultSet();
      }else {
        header('Location: '.BASEURL.'/auth/login');
      }
  }

  public function editLaporan($id)
  {
    $query = "SELECT * FROM tb_laporan WHERE id_laporan = :id_laporan";
    $this->db->query($query);
    $this->db->bind('id_laporan', $id);
    return $this->db->single();
  }

  /*-------------------------- AMBIL USER MEMBER ----------------------*/
  public function ambilUserMember()
  {
   
    if (isset($_SESSION['auth'])) {
        $id_auth = $_SESSION['auth'];
        $query = "SELECT * FROM auth WHERE id_level = 1 ";
        $this->db->query($query);
        return $this->db->resultSet();
      }else {
        header('Location: '.BASEURL.'/auth/login');
      }
  }

  public function ambilUserMemberU()
  {
    
      if (isset($_SESSION['auth'])) {
        $id_auth = $_SESSION['auth'];
        $query = "SELECT * FROM auth WHERE id_level = 1 AND id_auth = $id_auth";
        $this->db->query($query);
        return $this->db->resultSet();
      }else {
        header('Location: '.BASEURL.'/auth/login');
      }
  }

  public function ambilMemberbyid($id)
  {
    $query = "SELECT * FROM auth WHERE id_level = 1";

    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function ambilJenisProjekadmin()
  {
      $query = "SELECT * FROM jenis_projek";
      $this->db->query($query);
      return $this->db->resultSet();
  }

  public function ambilJenisProjek()
  {
    if (isset($_SESSION['auth'])) {
      $id_auth = $_SESSION['auth'];
      $query = "SELECT * FROM tb_projek 
                  INNER JOIN auth ON tb_projek.id_auth = auth.id_auth
                  INNER JOIN jenis_projek ON tb_projek.id_jenis = jenis_projek.id_jenis WHERE tanggal_akhir = '0000-00-00' AND id_projek in(select tb_detail.id_projek FROM tb_detail WHERE tb_detail.id_auth = $id_auth group by tb_detail.id_projek)";
      $this->db->query($query);
      return $this->db->resultSet();
    }else {
      header('Location: '.BASEURL.'/auth/login');
    }
     
  }

  public function ambilProjekbyid($id)
  {
    $query = "SELECT * FROM jenis_projek";
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function totalCountuser()
  {
    $query = "SELECT COUNT(*) FROM auth";
    $this->db->query($query);
    return $this->db->resultarray();
  }

  public function totalCountprojekL()
  {
    if (isset($_SESSION['auth'])) {
      $id_auth = $_SESSION['auth'];
      $query = "SELECT COUNT(*) FROM tb_projek WHERE tanggal_akhir = 0000-00-00 AND id_auth = $id_auth ";
      $this->db->query($query);
      return $this->db->resultarray();
    }else {
      header('Location: '.BASEURL.'/auth/login');
    }
  }

  public function totalCountprojek()
  {
    if ($_SESSION['auth']) {
      $id_auth = $_SESSION['auth'];
      $query = "SELECT COUNT(*) FROM tb_projek WHERE tanggal_akhir = 0000-00-00";
      $this->db->query($query);
      return $this->db->resultarray();
    }
    else {
      header('Location: '.BASEURL.'/auth/login');
    }
    
  }

  public function totalCountselesai()
  {
    $query = "SELECT COUNT(*) FROM tb_projek WHERE tanggal_akhir != 0000-00-00";
    $this->db->query($query);
    return $this->db->resultarray();
  }

  public function totalCountselesaiL()
  {
    if ($_SESSION['auth']) {
      $id_auth = $_SESSION['auth'];
      $query = "SELECT COUNT(*) FROM tb_projek WHERE tanggal_akhir != 0000-00-00 AND id_auth = $id_auth";
      $this->db->query($query);
      return $this->db->resultarray();
    }
    else {
      header('Location: '.BASEURL.'/auth/login');
    }
   
  }

  public function totalCountLp()
  {
    $query = "SELECT COUNT(*) FROM tb_laporan";
    $this->db->query($query);
    return $this->db->resultarray();
  }

 
}