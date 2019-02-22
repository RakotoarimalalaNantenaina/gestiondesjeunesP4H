<?php 
        require('../Model/database.php');
     if ( !empty($_POST)) {
         // keep track validation errors
         $nomError = null;
         $prenomError= null;
         $ageError= null;
         $mailError = null;
         $numError = null;
         $marquepcError = null;
         $sexError = null;
         $statusError = null;
          
         // keep track post values
         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];
         $age = $_POST['age'];
         $mail = $_POST['mail'];
         $numtel = $_POST['numtel'];
         $marquepc = $_POST['marquepc'];
         $sex = $_POST['sex'];
         $status = $_POST['status'];
         $image = $_FILES['image']['name'];
         $target = "images/".basename($image);
   
         
         // validate input
         $valid = true;
         if (empty($nom)) {
             $nomError = 'Entrer votre nom';
             $valid = false;
         }
          
         if (empty($prenom)) {
            $prenomError = 'Entrer votre Prenom';
            $valid = false;
        }

        if (empty($age)) {
            $ageError = 'Entrer votre age';
            $valid = false;
        }

         if (empty($mail)) {
             $mailError = 'Enter votre adresse e-mail';
             $valid = false;
         } else if ( !filter_var($mail,FILTER_VALIDATE_EMAIL) ) {
             $mailError = 'Please enter a valid Email Address';
             $valid = false;
         }
          
         if (empty($numtel)) {
             $numtelError = 'Enter votre Numero';
             $valid = false;
         }

         if (empty($marquepc)) {
            $marquepcError = 'Entrer votre marque PC';
            $valid = false;
        }

        if (empty($sex)) {
            $sexError = 'Entrer votre sexe';
            $valid = false;
        }

        if (empty($status)) {
            $statusError = 'Entrer votre statu';
            $valid = false;
        }  

         // insert data
         if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $target = "../images/".basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
                $sql = "INSERT INTO jeune (nom,prenom,age,mail,numtel,marquepc,sex,status,image) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($nom,$prenom,$age,$mail,$marquepc,$numtel,$sex,$status,$image));
    
            }else{
                $msg = "Failed to upload image";
                echo $msg;
            }
            Database::disconnect();
            header("Location: ../vue/listejeune.php");  
         }
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
                        <h3>PASSION FOR HUMMANITY</h3>
                    </div>
                        <h4>CREER NOUVEAU JEUNE</h4><br>
                    <form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">

                    <div class="control-group <?php echo !empty($statusError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">PROFILE</h4>
                        <div class="controls">
                            <input type="file" name="image">
                        </div>
                    </div>

                      <div class="control-group <?php echo !empty($nomError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">Nom:</h4>
                        <div class="controls">
                            <input name="nom" type="text"  placeholder="Nom" id="create" value="<?php echo !empty($nom)?$nom:'';?>">
                            <?php if (!empty($nomError)): ?>
                                <span class="help-inline"><?php echo $nomError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($prenomError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">Prenom:</h4>
                        <div class="controls">
                            <input name="prenom" type="text"  placeholder="Prenom" id="create" value="<?php echo !empty($prenom)?$prenom:'';?>">
                            <?php if (!empty($prenomError)): ?>
                                <span class="help-inline"><?php echo $prenomError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($ageError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">Age:</h4>
                        <div class="controls">
                            <input name="age" type="text"  placeholder="age" id="create" value="<?php echo !empty($age)?$age:'';?>">
                            <?php if (!empty($ageError)): ?>
                                <span class="help-inline"><?php echo $ageError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($mailError)?'error':'';?>">
                      <h4 style="text-decoration-line:underline">Adresse mail:</h4>
                        <div class="controls">
                            <input name="mail" type="text" placeholder="Mail" id="create" value="<?php echo !empty($mail)?$mail:'';?>">
                            <?php if (!empty($mailError)): ?>
                                <span class="help-inline"><?php echo $mailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($numtelError)?'error':'';?>">
                      <h4 style="text-decoration-line:underline">MARQUE PC</h4>
                        <div class="controls">
                            <input name="numtel" type="text"  placeholder="Mobile Number" id="create" value="<?php echo !empty($numtel)?$numtel:'';?>">
                            <?php if (!empty($numtelError)): ?>
                                <span class="help-inline"><?php echo $numtelError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($marquepcError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">NUMERO DE TELEPHONE</h4>
                        <div class="controls">
                            <input name="marquepc" type="text"  placeholder="Marque pc" id="create" value="<?php echo !empty($marquepc)?$marquepc:'';?>">
                            <?php if (!empty($marquepcError)): ?>
                                <span class="help-inline"><?php echo $marquepcError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($sexError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">SEXE</h4>
                        <div class="controls">
                            <select name="sex" id="select">
                                <option value="<?php echo !empty($sex)?$sex:'homme';?>">Homme</option>
                                <option value="<?php echo !empty($sex)?$sex:'femme';?>">Femme</option>
                            </select>
                            <?php if (!empty($sexError)): ?>
                                <span class="help-inline"><?php echo $sexError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($statusError)?'error':'';?>">
                        <h4 style="text-decoration-line:underline">STATU</h4>
                        <div class="controls">
                            <select name="status" id="select">
                                <option value="<?php echo !empty($status)?$status:'formation';?>">formation</option>
                                <option value="<?php echo !empty($status)?$status:'stage';?>">Stage</option>
                            </select>
                            <?php if (!empty($statusError)): ?>
                                <span class="help-inline"><?php echo $statusError;?></span>
                            <?php endif; ?>
                        </div>
                      </div><br>
                    
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn btn-success" href="../vue/listejeune.php" id="ab">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>
