<?php session_start() ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../vue/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vue/style.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body class="total">
    <header>
    <h1>FORMATION P4H</h1>
    <div class="container-fluid">   
      <div class="navbar navbar-nav navbar-right">
            <h4><a href="../login/logout.php">DECONNECTION</a></h4>
        </div>
    </div>
    
	<div>
        <center>
        VOUS ETES INSCRIT SOUS " USERNAME ":<h3><?php echo $_SESSION['login_user']; ?></h3><br>
        </center>
	</div>
    </header>
    <div class="container-fluid">
        <div class="container" id="cont">
            <div class="row" id="table">
                <div class="col-md-3">
                    <a href="listejeune.php" class="btn btn-success" id="one">LISTE DES JEUNES<br>EN FORMATION</a>
                </div>
                <div class="col-md-3">
                    <a href="listestage.php" class="btn btn-success" id="one">LISTE DES JEUNES<br>EN STAGE</a>
                </div>
                <div class="col-md-3">
                    <a href="jeunehomme.php" class="btn btn-success" id="two">LISTE DES JEUNES<br>HOMMES</a>
                </div>
                <div class="col-md-3">
                    <a href="jeunefemme.php" class="btn btn-success" id="two">LISTE DES JEUNES<br>FEMMES</a>
                </div>
        </div>
    </div>
    <h3>Chez Passion For Humanity , nous avons à coeur<br>la formation des jeunes des milieux modestes.</h3>
  </body>
</html>