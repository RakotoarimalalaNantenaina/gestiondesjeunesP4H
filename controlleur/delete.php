<?php
    require '../Model/database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM jeune  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location:../vue/liste.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../vue/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vue/style.css">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>PASSION FOR HUMANITY</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <div class="for">
                      <p class="alert alert-error">voulez-vous vraiment supprimer ??</p>
                      <div class="form-actions" align=center >
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="../vue/liste.php" id="ab">No</a>
                        </div>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>