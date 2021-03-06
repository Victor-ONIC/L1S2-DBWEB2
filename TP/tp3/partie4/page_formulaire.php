
    <div class=w3-row>
        <div class="w3-col s1"><pre>&#9;</pre></div>
    
        <div class="w3-col s10">
            <div class="w3-card-4 w3-margin">
    
                <header class="w3-container w3-theme">
                    <h2>Formulaire de contact</h2>
                </header>
                
                <div class="w3-padding">
                    <form action="./submit.html" method="GET">
                        <br>
                        
                        <label for="P" class="w3-label w3-text-theme">Prénom</label>
                        <input type="text" id="P" name="FName" class="w3-input w3-border w3-round"> 
                        <br>
                        
                        <label for="N" class="w3-label w3-text-theme">Nom</label>
                        <input type="text" id="N" name="LName" class="w3-input w3-border w3-round"> 
                        <br>
                        
                        <label for="A" class="w3-label w3-text-theme">Âge</label>
                        <input type="text" id="A" name="Age" class="w3-input w3-border w3-round"> 
                        <br>
                        
                        <label for="E" class="w3-label w3-text-theme">E-mail</label>
                        <input type="text" id="E" name="Email" class="w3-input w3-border w3-round" placeholder="nom.prenom@univ-avignon.fr"> 
                        <br>
                        
                        <label for="MDPa" class="w3-label w3-text-theme">Mot de passe</label>
                        <input type="password" id="MDPa" name="PasswordA" class="w3-input w3-border w3-round"> 
                        <br>
                        
                        <label for="MDPb" class="w3-label w3-text-theme">Retapez votre mot de passe</label>
                        <input type="password" id="MDPb" name="PasswordB" class="w3-input w3-border w3-round"> 
                        <br>
                        
                        <fieldset class="w3-border-0">
                            <legend class="w3-text-theme">Genre</legend>
    
                            <input type="radio" id="G_h" name="Genre" value="Homme" class="w3-radio">
                            <label for="G_h">Homme</label>
                            <p></p>
    
                            <input type="radio" id="G_f" name="Genre" value="Femme" class="w3-radio">
                            <label for="G_f">Femme</label>
                            <p></p>
    
                            <input type="radio" id="G_x" name="Genre" value="G_Autre" class="w3-radio">
                            <label for="G_x">Autre</label>
    
                        </fieldset>
                        <br>
                        
                        <fieldset class="w3-border-0">
                            <legend class="w3-text-theme">Sports pratiqués régulièrement</legend>
                            
                            <input type="checkbox" id="S_f" name="Sport" value="Football" class="w3-check">
                            <label for="S_f">Football</label>
                            <p></p>
    
                            <input type="checkbox" id="S_e" name="Sport" value="Equitation" class="w3-check">
                            <label for="S_e">Équitation</label>
                            <p></p>
    
                            <input type="checkbox" id="S_b" name="Sport" value="Basketball" class="w3-check">
                            <label for="S_b">Basketball</label>
                            <p></p>
    
                            <input type="checkbox" id="S_n" name="Sport" value="Natation" class="w3-check">
                            <label for="S_n">Natation</label>
                            <p></p>
    
                            <input type="checkbox" id="S_v" name="Sport" value="Velo" class="w3-check">
                            <label for="S_v">Vélo</label>
                            <p></p>
    
                            <input type="checkbox" id="S_x" name="Sport" value="S_Autre" class="w3-check">
                            <label for="S_x">Autre</label>
    
                        </fieldset>
                        <br>
                        
                        <label for="ACT" class="w3-label w3-text-theme">Activité principale</label>
                        <select id="ACT" name="Activite" size="1" class="w3-select w3-border">
                            <option value="Salarie">Salarié.e</option>
                            <option value="Autoentrepreneur">Auto-entrepreneur.se</option>
                            <option value="Etudiant" selected="">Étudiant.e</option>
                            <option value="ACT_Autre">Autre</option>
                        </select>
                        <br><br>
                        
                        <label for="T" class="w3-label w3-text-theme">Transport pour se rendre au stage</label>
                        <select id="T" name="Transport" size="5" class="w3-select w3-border">
                            <option value="Voiture">Voiture</option>
                            <option value="Trottinette">Trottinette</option>
                            <option value="Velo">Vélo</option>
                            <option value="Bus">Bus</option>
                            <option value="T_Autre">Autre</option>
                        </select>
                        <br><br>
                        
                        <label for="O" class="w3-label w3-text-theme">Autres informations</label><br>
                        <textarea id="O" name="Commentaires" cols="20" rows="3"></textarea>
                        <br><br>
                        
                        <br>
                        <input type="submit" value="Soumettre" class="w3-button w3-theme">
                        <input type="reset" value="Recommencer" class="w3-button w3-theme">
                        <br><br>
                    </form>
                </div>
            </div>
    
        </div>
    
        <div class="w3-col s1"><pre>&#9;</pre></div>

    </div> 
