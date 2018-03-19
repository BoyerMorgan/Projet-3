  <footer>
        <fieldset style= "margin-bottom: 15px">
            <br/>
        <div class = "container" align="right">
        <?php        
            if (isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true) { 
                if  (isset($_GET['action']) && ($_GET['action'] == 'Administration' || $_GET['action'] == 'CreateNew' || $_GET['action'] == 'Modify')) {
        ?>          
                <a href="index.php?action=deconnexion"><button class="btn btn-secondary">Déconnexion</button></a><br />
        <?php
                }
             else  { 
        ?> 
                <section class ="row-sm-4">  
                        <a href="index.php?action=deconnexion"><button class="btn btn-secondary">Déconnexion</button></a>
                        <a href="index.php?action=Administration"><button class="btn btn-secondary">Page d'administration</button></a>
                    </section>   
        <?php   
                }     
            }
            else if (!isset($_SESSION['is_logged'])) { 
        ?>
            	<legend>Espace d'administration</legend>
            	<form action="index.php?action=connexion" method="post">
                   
                        <div class ="form-inline">
                          <label for="text" class="control-label">
                                <small class="text-muted">Identifiant :</small>
                          </label>
                                <input class="form-control input-sm" type="text" id="pseudo" name="pseudo"/> 
                           <label for="password" class="control-label">
                                <small class="text-muted">Mot de passe :</small>
                           </label>
                                <input class="form-control input-sm" type="password" id="pass" name="pass" />
                          <input class="btn btn-primary btn-sm" type="submit" value="Se connecter" />
                        </div>
                   
                </form>
        <?php
            }
        ?>      
            </fieldset> 
        </div>
    </footer>