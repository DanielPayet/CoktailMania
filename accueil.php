<section class="align-center">
     <h1>Bienvenue
    <?php 
        if(isset($_SESSION["estConnecte"]) && $_SESSION["estConnecte"] == true){
            echo $_SESSION["InfoMembre"]["prenom"];
        }
    ?>
    sur Cocktail Mania ! </h1>
    <p> Vous retrouverais une liste complete de recette de cocktail.</p>
    <p>Commencez par choisir une catégorie ! ;) </p>


<?php
afficherBoutonSuperCategoriePrincipal($choix,$Hierarchie,$Recettes);
?>
    
</section>