<!-- 
    Fichier: reservations.php
    Affiche une liste des réservations présentes dans la base de données.
 -->

<!-- ACTIONS: AJOUTER OU FILTRER -->
<!-- 
    Je pense qu'il est important de faire des cases à cocher parce que nous voudrons peut-être chercher les chambres
    avec par exemple soit 1 personne soit 4 personnes, et ce n'est pas faisable avec un 'select'.
 -->
<div class="w3-margin w3-padding w3-row">

    <div class="w3-col s7">
        <a href="index.php?page=modifresa.php" class="w3-button w3-theme-l2 w3-round w3-xlarge">Réserver</a>
    </div>

    <div class="w3-col s5 w3-padding">
        <span style="font-size:large" class="w3-margin-left"><u>Taille de la chambre:</u></span> <br>

        <input type="button" class="w3-button w3-round w3-border w3-padding-small w3-margin-right" id="decocher" value="Tout décocher" onclick="filtrer('none');">

        <input type="checkbox" class="w3-check filter-box" id="filter_t1" checked onclick="filtrer(1);">
        <label for="filter_t1">1</label>

        <input type="checkbox" class="w3-check filter-box" id="filter_t2" checked onclick="filtrer(2);">
        <label for="filter_t2">2</label>

        <input type="checkbox" class="w3-check filter-box" id="filter_t3" checked onclick="filtrer(3);">
        <label for="filter_t3">3</label>

        <input type="checkbox" class="w3-check filter-box" id="filter_t4" checked onclick="filtrer(4);">
        <label for="filter_t4">4</label>

        <input type="button" class="w3-button w3-round w3-border w3-padding-small w3-margin-left" id="cocher" value="Tout cocher" onclick="filtrer('all');">
        <br>
    </div>

</div>

<!-- LISTE DES RÉSERVATIONS -->
<?php

    if (isset($_GET["p"]))
    {
        $page = $_GET["p"];
    }
    else
    {
        header("Location: index.php?page=reservations.php&p=1");
    }

    $moyenne = array(
        1 => array("somme" => 0, "nombre" => 0),
        2 => array("somme" => 0, "nombre" => 0),
        3 => array("somme" => 0, "nombre" => 0),
        4 => array("somme" => 0, "nombre" => 0)
    );

    $fichier = fopen("database.txt", "r");
    while (!feof($fichier))
    {
        $data = fgets($fichier);
        if (empty($data))
        {
            continue;
        }

        list($id, $nom, $taille, $duree, $date_arr, $date_dep, $notes) = explode("|", $data);

        if ($taille > 1) $plu_pers = "s";
        else $plu_pers = "";

        if ($duree > 1) $plu_jours = "s";
        else $plu_jours = "";
        
        echo "
            <div class='w3-card-2 w3-round-large w3-padding w3-margin w3-white reservation t-$taille'>

                <h4>Chambre réservée par <b>$nom</b>.</h4>
                <p>Pour <b>$taille</b> personne$plu_pers.</p>
                <p>Durée: <b>$duree jour$plu_jours</b>, du $date_arr au $date_dep.</p>
            ";
        
        if ($notes != "") echo "\t<p>Notes: $notes</p>";

        echo "
                <a href='index.php?page=modifresa.php&id=$id' class='w3-button w3-theme-l2 w3-round'>Modifier</a>
                <a href='index.php?page=modifresa.php&id=$id&annuler=1' class='w3-button w3-theme-l2 w3-round'>Annuler</a>

            </div>
            <br>
        ";

        $moyenne[$taille]["somme"] += $duree;
        $moyenne[$taille]["nombre"] += 1;

    }
    fclose($fichier);

    $fichier = fopen("database.txt", "r");
    $nb_res = 0;
    while (!feof($fichier))
    {
        $tmp = fgets($fichier);
        $nb_res++;
    }
    fclose($fichier);
    $nb_res--;

    if ($nb_res <= 0)
    {
        echo "<br><p class='w3-margin'>Aucune réservation pour l'instant !</p>";
    }

    if ($nb_res != 0)
    {
        if ($moyenne[1]["nombre"] != 0) $moyenne_t1 = $moyenne[1]["somme"] / $moyenne[1]["nombre"];
        else $moyenne_t1 = 0;
        if ($moyenne[2]["nombre"] != 0) $moyenne_t2 = $moyenne[2]["somme"] / $moyenne[2]["nombre"];
        else $moyenne_t2 = 0;
        if ($moyenne[3]["nombre"] != 0) $moyenne_t3 = $moyenne[3]["somme"] / $moyenne[3]["nombre"];
        else $moyenne_t3 = 0;
        if ($moyenne[4]["nombre"] != 0) $moyenne_t4 = $moyenne[4]["somme"] / $moyenne[4]["nombre"];
        else $moyenne_t4 = 0;

        echo "
            <br>
            <h3 class='w3-padding'><u>Récapitulatif</u></h3>
            <table class='w3-padding w3-table-all'>
                <tr>
                    <th>Taille de la chambre</th>
                    <th>Durée moyenne</th>
                </tr>
            
                <tr id='row1' onmouseover='this.style.color=\"red\";' onmouseout='this.style.color=\"black\";'>
                    <td style='font-size:16px'>1</td>
                    <td style='font-size:16px'>$moyenne_t1 jours</td>
                </tr>

                <tr id='row2' onmouseover='this.style.color=\"red\";' onmouseout='this.style.color=\"black\";'>
                    <td style='font-size:16px'>2</td>
                    <td style='font-size:16px'>$moyenne_t2 jours</td>
                </tr>

                <tr id='row3' onmouseover='this.style.color=\"red\";' onmouseout='this.style.color=\"black\";'>
                    <td style='font-size:16px'>3</td>
                    <td style='font-size:16px'>$moyenne_t3 jours</td>
                </tr>

                <tr id='row4' onmouseover='this.style.color=\"red\";' onmouseout='this.style.color=\"black\";'>
                    <td style='font-size:16px'>4</td>
                    <td style='font-size:16px'>$moyenne_t4 jours</td>
                </tr>
            </table>
            <br><br>
        ";
    }

?>

<!-- SCRIPT DU FILTRE -->
<script>

    window.onload = filtrer("all");

    function filtrer(nombre)
    {
        if (nombre === "all") {
            let reservations = document.querySelectorAll("div.reservation");
            reservations.forEach(function(elem) {
                elem.hidden = false;
            });

            let cases = document.querySelectorAll(".filter-box");
            cases.forEach(function(elem) {
                elem.checked = true;
            });
        }
        else if (nombre === "none") {
            let reservations = document.querySelectorAll("div.reservation");
            reservations.forEach(function(elem) {
                elem.hidden = true;
            });

            let cases = document.querySelectorAll(".filter-box");
            cases.forEach(function(elem) {
                elem.checked = false;
            });
        }
        else {
            let search_for = `div.t-${nombre}`;
            let reservations = document.querySelectorAll(search_for);
            reservations.forEach(function(elem) {
                let state = elem.hidden;
                elem.hidden = !state;
            });
        }
    }

</script>

<!-- 
    Suite au message de M. LEFEVRE, j'ai retiré la partie regroupement en pages de 3-4 réservations car je bloquais dessus.
    Elle m'empêchait de faire le filtre correctement, maintenant tout fonctionne.
 -->
