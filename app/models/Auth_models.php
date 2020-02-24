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
         $password =  md5($data['password']);

          if ( isset($username) && $username !== '') {
            if ($datauser = $this->getUserBy("username", $username)) {
                $password_user = $datauser["password"];
                $role = $datauser['id_level'];
                if ($password === $password_user) {
                    if ($role == '1' || $role == 1) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['status'] = 'login';
                        $_SESSION['role'] = '1';
                        header('Location: '.BASEURL.'/user');
                    }
                    elseif ($role == '2' || $role == 2) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['status'] = 'login';
                        $_SESSION['role'] = '2';
                        header('Location: '.BASEURL.'');
                    }elseif ($role == '3' || $role == 3){
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['status'] = 'login';
                        $_SESSION['role'] = '3';
                        header('Location: '.BASEURL.'');
                    }
                }else{
                    header('Location: '.BASEURL.'/auth/login');
                }
            } else {
                header('Location: '.BASEURL.'/auth/login');
            }
        } else {
            header('Location: '.BASEURL.'/auth/login');
        }
    }
    
        
}