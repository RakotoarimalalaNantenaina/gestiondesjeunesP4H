<?php
require('../Model/database.php');
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM jeune where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../vue/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vue/style.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                    <h3>PASSION FOR HUMANITY</h3>
                    </div>
                    <div class="form-horizontal" >
                    <h4 style="text-decoration-line: underline">PROFILE:</h4>
                        <img src="../images/<?php echo $data['image']; ?>" id="image">
                      </div>
                      <div class="control-group">
                        <h4 style="text-decoration-line: underline">Nom:</h4>
                        <span><?php echo $data['nom'];?></span>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <h4 style="text-decoration-line: underline">Prenom:</h4>
                        <span><?php echo $data['prenom'];?></span>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <h4 style="text-decoration-line: underline">Age:</h4>
                        <span><?php echo $data['age'];?></span>
                      </div>
                      <div class="control-group">
                      <h4 style="text-decoration-line: underline">Email Adresse:</h4>
                        <div class="controls">
                                <span><?php echo $data['mail'];?></span>
                        </div>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <h4 style="text-decoration-line: underline">NUMERO TELEPHONE:</h4>
                        <span><?php echo $data['numtel'];?></span>
                      </div>
                      <div class="control-group">
                      <h4 style="text-decoration-line: underline">Marque PC:</h4>
                        <div class="controls">
                       <span><?php echo $data['marquepc'];?></span>
                        </div>
                        <div class="form-horizontal" >
                      <div class="control-group">
                        <h4 style="text-decoration-line: underline">SEXE:</h4>
                        <span><?php echo $data['sex'];?></span>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <h4 style="text-decoration-line: underline">STATU:</h4>
                        <span><?php echo $data['status'];?></span>
                      </div>
                      <div class="control-group">
                      </div><br>
                        <div class="form-actions">
                          <a class="btn btn-success" href="../vue/liste.php" id="ab">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
