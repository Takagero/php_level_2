<?php
Class Controller_Admin Extends Controller_Base {


        function index() {
        	
        // Кнопка ВЫХОД
		if (isset($_POST['exit'])) {
			unset($_SESSION['true_auth']);
		}
        	
    	if (isset($_SESSION['true_auth']) && $_SESSION['true_auth'] != null) {
    		
    		$data = array();
    		
    		$data['articles'] = $this->registry['model']->getArticles();
    		
    		
    		$this->registry['template']->set('data', $data);
    		$this->registry['template']->set('user_data', $_SESSION);
			$this->registry['template']->show('admin');
	
		} else {
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) {
				
				if (isset($_POST['name'])) {
					$name = $_POST['name'];
				}else{
					$name = '';
				}
				if (isset($_POST['pass'])) {
					$pass = $_POST['pass'];
				}else{
					$pass = '';
				}
				if (isset($_POST['remember'])) {
					$remember = $_POST['remember'];
				}else{
					$remember = '';
				}
				
				$user_data = array(
					'name'		=> $name,
					'pass'		=> $pass,
					'remember'	=> $remember
				);
				
				$auth = $this->registry['model']->auth($user_data);
				
			}
			
		if (isset($auth) && $auth != NULL) {
			$_SESSION['true_auth'] = $auth;
//			$this->registry['template']->show('admin');
			header('Location: admin');
			}
		
					$_SESSION['user'] = $this->registry['model']->user_get($_COOKIE['PHPSESSID']);
					
		        	$this->registry['template']->set('user_data', $_SESSION['user']);
		        	$this->registry['template']->show('auth');
		        	
		        }
			}

}


?>