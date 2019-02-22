<?php
	include("login/dbh.php");
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
			if (empty($_POST['username']) || empty($_POST['password'])) {
			echo header('location:index.php?erreur=Entrer votre \'username\' ou \'votre mot de passe\'');
			}
			else{
				// Define $username and $password
				$username=$_POST['username'];
				$password=$_POST['password'];
				// SQL query to fetch information of registerd users and finds user match.
				$requet="select * from user";
				$query=$conn->query($requet);
				if ($query->execute()) {
						$_SESSION['login_user']=$username;
						$_SESSION['login']=$password; 
						while ($fo=$query->fetch()) {
							if ($password==$fo['password'] && $username==$fo['username']){
							header("location:vue/liste.php"); // Redirecting To Other Page
						} // Initializing Session
					else{
							header('location:index.php?erreur=Verifier \'Username\' ou votre \'mot de passe\'');
						}
						}
						} 
				}
	}
?>