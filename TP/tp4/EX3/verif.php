<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">

    <title>Formulaire</title>
</head>

<body>

    <?php

        $verif = array(
            "erreur" => array(
                "err_age" => "",
                "err_mdp" => "",
                "err_email" => ""
            ),
            "label_color" => array(
                "FName" => "w3-text-theme",
                "LName" => "w3-text-theme",
                "Age" => "w3-text-theme",
                "Email" => "w3-text-theme",
                "PasswordA" => "w3-text-theme",
                "PasswordB" => "w3-text-theme",
                "Genre" => "w3-text-theme",
                "Sport" => "w3-text-theme",
                "Activite" => "w3-text-theme",
                "Transport" => "w3-text-theme",
            ),
            "done" => true
        );

        $data = array(
            "FName" => "",
            "LName" => "",
            "Age" => "",
            "Email" => "",
            "Genre" => array(
                "Homme" => "",
                "Femme" => "",
                "Autre" => ""
            ),
            "Sport" => array(
                "Football" => "",
                "Equitation" => "",
                "Basketball" => "",
                "Natation" => "",
                "Velo" => "",
                "Autre" => ""
            ),
            "Activite" => array(
                "Salarie" => "",
                "Auto" => "",
                "Etudiant" => "selected",
                "Autre" => ""
            ),
            "Trnasport" => "",
            "Commentaires" => ""
        );



        // isset() pour ne pas avoir d'erreur lors du premier chargement du formulaire.
        // if ($var == '') pour voir si l'utilisateur a bien rempli ce champ, sinon, le mettre en rouge.

        // PRÉNOM
        if (isset($_POST['FName'])) {
            $FName = $_POST['FName'];
            if ($FName == '') {
                $verif["label_color"]["FName"] = "w3-text-red";
                $verif["done"] = false;
            }
            $data["FName"] = "$FName";
        }

        // NOM
        if (isset($_POST['LName'])) {
            $LName = $_POST['LName'];
            if ($LName == '') {
                $verif["label_color"]["LName"] = "w3-text-red";
                $verif["done"] = false;
            }
            $data["LName"] = "$LName";
        }

        // ÂGE
        if (isset($_POST['Age'])) {
            $age = $_POST['Age'];
            if ($age < 1 || $age > 139) {
                $verif["erreur"]["err_age"] = "L'âge est invalide ! <br>";
                $verif["label_color"]["Age"] = "w3-text-red";
                $verif["done"] = false;
            }
            $data["Age"] = "$age";
        }

        // Email
        if (isset($_POST['Email'])) {
            $email = $_POST['Email'];
            $re = "/^([a-z0-9]+)@alumni\.univ-avignon\.fr$/";
            if (!preg_match($re, $email)) {
                $verif["erreur"]["err_email"] = "L'adresse e-mail est invalide ! (xx@alumni.univ-avignon.fr) <br>";
                $verif["label_color"]["Email"] = "w3-text-red";
                $verif["done"] = false;
            }
            $data["Email"] = "$email";
        }

        // MOTS DE PASSE
        if (isset($_POST['PasswordA']) && isset($_POST['PasswordB'])) {
            $mdp1 = $_POST['PasswordA'];
            $mdp2 = $_POST['PasswordB'];
            if ($mdp1 !== $mdp2 || $mdp1 == '' || $mdp2 == '') {
                $verif["erreur"]["err_mdp"] = "Les mots de passes doivent être remplis et identiques ! <br>";
                $verif["label_color"]["PasswordA"] = "w3-text-red";
                $verif["label_color"]["PasswordB"] = "w3-text-red";
                $verif["done"] = false;
            }
            // On ne stocke pas les mots de passes. L'utilisateur doit les retaper
        }

        // GENRE
        if (isset($_POST['Genre'])) {
            $genre = $_POST['Genre'];
            $annonce = "";
            switch ($genre) {
                case "Homme":
                    $annonce = "Mr";
                    $data["Genre"]["Homme"] = "checked";
                    break;
                case "Femme":
                    $annonce = "Mme/mlle";
                    $data["Genre"]["Femme"] = "checked";
                    break;
                case "G_Autre":
                    $data["Genre"]["Autre"] = "checked";
                    break;
            }
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // si la partie genre n'a pas été cochée, mais que le formulaire a tout de même été envoyé, on le met en rouge
            $verif["label_color"]["Genre"] = "w3-text-red";
            $verif["done"] = false;
        }

        // SPORT
        if (isset($_POST['Sport'])) {
            $hobbies = $_POST['Sport'];
            if ($hobbies == '') {
                $verif["label_color"]["Sport"] = "w3-text-red";
                $verif["done"] = false;
            }

            foreach ($hobbies as $val) {
                switch ($val)  {
                    case "Football":
                        $data["Sport"]["Football"] = "checked";
                        break;
                    case "Equitation":
                        $data["Sport"]["Equitation"] = "checked";
                        break;
                    case "Basketball":
                        $data["Sport"]["Basketball"] = "checked";
                        break;
                    case "Natation":
                        $data["Sport"]["Natation"] = "checked";
                        break;
                    case "Velo":
                        $data["Sport"]["Velo"] = "checked";
                        break;
                    case "S_Autre":
                        $data["Sport"]["S_Autre"] = "checked";
                        break;
                }
            }
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // si la partie sport n'a pas été cochée, mais que le formulaire a tout de même été envoyé, on le met en rouge
            $verif["label_color"]["Sport"] = "w3-text-red";
            $verif["done"] = false;
        }

        // ACTIVITÉ
        if (isset($_POST['Activite'])) {
            $profession = $_POST['Activite'];

            // on prend les éléments de $data["Activite"] par référence car veut les modifier
            foreach($data["Activite"] as &$val) {
                $val = "";
            }
            switch($profession) {
                case "Salarie":
                    $data["Activite"]["Salarie"] = "selected";
                    break;
                case "Autoentrepreneur":
                    $data["Activite"]["Auto"] = "selected";
                    break;
                case "Etudiant":
                    $data["Activite"]["Etudiant"] = "selected";
                    break;
                case "ACT_Autre":
                    $data["Activite"]["Autre"] = "selected";
                    break;
            }
        }

        // TRANSPORT
        if (isset($_POST['Transport'])) {
            $transport = $_POST['Transport'];
        }
        else if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // si la partie transport n'a pas été cochée, mais que le formulaire a tout de même été envoyé, on le met en rouge
            $verif["label_color"]["Transport"] = "w3-text-red";
            $verif["done"] = false;
        }
        

        // COMMENTAIRES
        if (isset($_POST['Commentaires'])) {
            // Pas la peine de vérifier si ce champ est vide, il est optionnel
            $commentaires = $_POST['Commentaires'];
            $data["Commentaires"] = $commentaires;
        }

    ?>
    
    <div class="w3-container w3-theme">
        <h1>Bienvenue dans la formation Informatique</h1>
    </div>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && $verif["done"]) {
            echo "<div class='w3-padding-small w3-margin w3-green w3-round-xlarge w3-center'>";
            echo "\t<p>Bienvenue $annonce $LName $FName, votre âge est de $age ans et vous travaillez en tant que $profession. ";
            echo "Vous pratiquez ";
            foreach ($hobbies as $val) {
                echo $val . ", ";
            }
            echo "et vous préférez vous déplacer en $transport. ";
            if (!($commentaires == '')) {
                echo "Nous avons bien noté votre commentaire: '$commentaires'.";
            }
            echo "</p>\n";
            echo "</div>";
        }
        else if (!$verif["done"]) {
            echo "<div class='w3-padding-small w3-margin w3-red w3-round-xlarge'>\n";
            echo "\t<h3>Attention !</h3>\n";
            echo "\t<p>Les champs en rouge n'ont pas été complétés correctement.</p>\n";
            echo $verif["erreur"]["err_age"] . $verif["erreur"]["err_mdp"] . $verif["erreur"]["err_email"] . "<br>";
            echo "</div>\n";
        }

    ?>

    <div class="w3-col" style="width:5%"><pre>&#9;</pre></div>

    <div class="w3-col" style="width:90%">
        <div class="w3-card-4 w3-margin w3-row">

            <header class="w3-container w3-theme">
                <h2>Formulaire de contact</h2>
            </header>
            
            <div class="w3-padding">
                <form action="./verif.php" method="POST">
                    <br>
                    
                    <label for="P" class="w3-label <?php echo $verif["label_color"]["FName"] ?>">Prénom</label>
                    <input type="text" id="P" name="FName" class="w3-input w3-border w3-round" value=<?php echo $data["FName"] ?> >
                    <br>
                    
                    <label for="N" class="w3-label <?php echo $verif["label_color"]["LName"] ?>">Nom</label>
                    <input type="text" id="N" name="LName" class="w3-input w3-border w3-round" value=<?php echo $data["LName"] ?> > 
                    <br>
                    
                    <label for="A" class="w3-label <?php echo $verif["label_color"]["Age"] ?>">Âge</label>
                    <input type="text" id="A" name="Age" class="w3-input w3-border w3-round" value=<?php echo $data["Age"] ?> > 
                    <br>
                    
                    <label for="E" class="w3-label <?php echo $verif["label_color"]["Email"] ?>">E-mail</label>
                    <input type="text" id="E" name="Email" class="w3-input w3-border w3-round" placeholder="nom.prenom@univ-avignon.fr" value=<?php echo $data["Email"] ?> > 
                    <br>
                    
                    <label for="MDPa" class="w3-label <?php echo $verif["label_color"]["PasswordA"] ?>">Mot de passe</label>
                    <input type="password" id="MDPa" name="PasswordA" class="w3-input w3-border w3-round"> 
                    <br>
                    
                    <label for="MDPb" class="w3-label <?php echo $verif["label_color"]["PasswordB"] ?>">Retapez votre mot de passe</label>
                    <input type="password" id="MDPb" name="PasswordB" class="w3-input w3-border w3-round"> 
                    <br>
                    
                    <fieldset class="w3-border-0">
                        <legend class="<?php echo $verif["label_color"]["Genre"] ?>">Genre</legend>

                        <input type="radio" id="G_h" name="Genre" value="Homme" class="w3-radio" <?php echo $data["Genre"]["Homme"] ?> >
                        <label for="G_h">Homme</label>
                        <p></p>

                        <input type="radio" id="G_f" name="Genre" value="Femme" class="w3-radio" <?php echo $data["Genre"]["Femme"] ?> >
                        <label for="G_f">Femme</label>
                        <p></p>

                        <input type="radio" id="G_x" name="Genre" value="G_Autre" class="w3-radio" <?php echo $data["Genre"]["Autre"] ?> >
                        <label for="G_x">Autre</label>

                    </fieldset>
                    <br>
                    
                    <fieldset class="w3-border-0">
                        <legend class="<?php echo $verif["label_color"]["Sport"] ?>">Sports pratiqués régulièrement</legend>
                        
                        <input type="checkbox" id="S_f" name="Sport[]" value="Football" class="w3-check" <?php echo $data["Sport"]["Football"] ?> >
                        <label for="S_f">Football</label>
                        <p></p>

                        <input type="checkbox" id="S_e" name="Sport[]" value="Equitation" class="w3-check" <?php echo $data["Sport"]["Equitation"] ?> >
                        <label for="S_e">Équitation</label>
                        <p></p>

                        <input type="checkbox" id="S_b" name="Sport[]" value="Basketball" class="w3-check" <?php echo $data["Sport"]["Basketball"] ?> >
                        <label for="S_b">Basketball</label>
                        <p></p>

                        <input type="checkbox" id="S_n" name="Sport[]" value="Natation" class="w3-check" <?php echo $data["Sport"]["Natation"] ?> >
                        <label for="S_n">Natation</label>
                        <p></p>

                        <input type="checkbox" id="S_v" name="Sport[]" value="Velo" class="w3-check" <?php echo $data["Sport"]["Velo"] ?> >
                        <label for="S_v">Vélo</label>
                        <p></p>

                        <input type="checkbox" id="S_x" name="Sport[]" value="S_Autre" class="w3-check" <?php echo $data["Sport"]["Autre"] ?> >
                        <label for="S_x">Autre</label>

                    </fieldset>
                    <br>
                    
                    <label for="ACT" class="w3-label <?php echo $verif["label_color"]["Activite"] ?>">Activité principale</label>
                    <select id="ACT" name="Activite" size="1" class="w3-select w3-border">
                        <option value="Salarie" <?php echo $data["Activite"]["Salarie"] ?> >Salarié.e</option>
                        <option value="Autoentrepreneur" <?php echo $data["Activite"]["Auto"] ?> >Auto-entrepreneur.se</option>
                        <option value="Etudiant" <?php echo $data["Activite"]["Etudiant"] ?> >Étudiant.e</option>
                        <option value="ACT_Autre" <?php echo $data["Activite"]["Autre"] ?> >Autre</option>
                    </select>
                    <br><br>
                    
                    <label for="T" class="w3-label <?php echo $verif["label_color"]["Transport"] ?>">Transport pour se rendre au stage</label>
                    <select id="T" name="Transport" size="5" class="w3-select w3-border">
                        <option value="Voiture">Voiture</option>
                        <option value="Trottinette">Trottinette</option>
                        <option value="Velo">Vélo</option>
                        <option value="Bus">Bus</option>
                        <option value="T_Autre">Autre</option>
                    </select>
                    <br><br>
                    
                    <label for="O" class="w3-label w3-text-theme">Autres informations</label><br>
                    <textarea id="O" name="Commentaires" cols="20" rows="3" value=<?php echo $data["Commentaires"] ?>></textarea>
                    <br><br>
                    
                    <br>
                    <input type="submit" value="Soumettre" class="w3-button w3-theme">
                    <input type="reset" value="Recommencer" class="w3-button w3-theme">
                    <br><br>
                </form>
            </div>
        </div>
    </div>

    <div class="w3-col" style="width:5%"><pre>&#9;</pre></div>

</body>
</html>
