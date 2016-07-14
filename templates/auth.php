<?
if (isset($user_data) && !empty($user_data[0]['login'])){
	$login = $user_data[0]['login'];
	$password = $user_data[0]['password'];
	$hash = $user_data[0]['hash'];
}else {
	$login = '';
	$password = '';
	$hash = '';
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	</head>
	<body>
		<div>
			Пожалуйста авторизуйтесь
		</div>
		<form action="" method="POST">
			<input type="text" name="name" value="<?=$login;?>"><br>
			<input type="password" name="pass" value="<?=$password;?>"><br>
			<label><input type="checkbox" name="remember" <?=$checked = (empty($hash)) ? '' : 'checked';?>>Запомнить меня</label><br>
			<input type="submit" name="send" value="Войти" >
		</form>
		
		<form action="index.php" method="POST">
			<div>
				<input name="home" type="submit" value="Главная страница">
			<div>
		</form>
	</body>
</html>