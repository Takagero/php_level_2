<?php
Class Model {

        private $registry;

        function __construct($registry) {
                $this->registry = $registry;
        }
        
        function auth($user_data){
		$user_data['name'] = trim($user_data['name']);
		$user_data['pass'] = trim($user_data['pass']);

		$query = $this->registry['db']->query("SELECT * FROM users WHERE login = '". $user_data['name'] ."' AND password = '". $user_data['pass'] ."' ");
		
		$auth = $query->fetch(PDO::FETCH_ASSOC);
	    
	    if ($user_data['remember'] == true) {
	    	$_SESSION['hash'] = $_COOKIE['PHPSESSID'];
	    }else{
	    	$_SESSION['hash'] = '';
	    }
	    
		$data_execute[] = $_SESSION['hash'];
		$data_execute[] = $auth['id'];
		
	    $up = $this->registry['db']->prepare("UPDATE `users` SET `hash` = ? WHERE `id` = ? "); 
		$up->execute($data_execute);
		
		unset($_SESSION['hash']);
		
	    return $auth;
	}
	
	function user_get($param){
		
		$query = $this->registry['db']->query("SELECT * FROM users WHERE hash = '". $param ."' ");
		$result = $query->fetchAll();
	    
	    return $result;
	}
	
	function getArticles(){
		
		$query = $this->registry['db']->query("SELECT * FROM article AS a
		JOIN users AS u 
		ON a.user_id = u.id 
		ORDER BY a.id DESC 
		");
		
		$articles = $query->fetchAll();
		
		if (empty($articles)) {
			return false;
		}
		
		return $articles;
	}
}
?>