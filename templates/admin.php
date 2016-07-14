<!DOCTYPE html>
<?php
var_dump($data);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Super Blog</title>
		<script src="lib/jquery/jquery-1.12.0.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container" style="border:1px solid;">
			<?php
			if (isset($user_data)){
			?>
			<h1>Hello <?=$user_data['true_auth']['login'];?>!</h1>
			<?
			}
			?>
		
			<div class="row">
				<div class="col-md-10" style="border:1px solid;">
				class="col-md-10"
				</div>
				
				<div class="col-md-2" style="border:1px solid;">
				
					<form action="" method="POST">
							<div>
								<input name="exit" type="submit" value="Выход">
							</div>
					</form>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12" style="border:1px solid;">
					class="col-md-12
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4" style="border:1px solid;">
					class="col-md-4
				</div>
				<div class="col-md-8" style="border:1px solid;">
					class="col-md-8
				</div>
			</div>
		</div>
	</body>
</html>