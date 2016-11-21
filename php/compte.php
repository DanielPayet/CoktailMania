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
<h1 class="titre">Votre compte</h1>
    <ul>
        <li><?php echo $_SESSION["InfoMembre"]["nom"];?></li>
        <li><?php echo $_SESSION["InfoMembre"]["prenom"];?></li>
    </ul>
<a href="php/deconnexion.php">Déconnexion</a>
</body>
</html>