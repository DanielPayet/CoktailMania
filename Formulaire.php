<?php
	include("php/GestionFormulaire.php")
?>
<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
</head>
<body>

<h1 class="titre">Inscription</h1>

<form method="post" action="#" >
<fieldset>
		
    <label for="pseudo">Pseudo</label>
	<input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" /> 	
    
    <label for="nom">Nom</label>   
	<input type="text" name="nom" value="<?php if(isset($nom)){echo $nom;} if(!$zoneNom){echo '"class="erreur';} ?>" />
    
    <label for="prenom">Prénom</label>
	<input type="text" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}  if(!$zonePrenom){echo '"class="erreur';} ?>" />
    
    <label for="mdp1">Mot de passe</label> 
	<input type="password" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}  if(!$zoneMdp1){echo '"class="erreur';} ?>" required="required" /> 
    
    <label for="mdp2">Retaper le mot de passe</label>
	<input type="password" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}  if(!$zoneMdp2){echo '"class="erreur';} ?>" required="required" />
    
    <label for="email">E-mail</label>
	<input type="email" name="email" value="<?php if(isset($email)){echo $email;}  if(!$zoneEmail){echo '"class="erreur';} ?>" required="required" />
    
    <label for="naissance">Date de naissance (jj-mm-aaaa)</label>
	<input type="text" name="naissance" value="<?php if(isset($naissance)){echo $naissance;}  if(!$zoneDate){echo '"class="erreur';}?>"/>
		<input class="check <?php if(!$zoneSexe){echo "erreur";} ?>" type="radio" name="sexe" value="f" <?php if((isset($sexe))&&($sexe=='f')){echo "checked";} ?>/>femme
		<input class="check <?php if(!$zoneSexe){echo "erreur";} ?>" type="radio" name="sexe" value="h" <?php if((isset($sexe))&&($sexe=='h')){echo "checked";} ?>/>homme
    
</fieldset>
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