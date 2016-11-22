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
		
   
	   <input class ="nom" type="text" name="nom" value="<?php if(isset($nom)){echo $nom;} if(!$zoneNom){echo '"class="erreur';} ?>" onclick="this.value=''" onblur="if(this.value=='')this.value='Nom';" />
   
    
	   <input class="prenom" type="text" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}  if(!$zonePrenom){echo '"class="erreur';} ?>" onclick="this.value=''" onblur="if(this.value=='')this.value='Prenom';" />
    
        <input type="text" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}  if(!$zonePseudo){echo '"class="erreur';} ?>" required="required" onclick="this.value=''" onblur="if(this.value=='')this.value='Pseudo';" />
    
        <input type="text" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}  if(!$zoneMdp1){echo '"class="erreur';} ?>" required="required"
               onclick="if(this.type=='text'){this.type='password';this.value='';}" onblur="if(this.type=='password' && this.value==''){this.type='text';this.value='Mot de passe';}"/>
   
        <input type="text" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}  if(!$zoneMdp2){echo '"class="erreur';} ?>" required="required" onclick="if(this.type=='text'){this.type='password';this.value='';}" onblur="if(this.type=='password' && this.value==''){this.type='text';this.value='Confirmer mot de passe';}"/>

        <input type="email" name="email" value="<?php if(isset($email)){echo $email;}  if(!$zoneEmail){echo '"class="erreur';} ?>" required="required" onclick="this.value=''" onblur="if(this.value=='')this.value='Votre e-mail';"/>
   
        <input type="text" name="naissance" value="<?php if(isset($naissance)){echo $naissance;}  if(!$zoneDate){echo '"class="erreur';}?>" onclick="this.value=''" onblur="if(this.value=='')this.value='Votre date de naissance';"/>

        <br>
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