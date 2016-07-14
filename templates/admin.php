<!DOCTYPE html>
<?php
//var_dump($data);
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Super Blog</title>
		<script src="lib/jquery/jquery-1.12.0.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<style type="text/css">
		.col-md-3,
		.col-md-1, 
		.col-md-2, 
		.col-md-12, 
		.col-md-10 {
		border: 1px solid;
		text-align: center;
		}
		
		table {
		width: 100%;
		margin: 10px;
		}
		
		table,
		tr,
		td {
		border: 1px solid;
		padding: 10px;
		}
		
		th {
		padding: 10px;
		text-align: center;
		border: 1px solid;
		}
		
		.text-align-left {
		text-align: left;
		}
		</style>
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
				<div class="col-md-12">
					class="col-md-12
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="header">
						Menu
					</div>
					
				</div>
				<div class="col-md-10">
					<div  class="header">
						Наши статьи
					</div>
					<table>
						<th>
							Автор
						</th>
						<th>
							Статья
						</th>
						<th>
							Дата добавления
						</th>
						<th>
							Действия
						</th>
						<?php
						
							foreach ($data['articles'] as $dataKey => $article) {
								var_dump($article);
						?>
						<tr>
							<td>
								<?=$article['login'];?>
							</td>
							<td class="text-align-left">
								Название : <?=$article['title'];?><br>
							</td>
							<td>
								<?=$article['date'];?>
							</td>
							<td>
								<form>
								<input type="submit" name="edit" value="<?=$article['id'];?>"><br>
								<input type="submit" name="delete" value="<?=$article['id'];?>">
								</form>
							</td>
						</tr>
					<?php
					}
					?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>