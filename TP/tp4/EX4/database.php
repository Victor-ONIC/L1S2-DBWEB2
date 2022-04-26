<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">

    <title>EX4</title>
</head>
<body>
    
    <?php

        $db = fopen("cours.txt", "r");
        echo "<div class='w3-container w3-margin'>\n";
        echo "\t<table class='w3-table w3-border w3-bordered w3-centered'>\n";
        echo "\t\t<tr><th>Prénom</th><th>Nom</th><th>Cours</th><th>Niveau</th><th>Semestre</th><th>Nombre d'heures</th>\n";

        while (!feof($db)) {

            $data = fgets($db);
            if ($data == '') continue;
            echo "\t\t<tr><td>" . str_replace("|", "</td><td>", "$data") . "</td></tr>\n";

            $tableau_individuel = explode("|", $data);
            $noms[] = $tableau_individuel[0] . ' ' . $tableau_individuel[1];

            $tableau[end($noms)] = $data;
        }

        echo "\t</table>\n";
        echo "\t</div>\n";
        fclose($db);

    ?>

    <br><br><br>

    <div class="w3-container w3-margin w3-padding-small">
        <form action="" method="POST" name="myform">
    
            <label for="select">Sélectionner</label> <br>
            <select name="select" id="select" class="w3-select w3-border" size="3">
            
                <?php
                    foreach($noms as $val) {
                        echo "<option value='$tableau[$val]' onclick='document.myform.submit()'>$val</option>";
                    }
                ?>

            </select>
    
        </form>
    </div>
    
    <div class="w3-container w3-margin w3-padding-small">
        <h6>
        <?php
            if (isset($_POST['select'])) {
                $choix = $_POST['select'];
                echo "<div class='w3-container w3-margin'>\n";
                echo "\t<table class='w3-table w3-border w3-bordered w3-centered'>\n";
                echo "\t\t<tr><th>Prénom</th><th>Nom</th><th>Cours</th><th>Niveau</th><th>Semestre</th><th>Nombre d'heures</th>\n";
                echo "\t\t<tr><td>" . str_replace("|", "</td><td>", "$choix") . "</td></tr>\n";
                echo "\t</table>\n";
                echo "\t</div>\n";

            }
        ?>
        </h6>
    </div>

</body>
</html>
