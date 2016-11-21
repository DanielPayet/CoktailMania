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
		
   <div class="block">  
	   <input class ="nom" type="text" name="nom" value="<?php if(isset($nom)){echo $nom;} if(!$zoneNom){echo '"class="erreur';} ?>" />
    
	   <input class="nom" type="text" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}  if(!$zonePrenom){echo '"class="erreur';} ?>" />
    
    </div>
    
    <div class="block">
        <input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" /> 	
    </div>
    
    <div class="block">
        <input type="password" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}  if(!$zoneMdp1){echo '"class="erreur';} ?>" required="required" /> 
    </div>
    
    <div class="block">
        <input type="password" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}  if(!$zoneMdp2){echo '"class="erreur';} ?>" required="required" />
    </div>
        
    <div class="block">
        <input type="email" name="email" value="<?php if(isset($email)){echo $email;}  if(!$zoneEmail){echo '"class="erreur';} ?>" required="required" />
    </div>
    
    <div class="block">
        <input type="text" name="naissance" value="<?php if(isset($naissance)){echo $naissance;}  if(!$zoneDate){echo '"class="erreur';}?>"/>
    </div>
    
    <div class="block">
		<input class="check <?php if(!$zoneSexe){echo "erreur";} ?>" type="radio" name="sexe" value="f" <?php if((isset($sexe))&&($sexe=='f')){echo "checked";} ?>/>femme
		<input class="check <?php if(!$zoneSexe){echo "erreur";} ?>" type="radio" name="sexe" value="h" <?php if((isset($sexe))&&($sexe=='h')){echo "checked";} ?>/>homme
    </div>
    
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