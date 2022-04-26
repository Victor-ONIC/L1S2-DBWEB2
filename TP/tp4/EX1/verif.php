<?php
    $genre = $_POST['Genre'];
    $FName = $_POST['FName'];
    $LName = $_POST['LName'];
    $age = $_POST['Age'];
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
    
    echo "Bienvenue $annonce $LName $FName, votre age est de $age ans et vous travaillez en tant que $profession. ";
    echo "Vous pratiquez ";
    foreach ($hobbies as $val) {
        echo $val . " ";
    }
    echo "et vous préférez vous déplacer en $transport. ";
    echo "Nous avons bien noté votre commentaire: $commentaires.";

?>