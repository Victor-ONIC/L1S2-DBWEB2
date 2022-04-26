<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Partie 2</title>
</head>
<body>

    <h1>TP3 Partie 2: Premiers codes PHP</h1>

    <?php

        // Afficher le produit
        $i = 10;
        $j = 30;
        $produit = $i * $j;
        echo "\t<p>The result of $i * $j is $produit.</p>\n";
        $k = $i;
        $i = $j;
        $j = $k;
        $produit = $i * $j;
        echo "\t<p>The result of $i * $j is $produit.</p>\n";

        // Afficher la concaténation
        $a = 1;
        $b = 2;
        $c = 3;
        $A = $a + $b;
        $B = $c - $a;
        $C = $b * $b;
        $conc = $A.$B.$C;
        echo "\t<p>$conc</p>\n";

        // Afficher la date d'avant hier
        echo "\t<p>The day before yesterday was: " . date("l j F Y", strtotime("-2 days")) . "</p>\n";   
        
        // Afficher un texte selon les secondes
        $secondes = date("s");
        if ($secondes < 20) {
            $style = "style=\"color:red\"";
        }
        else if ($secondes < 40 && $secondes >= 20) {
            $style = "style=\"color:green\"";
        }
        else if ($secondes >= 40) {
            $style = "style=\"color:blue\"";
        }
        echo "\t<p $style>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum, odit.</p>\n";

        // Afficher trente-six fois un texte qui change de couleur toutes les neuf fois
        for ($i = 0; $i < 36; $i++) {
            if ($i % 9 == 0) {
                $c1 = rand(0, 255);
                $c2 = rand(0, 255);
                $c3 = rand(0, 255);
                $style = "style=\"color:rgb($c1, $c2, $c3)\"";
            }
            echo "\t<p $style>Lorem ipsum dolor sit amet.</p>\n";
        }

    ?>

</body>
</html>
