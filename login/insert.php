<?php 
     include('dbh.php');
     if (isset($_POST['submit'])){
        $username=$_POST['user'];
        $password=$_POST['pass'];

     $sql = "INSERT INTO user (username,password) values(?, ?)";
     $q = $conn->prepare($sql);
    if( $q->execute(array($username,$password))){
		 header("location:../index.php");
	}
	else{
		echo 'non';	
	}
     }
?>
