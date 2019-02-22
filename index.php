<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="UTF-8">
  <title>CONNEXION et INSCRIPTION</title>
  <link href="login/login.css" rel="stylesheet" type="text/css">
  <link href="vue/bootsrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<center>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">SE CONNECTER</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'INSCRIRE</label>
		<div class="login-form">
			<div class="sign-in-htm">
			<div class="hr"></div>
			<form method="post" action="login.php">
				<h2>CONNEXION</h2>
				<div class="group">
					<label for="user" class="label">USERNAME :</label><br>
					<input id="user" type="text" class="input" name="username">
				</div>
				<div class="group">
					<label for="pass" class="label">CONFIRMATION DE MOT DE PASSE :</label><br>
					<input id="pass" type="password" class="input" data-type="password" name="password">
				</div>
				<?php
				     if (isset($_GET['erreur'])) {
						 echo  $_GET['erreur'];
					 }
				 ?> 
				<br>
				<div class="group">
					<input type="submit" name="submit" class="button" value="Se connecter">
				</div>
			</form>	
			</div>
			<div class="sign-up-htm">
			<form action="login/insert.php" method="post">
				<div class="hr"></div>
				<h2>INSCRIPTION</h2>
				<div class="group">
					<label for="user" class="label">Username :</label><br>
					<input id="user" type="text" class="input" name="user"  placeholder="username">
				</div>
				<div class="group">
					<label for="pass" class="label">votre mot de passe :</label><br>
					<input id="pass" type="password" class="input" data-type="password" name="pass"  placeholder="********" >
				</div>
				  <br>
				<div class="group">
					<button type="submit" name="submit" class="button">S'INSCRIRE</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	</center>
</div>
</body>
</html>