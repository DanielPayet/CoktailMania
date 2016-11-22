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

<h1 class="titre">Connexion</h1>

<form method="post" action="#" >
<fieldset>
	<input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" />
    
	<input type="password" name="mdp" value="<?php if(isset($mdp)){echo $mdp;}  if(!$zoneMdp){echo '"class="erreur';} ?>" required="required" onclick="if(this.type=='text'){this.type='password';this.value='';}" onblur="if(this.type=='password' && this.value==''){this.type='text';this.value='Votre mot de passe';}" />
    	
    
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