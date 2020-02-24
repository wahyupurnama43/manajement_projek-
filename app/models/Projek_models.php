<?php


class Projek_models
{
  	private $db;

  	public function __construct()
  	{
  		$this->db = new Database;
  	}

    public function addProjek($data)
    {
      date_default_timezone_set('Asia/Kuala_Lumpur');
      $date = date('Y-m-d H:i:s');
      $query = "INSERT INTO tb_projek VALUE ('', :id_jenis, :id_auth, :tugas, '$date', '')";
      $this->db->query($query);
      $this->db->bind('id_jenis', $data['projek']);
      $this->db->bind('id_auth', $data['leader']);
      $this->db->bind('tugas', $data['tugas']);

      $this->db->execute();
      return $this->db->rowCount();
    }

  	public function updateProjek($data)
    {
      $query = "UPDATE tb_projek SET id_jenis = :id_jenis, id_auth = :id_auth, tugas = :tugas WHERE id_projek = :id_projek";
      $this->db->query($query);
      $this->db->bind('id_jenis', $data['projek']);
      $this->db->bind('id_auth', $data['leader']);
      $this->db->bind('tugas', $data['tugas']);
      $this->db->bind('id_projek', $data['id']);

      $this->db->execute();
      return $this->db->rowCount();
    }

    public function addUser($data)
    {
      $password = $data['password'];
      $query = "INSERT INTO auth VALUES ('', :nama, :username, :password, :id_level)";
      $this->db->query($query);
      $this->db->bind('nama', $data['nama']);
      $this->db->bind('username', $data['username']);
      $this->db->bind('password', md5($password) );
      $this->db->bind('id_level', $data['id_level']);

      $this->db->execute();
      return $this->db->rowCount();
    }
  	
    public function hapus($id)
    {
      $query = "DELETE FROM auth WHERE id_auth = :id_auth";
      $this->db->query($query);
      $this->db->bind('id_auth', $id);

      $this->db->execute();
      return $this->db->rowCount();
    }

    public function addLaporan($data)
    {
      date_default_timezone_set('Asia/Kuala_Lumpur');
      $date = date('Y-m-d H:i:s');
      $query = "INSERT INTO tb_laporan VALUES ('', :id_auth, :id_jenis, :tugas, '$date')";
      $this->db->query($query);
      $this->db->bind('id_auth', $data['member']);
      $this->db->bind('id_jenis', $data['projek']);
      $this->db->bind('tugas', $data['tugas_harian']);

      $this->db->execute();
      return $this->db->rowCount();
    }

    public function hapus_Laporan($id)
    {
      $query = "DELETE FROM tb_laporan WHERE id_laporan = :id_laporan";
      $this->db->query($query);
      $this->db->bind('id_laporan', $id);

      $this->db->execute();
      $this->db->rowCount();
    }

    public function ubah_Laporan($data)
    {
      $query = "UPDATE tb_laporan SET id_auth = :id_auth, id_jenis = :id_jenis, tugas = :tugas WHERE id_laporan = :id_laporan";
      $this->db->query($query);
      $this->db->bind('id_auth', $data['member']);
      $this->db->bind('id_jenis', $data['projek']);
      $this->db->bind('tugas', $data['tugas']);
      $this->db->bind('id_laporan', $data['id']);

      $this->db->execute();
      $this->db->rowCount();
    }

    public function addMember($data)
    {
      date_default_timezone_set('Asia/Kuala_Lumpur');
      $date = date('Y-m-d H:i:s');
      $query = "INSERT INTO tb_detail VALUES ('',:id_auth ,:id_projek, :id_jenis, '$date')";
      $this->db->query($query);
      $this->db->bind('id_auth',$data['member']);
      $this->db->bind('id_projek', $data['id_projek']);
      $this->db->bind('id_jenis',$data['id_jenis']);

      $this->db->execute();
      $this->db->rowCount();
    }

    public function hapus_MP($id)
    {
      $query = "DELETE FROM tb_detail WHERE id_detail = :id_detail ";
      $this->db->query($query);

      $this->db->bind('id_detail', $id);

      $this->db->execute();
      $this->db->rowCount();
    }

    public function selesai($id)
    {
      date_default_timezone_set('Asia/Kuala_Lumpur');
      $date = date('Y-m-d H:i:s');
      $query = "UPDATE tb_projek SET tanggal_akhir = :tanggal_akhir WHERE id_projek = :id_projek";

      $this->db->query($query);
      $this->db->bind('tanggal_akhir', $date);
      $this->db->bind('id_projek', $id);
      $this->db->execute();
      $this->db->rowCount();
    }

     public function hapus_projek($id)
    {
      $query = "DELETE FROM tb_projek WHERE id_projek = :id_projek";
      $this->db->query($query);
      $this->db->bind('id_projek', $id);

      $this->db->execute();
      $this->db->rowCount();
    }

    
}
