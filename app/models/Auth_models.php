<?php 


class Auth_models
{
    
    private $tb = "auth",
    		$db,
    		$url;

    public function __construct()
    {
        $this->db = new Database();
    }

   	public function getUserBy($verificator, $value)
    {
        if (isset($verificator) && isset($value)) {
            $q = "SELECT * FROM $this->tb WHERE $verificator = :$verificator";
            $this->db->query($q);
            $this->db->bind($verificator, $value);
            return $this->db->single();
        }
    }

   	public function login($data)
    {
   		 $username = $data['username'];
         $password = $data['password'];
 
         if ( isset($username) && $username !== '') {
             if ($datauser = $this->getUserBy("username", $username)) {
                $password_user = $datauser["password"];
                $role = $datauser['id_level'];
                $id_auth = $datauser['id_auth'];
                $nama = $datauser['nama'];

                 if (isset($password) && $password !== '') {
                    if (password_verify($password, $password_user)) {
                            if ($role == '1' || $role == 1) {
                                session_start();
                                $_SESSION['username'] = $username;
                                $_SESSION['status'] = 'login';
                                $_SESSION['role'] = '1';
                                $_SESSION['nama'] = $nama;
                                $_SESSION['auth'] = $id_auth;
                                 Flasher::setFlash('Selamat Datang ', $username,'success');
                                header('Location: '.BASEURL.'/user');
                            }
                            elseif ($role == '2' || $role == 2) {
                                // session_start();
                                $_SESSION['username'] = $username;
                                $_SESSION['status'] = 'login';
                                $_SESSION['role'] = '2';
                                $_SESSION['nama'] = $nama;
                                $_SESSION['auth'] = $id_auth;
                                Flasher::setFlash('Selamat Datang ', $username,'success');
                                header('Location: '.BASEURL.'/leader');
                            }elseif ($role == '3' || $role == 3){
                                session_start();
                                $_SESSION['username'] = $username;
                                $_SESSION['status'] = 'login';
                                $_SESSION['role'] = '3';
                                $_SESSION['nama'] = $nama;
                                 $_SESSION['auth'] = $id_auth;
                                Flasher::setFlash('Selamat Datang ', $username,'success');
                                header('Location: '.BASEURL.'');
                            }
                        }else{ //end if password verify
                            Flasher::setFlash('Password Anda', ' Salah !!','error');
                            header('Location: '.BASEURL.'/auth/login');
                        }
                 }else { //end if password
                    Flasher::setFlash('Username Dan Password ', 'Harus Diisi !!','error');
                     header('Location: '.BASEURL.'/auth/login');
                 }
             }else { //end if datauser
                 Flasher::setFlash('Username Anda', ' Tidak Terdaftar!!','error');
                 header('Location: '.BASEURL.'/auth/login');
             }
         }else { //end if isset username
             Flasher::setFlash('Username Dan Password ', 'Harus Diisi !!','error');
             header('Location: '.BASEURL.'/auth/login');
         }













    }




    
        
}