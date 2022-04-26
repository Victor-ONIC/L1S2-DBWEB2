<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Partie 3</title>
</head>
<body>

    <h1>TP3 Partie 3: Tableaux PHP</h1>

    <?php

        // Tableaux prénom, nom, pseudo
        $tab1[0] = "V";
        $tab1[1] = "i";
        $tab1[2] = "c";
        $tab1[3] = "t";
        $tab1[4] = "o";
        $tab1[5] = "r";

        $tab2[] = "O";
        $tab2[] = "N";
        $tab2[] = "I";
        $tab2[] = "C";

        $tab3 = array("v", "i", "c", "t", "o", "r");

        echo "\t<p>Tableau 1 Prénom: \n";
        print_r($tab1);
        echo "\t</p>\n";

        echo "\t<p>Tableau 2 Nom: \n";
        print_r($tab2);
        echo "\t</p>\n";

        echo "\t<p>Tableau 3 Pseudo: \n";
        print_r($tab3);
        echo "\t</p>\n";

        // Tableau de sites favoris
        $sites = array (
            "Youtube" => "https://www.youtube.com/",
            "Stackoverflow" => "https://stackoverflow.com/",
            "Twitch" => "https://www.twitch.tv/",
            "Univ-Avignon" => "https://univ-avignon.fr/"
        );

        echo "\t<p>Tableau sites: \n";
        print_r($sites);
        echo "\t</p>\n";

        // Parcours des tableaux simples
        echo "\t<p>";
        foreach($tab1 as $i => $v) {
            if ($i == 0) {
                echo $v;
            }
            else {
                echo "-" . $v;
            }
        }
        echo "_";
        foreach($tab2 as $i => $v) {
            if ($i == 0) {
                echo $v;
            }
            else {
                echo "-" . $v;
            }
        }
        echo "_";
        foreach($tab3 as $i => $v) {
            if ($i == 0) {
                echo $v;
            }
            else {
                echo "-" . $v;
            }
        }
        echo "</p>"

    ?>

    <?php

        $tab = array(
            "Parkour" => "https://www.parkour4all.com",
            "Football" => "https://www.fifa.com",
            "Musculation" => "https://www.keepcool.fr/",
            "Echecs" => "https://www.chess.com/"
        );
        ksort($tab);

        $html_debut = "<!DOCTYPE html>\n<html lang='fr'>\n<head>\n\t<meta charset='UTF-8'>\n\t<title>Tableau des sports</title>\n</head>\n<body>\n\t<h1>Liens vers les sites de références de ces sports</h1>\n";
        
        $file = "tableaux_sports.html";
        $pointeur = fopen($file, 'w');
        fwrite($pointeur, $html_debut);
        foreach($tab as $key => $value) {
            $lien = "<a href='$value'>$key</a><br>\n";
            fwrite($pointeur, $lien);
        }
        $html_fin = "</body>\n<html>";
        fwrite($pointeur, $html_fin);
        fclose($pointeur);

    ?>

    <a href="./tableau_sport.php">Tableau des sports</a>
    
</body>
</html>
