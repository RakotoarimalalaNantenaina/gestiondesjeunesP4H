<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container-fluid">
            <div class="row">
                <h3>PASSION FOR HUMANITY</h3>
            </div>
            <div class="row">
                <p>
                    <a href="../controlleur/create.php" class="btn btn-success" id="three">Create</a>
                </p>        
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Profil</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Age</th>
                          <th>mail</th>
                          <th>numero telephone</th>
                          <th>marquepc</th>
                          <th>sexe</th>
                          <th>statut</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include '../Model/database.php';
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM jeune WHERE status="stage" ORDER BY id DESC';
                       foreach ($pdo->query($sql) as $row) { ?>
                            <tr>
                                <td>
                                    <img src="../images/<?php echo $row['image']; ?>" >
                                </td>
                               <td><?php  echo $row['nom']; ?></td>
                               <td><?php  echo $row['prenom']; ?></td>
                               <td><?php  echo $row['age']; ?></td>
                               <td><?php  echo $row['mail']; ?></td>
                               <td><?php  echo $row['numtel']; ?></td>
                               <td><?php  echo $row['marquepc']; ?></td>
                               <td><?php  echo $row['sex']; ?></td>
                               <td><?php  echo $row['status']; ?></td>
                               <td width=300px>
                                    <a class="btn btn-success" id="ab" href="../controlleur/read.php?id=<?php echo $row['id']; ?>">Read</a>
                                    <a class="btn btn-success" href="../controlleur/update.php?id=<?php echo $row['id']; ?>" id="update">Update</a>
                                    <a class="btn btn-danger" href="../controlleur/delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                               </td>
                            </tr>
                     <?php  }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
        <a href="liste.php" class="btn btn-success">Back</a>
    </div>
  </body>
</html>