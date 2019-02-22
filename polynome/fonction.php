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
            if ($valid = false) {
                header("Location: index.php"); 
            }
            if ($valid) {
                $delta = ($b * $b) - (4*$a*$c);
            echo "<h2>delta = $delta<h2>";

            $racinedelta = sqrt($delta);
            echo "racine de delta = $racinedelta<br>";

            if ($delta==0)
            {
                $x = (-$b) / (2*$a);
                echo "x1=x2 = $x";
            }
            elseif ($delta < 0) {
                echo "S={vide}";
            } 
            else
                {
                    $x1 = ((-$b - $racinedelta) / (2 * $a));
                    $x2 = ((-$b + $racinedelta) / (2 * $a));

                    echo "x1=$x1 <br>";
                    echo "x2=$x2 <br>";

                } 
            }
         }
}
?>