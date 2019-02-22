<?php
 if (isset($_GET['deconnection'])) {
     session_destroy();
     header('location: ../index.php');
 }
 else {
     header('location: ../vue/;liste.php');
 }
?>