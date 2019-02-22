<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>FONCTION</title>
        <link rel="stylesheet" type="text/css" media="screen" href="fonction.css" />
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="total">
            <div class="container">
            <div class="row">
                <h1>FONCTION POLYNOME DU SECOND DEGREE</h1><br>
                <h3 id="tete">Résolution de l'equation du Second Degrée</h3>
                <h3 id="entete">F(x) =  <span>a</span> x <sup>2</sup> + <span>b</span> x + <span>c</span>
                </h3>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div>
                    <form action="index.php" method="POST">
                    <span>a :</span> <input type="text" name="a" id="a" placeholder="indice a">
                    <br><br>
                    <span> b :</span> <input type="text" name="b" id="a" placeholder="indice b">
                    <br><br>
                    <span> c :</span> <input type="text" name="c" id="a" placeholder="indice c">
                    <br><br>
                    <input  class="btn btn-success" type="submit" name="calcul" value="solution" id="b">
                    <br><br>
                    </form>
                    </div>
                        <?php 
                        if (isset($_POST['calcul'])) {
                                if (!empty($_POST)) {
                                    $a = null;
                                    $b = null;
                                    $c = null;
                                
                                    $a = $_POST['a'];
                                    $b = $_POST['b'];
                                    $c = $_POST['c'];

                                    $valid = true;
                                    if (empty($a)) {
                                        $aerror = "Veuillez inserer une valeur a";
                                        $valid = false;
                                    }
                                    if (empty($b)) {
                                        $berror = "Veuillez inserer une valeur b ";
                                        $valid = false;
                                    }
                                    if (empty($c)) {
                                        $cerror = "Veuillez inserer une valeur c";
                                        $valid = false;
                                    }
                                    
                                    if ($valid) {
                                        $delta = ($b * $b) - (4*$a*$c);
                                    echo "<h2>delta = $delta<h2>";

                                    $racinedelta = sqrt($delta);

                                    if ($delta==0)
                                    {
                                        $x = (-$b) / (2*$a);
                                        echo "racine de delta = $racinedelta <br>";
                                         echo "x1=x2 = $x";
                                    }
                                    elseif ($delta < 0) {
                                        echo "racine de delta = impossible<br>";
                                        echo "S={vide}";
                                    } 
                                    else
                                        {
                                            echo "racine de delta = $racinedelta<br>";
                                            $x1 = ((-$b - $racinedelta) / (2 * $a));
                                            $x2 = ((-$b + $racinedelta) / (2 * $a));

                                            echo "x1=$x1 <br>";
                                            echo "x2=$x2 <br>";

                                        } 
                                    }
                                 }
                        }
                        ?>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
        </div>
        <script>
            

        </script>
    </body>    
</html>
