<?php include("php/GestionConnexion.php");?>
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

<h1>Connexion</h1>

<form method="post" action="#" >
<fieldset>
	
    Pseudo : 
	<input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" /><br />	
    
    Mot de passe : 
	<input type="password" name="mdp1" value="<?php if(isset($mdp)){echo $mdp1;}  if(!$zoneMdp){echo '"class="erreur';} ?>" required="required" /><br /> 
    	
    
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