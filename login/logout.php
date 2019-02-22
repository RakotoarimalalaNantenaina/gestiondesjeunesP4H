<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PAGE DECONNECTION</title>
        <link rel="stylesheet" type="text/css" href="../vue/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div class="mode">
            <h3>Voulez-vous vraiment Déconnecter<br><br><span><?php echo $_SESSION['login_user'];?></span>??</h3>
            <div class="bouton">
                <form action="logout.php" method="post">
                    <a href="../index.php" class="btn btn-success" id="oui">Oui</a>
                    <a href="../vue/liste.php" class="btn btn-success" id="non">Non</a>
                </form>
            </div>
        </div>
    </body>
</html>