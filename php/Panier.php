<!DOCTYPE html>
<html>

<head>
      <title>Vos recettes de coktail</title>
	  <meta charset="utf-8" />
</head>

<style>
	.erreur{
		background-color : red;
	}
</style>

<body>
<h1>Vos recettes de coktail favoris</h1>
    <a href="php/addElement.php">Ajoutez Morito (BETA)</a>
    <ul>
        <?php
            foreach($_SESSION["InfoMembre"]["panier"] as $coktail){
                echo '<li>'.$coktail.'</li>';
            }
        ?>
    </ul>
    
    <a href="php/videPanier.php">Vider le panier</a>
</body>
</html>