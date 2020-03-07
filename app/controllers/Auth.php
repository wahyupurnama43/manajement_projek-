<?php 


class Auth extends Controller
{
    
	public function dashboard()
	{
		
    	if ( !isset($_POST['login']) ) {
        $data['judul'] = "Login";
			  $this->view('template/auth/header',$data);
	    	$this->view('auth/login');
	    	$this->view('template/auth/footer');
      } else {
            $this->model('Auth_models')->login($_POST);
      }
	}

	public function logout()
    {
      $_SESSION = [];
      session_unset();
      session_destroy();
      header('Location: '.BASEURL.'/auth/login');
    }


}
