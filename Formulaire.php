<?php
	include("php/GestionFormulaire.php")
?>
<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
</head>

<style>
	.erreur{
		background-color : red;
	}
</style>

<body>

<h1>Vos données</h1>

<form method="post" action="#" >
<fieldset>

    <legend>Informations personnelles</legend>
	
	Vous êtes :  
	
	<span class="<?php if(!$zoneSexe){echo "erreur";} ?>">
		<input type="radio" name="sexe" value="f" <?php if((isset($sexe))&&($sexe=='f')){echo "checked";} ?>/> une femme 	
		<input type="radio" name="sexe" value="h" <?php if((isset($sexe))&&($sexe=='h')){echo "checked";} ?>/> un homme
	</span>
	
	<br />
	
    Pseudo : 
	<input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" /><br /> 	
    
    Nom :    
	<input type="text" name="nom" value="<?php if(isset($nom)){echo $nom;} if(!$zoneNom){echo '"class="erreur';} ?>" /><br />   
    
    Prénom : 
	<input type="text" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}  if(!$zonePrenom){echo '"class="erreur';} ?>" /><br /> 	
    
    Mot de passe : 
	<input type="password" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}  if(!$zoneMdp1){echo '"class="erreur';} ?>" required="required" /><br /> 
    
    Retaper le mot de passe : 
	<input type="password" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}  if(!$zoneMdp2){echo '"class="erreur';} ?>" required="required" /><br /> 
    
    Adresse mail : 
	<input type="email" name="email" value="<?php if(isset($email)){echo $email;}  if(!$zoneEmail){echo '"class="erreur';} ?>" required="required" /><br /> 
    
    Date de naissance : 
	<input type="text" name="naissance" value="<?php if(isset($naissance)){echo $naissance;}  if(!$zoneDate){echo '"class="erreur';}?>"/> (jj-mm-aaaa)<br /> 	
    
</fieldset>


	<br />
<input type="submit" name="submit" value="Valider" />
         
</form>

<?php 
	if(isset($submit)&&$erreurs!="")
	{
		echo "<br />Merci de remplir correctement les champs ci-dessous :<br />".$erreurs;
	}
	if(isset($submit)&&$erreurs==""){
		echo "<br />".$affichage;
	}
?>

</body>
</html>