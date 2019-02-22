<?php
    require '../Model/database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $prenomError = null;
        $ageError = null;
        $emailError = null;
        $mobileError = null;
        $marquepcError = null;
       
         
        // keep track post values
        $name = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $email = $_POST['mail'];
        $mobile = $_POST['numtel'];
        $marquepc = $_POST['marquepc'];
        $sex = $_POST['sex'];
        $status = $_POST['status'];
        $image = $_POST['image'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
        if (empty($prenom)) {
            $prenomError = 'Please enter Prenom';
            $valid = false;
        }
        if (empty($age)) {
            $nameError = 'Please enter Age';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
        if (empty($marquepc)) {
            $marquepcError = 'Please enter Marque PC';
            $valid = false;
        }
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE jeune  set nom = ?, prenom = ?,age = ?,mail = ?, numtel =?,marquepc = ?,sex = ?,status = ? ,image = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$prenom,$age,$email,$mobile,$marquepc,$sex,$status,$image,$id));
            Database::disconnect();
            header("Location: ../vue/listejeune.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM jeune where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['nom'];
        $prenom = $data['prenom'];
        $age = $data['age'];
        $email = $data['mail'];
        $mobile = $data['numtel'];
        $marquepc = $data['marquepc'];
        $sex = $data['sex'];
        $status = $data['status'];
        $image = $data['image'];
        Database::disconnect();
    }
 ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../vue/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link    rel="stylesheet" href="../vue/style.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                            <h3>PASSION FOR HUMANITY</h3>
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                        <h4>MODIFIER OU METRE A JOUR LA LISTE</h4>
                    <div class="control-group">
                        <h4>Profile</h4>
                        <p1><img src="../images/<?php echo $data['image']; ?>"></p1>
                        <div class="controls">
                            <input name="image" type="file">
                        </div>
                      </div>   

                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                       <h4>Nom</h4>
                        <div class="controls">
                            <input name="nom" type="text"  placeholder="Nom" id="create" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($prenomError)?'error':'';?>">
                        <h4>Prenom</h4>
                        <div class="controls">
                            <input name="prenom" type="text"  placeholder="Prenom" id="create" value="<?php echo !empty($prenom)?$prenom:'';?>">
                            <?php if (!empty($prenomError)): ?>
                                <span class="help-inline"><?php echo $prenomError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ageError)?'error':'';?>">
                       <h4>Age</h4>
                        <div class="controls">
                            <input name="age" type="text"  placeholder="Age"  id="create" value="<?php echo !empty($age)?$age:'';?>">
                            <?php if (!empty($ageError)): ?>
                                <span class="help-inline"><?php echo $ageError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <h4>Adresse E-mail</h4>
                        <div class="controls">
                            <input name="mail" type="text" placeholder="Email Address" id="create" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
                       <h4>Numero telephone</h4>
                        <div class="controls">
                            <input name="numtel" type="text"  placeholder="Mobile Number" id="create" value="<?php echo !empty($mobile)?$mobile:'';?>">
                            <?php if (!empty($mobileError)): ?>
                                <span class="help-inline"><?php echo $mobileError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($marquepcError)?'error':'';?>">
                        <h4>Marque PC</h4>
                        <div class="controls">
                            <input name="marquepc" type="text"  placeholder="Marque pc"id="create" value="<?php echo !empty($marquepc)?$marquepc:'';?>">
                            <?php if (!empty($marquepcError)): ?>
                                <span class="help-inline"><?php echo $marquepcError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        <h4>SEXE</h4>
                        <div class="controls">
                            <select name="sex" id="select">
                            <option value="<?php echo 'homme'; ?>">Homme</option>
                            <option value="<?php echo 'femme'; ?>">Femme</option>
                            </select>
                            <?php if (!empty($sexError)): ?>
                                <span class="help-inline"><?php echo $sexError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        <h4>Statu</h4>
                        <div class="controls">
                        <select name="status" id="select">
                                <option value="<?php echo 'formation'; ?>">Formation</option>
                                <option value="<?php echo 'stage'; ?>">Stage</option>
                            </select>
                        </div><br>  
                       <div class="form-actions">
                          <button type="submit" class="btn btn-success">UPDATE</button>
                          <a class="btn" href="../vue/liste.php" id="ab">BACK</a>
                        </div>
                    </div> 
                    </div>
                    </form>
                </div>     
        </div>
  </body>
</html>