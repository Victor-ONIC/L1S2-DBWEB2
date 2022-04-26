<?php

    $error_age = false;
    $error_mdp = false;
    $error_mail = false;
    $genre = $_POST['Genre'];
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $age = $_POST['Age'];
    if ($age < 1 || $age > 139) {
        $error_age = true;
    }
    $profession = $_POST['Activite'];
    $hobbies = $_POST['Sport'];
    $transport = $_POST['Transport'];
    $commentaires = $_POST['Commentaires'];
    $annonce = "";
    switch ($genre) {
        case "Homme":
            $annonce = "Mr";
            break;
        case "Femme":
            $annonce = "Mme/mlle";
            break;
        default:
            $annonce = "";
            break;
    }
    $mdp1 = $_POST['PasswordA'];
    $mdp2 = $_POST['PasswordB'];
    if ($mdp1 !== $mdp2) {
        $error_mdp = true;
    }
    $email = $_POST['Email'];
    $re = "/^([a-z0-9]+)@alumni.univ-avignon.fr$/";
    if (!preg_match($re, $email)) {
        $error_mail = true;
    }

    if (!$error_age && !$error_mail && !$error_mdp) {
        echo "Bienvenue $annonce $LName $FName, votre âge est de $age ans et vous travaillez en tant que $profession. ";
        echo "Vous pratiquez ";
        foreach ($hobbies as $val) {
            echo $val . " ";
        }
        echo "et vous préférez vous déplacer en $transport. ";
        echo "Nous avons bien noté votre commentaire: $commentaires.";
    }
    else {
        if ($error_age) {
            echo "L'âge est invalide ! ";
        }
        if ($error_mdp) {
            echo "Les mots de passes doivent être identiques ! ";
        }
        if ($error_mail) {
            echo "L'adresse e-mail est invalide ! ";
        }
    }

?>
