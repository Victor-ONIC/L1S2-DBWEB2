<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-purple.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>Questionnaire</title>
</head>
<body class="w3-light-gray">

    <script>

        function Soumettre() {
            if (VerifTextes()) {
                document.getElementById("form").submit();
            }
        }

        function VerifTextes() {
            let wrong = false;

            let Age = document.getElementById("Age").value;
            let Profession = document.getElementById("Profession").value;
            let Alias = document.getElementById("Alias").value;
            let Nb_enfants = document.getElementById("Enfants").value;

            if (Age == "" || Profession == "" || Alias == "" || Nb_enfants == "" || age < 1 || age > 12) {
                let div = document.getElementById("error");
                div.innerHTML += "Attention éléments manquants:";
                let wrong = true;
            }

            if (Age == "" || age < 1 || age > 12) {
                div.innerHTML += " l'age (entre 1 et 120 ans) ";
            }
            if (Profession == "") {
                div.innerHTML += " la profession ";
            } 
            if (Alias == "") {
                div.innerHTML += " l'alias ";
            }
            if (Nb_enfants == "") {
                div.innerHTML += " le nombre d'enfants ";
            }

            if (wrong) {
                return true;
            }
            else {
                return false;
            }
        }

        function Selection() {

        }

    </script>
    
    <div class="w3-container w3-theme w3-margin">
            <h2 class="w3-center w3-text-yellow">Enquête sociale - Questionnaire personnel</h2>
            <p class="w3-center w3-text-yellow">Afin d'améliorer les prestations sociales que nous fournissons, merci à vous de bien vouloir remplir le formulaire anonyme ci-dessous.</p>
    </div>

    <div class="w3-container">

        <div id="erreur" class="w3-theme w3-padding-small w3-red" hidden> </div>

        <form action="./index.html" method="POST" id="form">
            <div class="w3-row">
                <div class="w3-col s6">
                    <input id="Alias" class="w3-input w3-border w3-round" type="text" placeholder="Alias" name="Alias" onmouseover="this.style.color = 'red'" onmouseout="this.style.color = ''"> <br>
    
                    <input id="Profession" class="w3-input w3-border w3-round" type="text" placeholder="Profession" name="Profession" onmouseover="this.style.color = 'red'" onmouseout="this.style.color = ''"> <br>
        
                    <input class="w3-input w3-border w3-round" type="text" placeholder="Entreprise" name="Entreprise"> <br>
                </div>
                <div class="w3-col s6">
                    <input id="Age" class="w3-input w3-border w3-round" type="text" placeholder="Age" name="Age" onmouseover="this.style.color = 'red'" onmouseout="this.style.color = ''"> <br>
    
                    <input class="w3-input w3-border w3-round" type="text" placeholder="Ville de résidence" name="Ville de résidence"> <br>
        
                    <input id="Enfants" class="w3-input w3-border w3-round" type="text" placeholder="Nombre d'enfants" name="Nombre d'enfants" onmouseover="this.style.color = 'red'" onmouseout="this.style.color = ''"> <br>
                </div>
            </div>

            <br>
            <div class="w3-theme w3-padding-small">
                <p class="w3-text-yellow">Votre niveau de satisfaction ?</p>
            </div>
            <br>

            <fieldset class="w3-border-0">
                <p class="w3-text-teal"> Pensez-vous changer d'emploi ?</p>

                <label for="jamais" class="w3-text-teal">Jamais</label>
                <input type="radio" id="jamais" name="jamais">

                <label for="apriori" class="w3-text-teal">Non à priori</label>
                <input type="radio" id="apriori" name="apriori">

                <label for="ouipossible" class="w3-text-teal">Oui possible</label>
                <input type="radio" id="ouipossible" name="ouipossible">

                <label for="ouisur" class="w3-text-teal">Oui c'est sur</label>
                <input type="radio" id="ouisur" name="ouisur">

            </fieldset>

            <fieldset class="w3-border-0">
                <p class="w3-text-teal">Combien d'étoiles mettez-vous à l'école de vos enfants ?</p>

                <label for="1" class="w3-text-teal">1</label>
                <input type="radio" id="1" name="1">

                <label for="2" class="w3-text-teal">2</label>
                <input type="radio" id="2" name="2">

                <label for="3" class="w3-text-teal">3</label>
                <input type="radio" id="3" name="3">

            </fieldset>

            <br>
            <div class="w3-theme w3-padding-small">
                <p class="w3-text-yellow">Quels sont les 2 critères de choix de votre lieu de résidence ?</p>
            </div>
            <br>

            <fieldset class="w3-border-0">
                <div class="w3-row">
                    <div class="w3-col s6">
                        <input type="checkbox" id="prox_ecole" name="prox_ecole">
                        <label for="prox_ecole" class="w3-text-teal">Proximité école</label>
                        <br><br>
        
                        <input type="checkbox" id="prox_emploi" name="prox_emploi">
                        <label for="prox_emploi" class="w3-text-teal">Proximité emploi</label>
                        <br><br>
        
                        <input type="checkbox" id="depaysment" name="depaysment">
                        <label for="depaysment" class="w3-text-teal">Dépaysment (campagne...)</label>
                    </div>
                    <div class="w3-col s6">
                        <input type="checkbox" id="cout_logement" name="cout_logement">
                        <label for="cout_logement" class="w3-text-teal">Coût du logement</label>
                        <br><br>
                        
                        <input type="checkbox" id="infra_sport" name="infra_sport">
                        <label for="infra_sport" class="w3-text-teal">Infrastructures sportives et culturelles</label> 
                        <br><br>
        
                        <input type="checkbox" id="prox_familliale" name="prox_familliale">
                        <label for="prox_familliale" class="w3-text-teal">Proximité familiale</label>
                    </div>
                </div>

            </fieldset>

            <br>
            <div class="w3-theme w3-padding-small">
                <p class="w3-text-yellow">Sélectionnez vos deux périodes de vacances préférées dans l'année.</p>
            </div>
            <br>

            <div class="w3-row">
                <div class="w3-col s4 w3-center">
                    <select name="sel_vac" size="7">
        
                        <option value="Sel" disabled>Sélectionnez les éléments par ordre</option>
                        <option value="Février">Février</option>
                        <option value="Pâques">Pâques</option>
                        <option value="Été">Été</option>
                        <option value="Toussaint">Toussaint</option>
                        <option value="Noël">Noël</option>
                        <option value="placeholder"></option>
        
                    </select>
                </div>
                <div class="w3-col s4 w3-center">
                    <input type="button" class="w3-text-teal w3-border-0" value="> > Sélectionner > >">
                </div>
                <div class="w3-col s4 w3-center">
                    <select name="sel_done" size="7">

                        <option value="Sel_2" disabled>Sélectionnez les éléments par ordre à gauche</option>

                    </select>
                </div>
            </div>

            <br><br>
            <textarea id="O" name="Commentaires" cols="20" rows="3" placeholder="Commentaire libre"></textarea>
            <br><br>

            <input type="button" class="w3-button w3-block w3-theme" value="Soumettre" onclick="Soumettre()">
            <br><br><br>
            
            

        </form>
    </div>

    <?php
        if (isset($_POST)) {
            $age = $_POST['Age'];
            $profession = $_POST['Profession'];
            $alias = $_POST['Alias'];
            $enfant = $_POST['Nb_enfants'];

            $array = array(
                "Age" => $age,
                "Profession" => $profession,
                "Alias" => $alias,
                "Nombre d'enfants" => $enfant
            );
        }
    ?>

    <table class="w3-table">
        <tr>
            <?php 
                foreach ($array as $key => $value) {
                    echo "<th>$key</th>\n";
                }
            ?>
        </tr>
        <tr>
            <?php 
                foreach ($array as $key => $value) {
                    echo "<td>$value</td>\n";
                }
            ?>
        </tr>
    </table>

</body>
</html>