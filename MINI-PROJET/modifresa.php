<!-- 
    Fichier: modifresa.php
    Formulaire de création ou de modification de réservations.
 -->

<?php

    $submit_button = "Réserver";

    /**
     * Supprime la réservation d'identifiant $the_id.
     */
    function supprimer($the_id)
    {
        $fichier = fopen("database.txt", "r");
        while (!feof($fichier))
        {
            $line = fgets($fichier);
            $data[] = explode("|", $line);
        }
        fclose($fichier);
        
        $fichier = fopen("database.txt", "w");
        foreach ($data as $var)
        {
            if (empty($var))
            {
                continue;
            }

            if ($var[0] == $the_id)
            {
                continue;
            }
            fwrite($fichier, implode("|", $var));
        }
        fclose($fichier);
    }

    /* SUPPRESSION D'UNE RÉSERVATION AVEC 'Annuler' */
    if (isset($_GET["id"]) && isset($_GET["annuler"]) && $_GET["annuler"] == 1)
    {
        supprimer($_GET["id"]);
        header("Location: index.php?page=reservations.php");
    }

    /* EN CAS DE MODIFICATION D'UNE RÉSERVATION EXISTANTE: PRÉREMPLIR LES CHAMPS */
    $tab_data = array(
        "id" => "",
        "nom" => "",
        "taille" => "",
        "duree" => "",
        "arr" => "",
        "dep" => "",
    );

    if (isset($_GET["id"]))
    {
        $submit_button = "Modifier";

        $fichier = fopen("database.txt", "r");
        while (!feof($fichier))
        {
            $data = fgets($fichier);
            if (empty($data))
            {
                continue;
            }
            list($id, $nom, $taille, $duree, $arr, $dep) = explode("|", $data);

            if ($id == $_GET["id"])
            {
                $tab_data["id"] = $id;
                $tab_data["nom"] = $nom;
                $tab_data["taille"] = $taille;
                $tab_data["duree"] = $duree;
                $tab_data["arr"] = $arr;
                $tab_data["dep"] = $dep;
                break;
            }

        }
    }

    /* AJOUT/MODIFICATION D'UNE RÉSERVATION */
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Si cette condition est vraie, on modifie une réservation, alors pour éviter de la dupliquer on supprime l'ancienne.
        if (isset($_GET["id"]))
        {
            supprimer($_GET["id"]);
        }

        $nom = $_POST["nom"];
        $taille = $_POST["taille"];
        
        $date_arr = $_POST["date_arr"];
        $date_dep = $_POST["date_dep"];

        $t1 = new DateTime("$date_arr");
        $t2 = new DateTime("$date_dep");
        $duree = $t2->diff($t1)->format("%a") + 1;

        $id = hexdec(uniqid());

        $new = $id . "|" . $nom . "|" . $taille . "|" . $duree . "|" . $date_arr . "|" . $date_dep . "|" . "\n";

        $fichier = fopen("database.txt", "r");
        while (!feof($fichier))
        {
            $line = fgets($fichier);
            $data[] = explode("|", $line);
        }
        fclose($fichier);
        
        $fichier = fopen("database.txt", "w");
        $done = false;
        foreach ($data as $var)
        {
            print_r($var);
            if (empty($var))
            {
                continue;
            }

            if (isset($var[2]) && $var[2] >= $taille && !$done)
            {
                fwrite($fichier, $new);
                $done = true;
            }

            fwrite($fichier, implode("|", $var));
        }
        if (!$done)
        {
            fwrite($fichier, $new);
        }
        fclose($fichier);

        header("Location: index.php?page=reservations.php");
    }

?>

<!-- SCRIPT DE VÉRIFICATION -->
<script>

    /**
     * Vérifie les informations passées par l'utilisateur.
     */
    function verif()
    {
        let verif = true;

        // Vérification du nom
        let val_nom = document.getElementById("nom").value;
        if (val_nom === "" || val_nom.trim() === "") verif = false;

        // Vérification de la taille
        let elem_taille = document.querySelector('input[name="taille"]:checked');
        let val_taille = 0;
        if (elem_taille) val_taille = elem_taille.value;
        else verif = false;

        // Vérification des dates
        let val_date_arr = document.getElementById("date_arr").value;
        let val_date_dep = document.getElementById("date_dep").value;
        if (val_date_arr === "" || val_date_dep === "")
        {
            verif = false;
        }
        else
        {
            let arrivee = new Date(val_date_arr);
            let depart = new Date(val_date_dep);
            let today = new Date();
            if (arrivee < today || 
                depart < today || 
                depart < arrivee ||
                arrivee.getTime() === today.getTime() ||
                depart.getTime() === today.getTime())
            {
                verif = false;
            }

            let diff = Math.abs(depart - arrivee);
            let diff_days = Math.ceil(diff / (1000 * 60 * 60 * 24));
            if (diff_days >= 10)
            {
                verif = false;
            }
        }

        if (verif)
        {
            document.getElementById("formulaire").submit();
        }
        else
        {
            document.getElementById("erreur").hidden = false;
            scroll(0, 0);
        }
    }

</script>

<!-- FORMULAIRE -->
<div class="w3-margin w3-border w3-round-large">

    <form action="" method="POST" class="w3-margin" id="formulaire">

        <br>
        <h2 class="w3-center"><b><?php if ($tab_data["id"] == "") echo "Ajout"; else echo "Modifier"; ?> une réservation</b></h2>
        <br>

        <div id="erreur" class="w3-red w3-container w3-round-large w3-margin" hidden>
            <p><b>Veuillez compléter tous les champs correctement.</b></p>
            <p>Indication: La durée du séjour ne peut pas dépasser 10 jours.</p>
        </div>

        <!-- ID -->
        <div <?php if ($tab_data["id"] == "") echo "hidden"; ?>>
            <label for="id" style="font-size:20px;" class="w3-padding"><b>ID</b></label>
            <input type="text" id="id" name="id" value="<?php echo $tab_data["id"]; ?>" class="w3-input w3-border w3-round" disabled>
        </div>
        <br><br>

        <!-- NOM -->
        <div>
            <label for="nom" style="font-size:20px;" class="w3-padding"><b>Nom et Prénom</b></label>
            <input type="text" id="nom" name="nom" value="<?php echo $tab_data["nom"]; ?>" class="w3-input w3-border w3-round">
        </div>
        <br><br>

        <!-- TAILLE -->
        <fieldset>
            <legend style="font-size:20px;"><b>Taille de la chambre</b></legend>

            <div class="w3-padding">
                <input type="radio" id="taille1" name="taille" value="1" class="w3-radio" <?php if ($tab_data["taille"] == 1) echo "checked"; ?>>
                <label for="taille1">1 personne</label>
            </div>

            <div class="w3-padding">
                <input type="radio" id="taille2" name="taille" value="2" class="w3-radio" <?php if ($tab_data["taille"] == 2) echo "checked"; ?> >
                <label for="taille2">2 personnes</label>
            </div>

            <div class="w3-padding">
                <input type="radio" id="taille3" name="taille" value="3" class="w3-radio" <?php if ($tab_data["taille"] == 3) echo "checked"; ?> >
                <label for="taille3">3 personnes</label>
            </div>

            <div class="w3-padding">
                <input type="radio" id="taille4" name="taille" value="4" class="w3-radio" <?php if ($tab_data["taille"] == 4) echo "checked"; ?> >
                <label for="taille4">4 personnes</label>
            </div>
        </fieldset>
        <br><br>

        <!-- DATES -->
        <fieldset>
            <legend style="font-size:20px;"><b>Dates d'arrivée et de départ</b></legend>
            <br>

            <div>
                <label for="date_arr" class="w3-padding"><b>Arrivée</b></label>
                <input type="date" id="date_arr" name="date_arr" class="w3-input w3-border w3-round" value="<?php echo $tab_data["arr"]; ?>">
            </div>
            <br><br>

            <div>
                <label for="date_dep" class="w3-padding"><b>Départ</b></label>
                <input type="date" id="date_dep" name="date_dep" class="w3-input w3-border w3-round" value="<?php echo $tab_data["dep"]; ?>">
            </div>
        </fieldset>
        <br><br>

        <div class="w3-center">
            <a href="index.php?page=reservations.php" class="w3-button w3-theme-l2 w3-round w3-xlarge">Retour</a>
            <input type="button" value="<?php echo $submit_button ?>" class="w3-button w3-theme-l2 w3-round w3-xlarge" onclick="verif();">
        </div>

    </form>

</div>
