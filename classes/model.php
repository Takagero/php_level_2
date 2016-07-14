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
		
		
//		Достаем статьи а автора
		$query = $this->registry['db']->query("SELECT *, u.login as users FROM article AS a
		LEFT JOIN users u 
		ON a.user_id = u.id 
		ORDER BY a.id DESC 
		");
		
//		$query = $this->registry['db']->query("SELECT * FROM super_blog.article sa 
//		WHERE sa.user_id 
//		IN (SELECT id FROM super_blog.users su WHERE su.id = sa.user_id)");
		
		$query->setFetchMode(PDO::FETCH_ASSOC);
		$results = $query->fetchAll();
		
		if (empty($results)) {
			return false;
		}
		
		return $results;
	}
	
//	function getTags(){
//		
////		Достаем теги к статье
//		$query2 = $this->registry['db']->query("SELECT name FROM tags AS t
//		LEFT JOIN article_tags AS at 
//		ON t.id = at.tag_id
//		");
//		$query2->setFetchMode(PDO::FETCH_ASSOC);
//		$results[] = $query2->fetchALl();
//		
//		if (empty($results)) {
//			return false;
//		}
//		
//		return $results;
//	}
}
?>