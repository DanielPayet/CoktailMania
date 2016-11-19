<?php
    /*********************************************************************************************************/
    include("php/session.php");
    /*********************************************************************************************************/
    // --- Vérifie l'existance de Donnees.inc.php et l'inclut dans la page --- //
    $DonneesExiste = false;
    if(file_exists("Donnees.inc.php"))
    {
        $DonneesExiste = true;
        include_once("Donnees.inc.php");
    }

    include_once("AffichagesIngredient.php");
    include_once("AffichagesCocktail.php");
    include_once("GestionTexte.php");

    // --- Gestion de $choix, la variable de selection ---//
    if(!isset($_GET['choix']))
    {
        $choix = 'Aliment';
    }
    else
    {
        $choix = $_GET['choix'];
    }
    $choix=remettreChoix($choix);
    if(!isset($_SESSION['nav'])){
    	$_SESSION['nav']="INDEX";
	}
	else{
    	$_SESSION['nav']=$_SESSION['nav']." > ".$choix;
	}
    /********************************************************************************************/
    function estConnecte(){
        if(isset($_SESSION["estConnecte"])){
            return  $_SESSION["estConnecte"];
        }
        else{
            return false;
        }
        return false;
    }
    /********************************************************************************************/
    function afficherFormulaire()
    {
        if(file_exists("Formulaire.php"))
        {
            include("Formulaire.php");
        }
    }
    
    /******************************************************************************************************/
    function afficherConnexion()
    {
        if(file_exists("connexion.php"))
        {
            if(!estConnecte()){
                include("connexion.php");
            }
            else{
                afficherCompte();
            }
        }
    }
    function afficherCompte()
    {
        if(file_exists("php/compte.php"))
        {
            if(estConnecte()){
                include("php/compte.php");
            }
            else{
                afficherConnexion();
            }
        }
    }
    /*********************************************************************************************************************/
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>Cocktail Mania !</TITLE>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</HEAD>
<BODY>
    
    <header>
        <p><a href ="index.php" >Cocktail Mania</a></p>
        <?php
            if(isset($_SESSION["estConnecte"]) && $_SESSION["estConnecte"] == true){
                /******************************************************************************************************************/
                echo '<button type="button" value ="Inscription" onClick="window.location.href=\'index.php?choix=compte\';"><i class="material-icons">person</i>Mon compte</button>';
                /*******************************************************************************************************************/
            }
            else{
                /****************************************************************************************************************/
                echo '<button type="button" value ="Connexion" onClick="window.location.href=\'index.php?choix=connexion\';"><i class="material-icons">person</i> Connexion</button>
                <button type="button" value ="Inscription" onClick="window.location.href=\'index.php?choix=formulaire\';"><i class="material-icons">person_add</i>Inscription</button>';
                /**************************************************************************************************************/
            }
        ?>
        <button type="button" value ="Panier"><i class="material-icons">add_shopping_cart</i> Panier</button>
    </header>

    <nav>
        <?php echo $_SESSION['nav'];?>
    </nav>
    
    <main>
        <?php 
            /***************************************************************************************************************/
            if(isset($_GET["choix"])){
                echo "<section>";
               
                switch($choix){
                    case "formulaire" : 
                        afficherFormulaire();
                        break;
                case "connexion" : 
                    afficherConnexion();
                    break;
                case "compte" : 
                    afficherCompte();
                    break;
                default : 
                    afficherIngredients($choix,$Hierarchie,$Recettes);
                    afficherCocktail($choix,$Recettes);
                    break;
                }
                echo "</section>";
            }
            else{
                include ("accueil.php");
            }
            /*****************************************************************************************************************/
        ?>
        
        <div class="align-center">
            <?php 
                for($i=1;$i<=4;$i++){
                    echo '<section class="Proposition">';
                    afficherCocktailAleatoire($Recettes);
                    echo '</section>';
                }
            ?>
        </div>  
    </main>
    
    <footer>
        <div>
            <ul>
                <li><a href="index.php">Tous les cocktails</a></li>
                <?php
                for($i=1;$i<=4;$i++){
                    echo '<li>';
                    afficherNomCocktail($Recettes,0);
                    echo '</li>';
                }
                ?>
            </ul>
        
            <ul>
                <li><a href="index.php">Tous les cocktails sans alcool</a></li>
                <?php
                for($i=1;$i<=4;$i++){
                    echo '<li>';
                    afficherNomCocktail($Recettes,2);
                    echo '</li>';
                }
                ?>
            </ul>
           
            <ul>
                <li><a href="index.php?choix=Alcool">Tous les cocktails avec alcool</a></li>
                <?php
                for($i=1;$i<=4;$i++){
                    echo '<li>';
                    afficherNomCocktail($Recettes,1);
                    echo '</li>';
                }
                ?>
            </ul>
            
            <ul>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Contactez-nous</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Google+</a></li>
                

            </ul>
        </div>
        <hr>
        <p>L'abus d'alcool est dangereux pour la santé. À consommer avec modération.</p>
    </footer>
    
</BODY>
</HTML>