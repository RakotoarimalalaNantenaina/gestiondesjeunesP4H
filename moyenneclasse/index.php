<html>
    <head>
        <meta charset="UTF-8">  
        <title>MOYENNE</title>
        <link rel="stylesheet" type="text/css" href="moyenne.css" />
    </head>
    <body>
        <div class:total>
            <h1>Calcul note des élèves</h1>
            <ul>
                <li>Notes/20</li>
                <li>coéfficients</li>
            </ul><br><br>
            <form method="POST" action="index.php" >
                Malagasy: <input type="text" name="notemlg" id="a">
                <input type="text" name="coefmlg" id="b"><br><br>
                Français: <input type="text" name="notefr" id="d">
                <input type="text" name="coeffr" id="b"><br><br>
                Anglais: <input type="text" name="noteang" id="e">
                <input type="text" name="coefang" id="b"><br><br>
                Mathématique: <input type="text" name="notemath" id="f">
                <input type="text" name="coefmath" id="b"><br><br>
                Géographie: <input type="text" name="notegeo" id="g">
                <input type="text" name="coefgeo" id="b"><br><br>
                Education civique: <input type="text" name="noteec" id="h">
                <input type="text" name="coefec" id="b"><br><br>
                Physique: <input type="text" name="noteph" id="i">
                <input type="text" name="coefph" id="b"><br><br>

                <input type="submit" name="moyenne" value="moyenne" id="c">
            </form> 
            <?php 
            if (isset($_POST['moyenne']));
            {
                /*note malagasy */
                $mlg=$_POST['notemlg'];
                $comlg=$_POST['coefmlg'];
                /*note francais */
                $fr=$_POST['notefr'];
                $cofr=$_POST['coeffr'];
                /*note anglais*/
                $ang=$_POST['noteang'];
                $coang=$_POST['coefang'];
                /*note mathematique*/
                $math=$_POST['notemath'];
                $comath=$_POST['coefmath'];
                /*note geographie*/
                $geo=$_POST['notegeo'];
                $cogeo=$_POST['coefgeo'];
                /*note education civique*/
                $ec=$_POST['noteec'];
                $coec=$_POST['coefec'];
                 /*note physique*/
                 $ph=$_POST['noteph'];
                 $coph=$_POST['coefph'];

                /* calcul total */
                $total = ($mlg * $comlg) + ($fr * $cofr)+($ang * $coang)+($math * $comath)+($geo * $cogeo) + ($ec * $coec) + ($ph * $coph);
                $coef = ($comlg + $cofr + $coang + $comath + $cogeo + $coec + $coph) * 20;
                echo "<h3>TOTAL= $total / $coef <br></h3>";

                /*calcul moyenne */
                $nombre_coef = $comlg + $cofr + $coang + $comath + $cogeo + $coec + $coph;

                $moyen = $total / $nombre_coef;
                echo " <h3>MOYENNE= $moyen / 20 </h3>";

            }
            ?>
        </div>
    </body> 
</html>