<?php
    extract($_POST);
	$erreurs = "";
	$zoneSexe = TRUE;
	$zoneNom = TRUE;
	$zonePrenom = TRUE;
	$zoneDate = TRUE;
	$zoneEmail = TRUE;
    $zonePseudo = TRUE;
    $zoneMdp1 = TRUE;
    $zoneMdp2 = TRUE;
	$affichage ="";
	
    if(!file_exists("Membres.data"))
    {
        file_put_contents('Membres.data', serialize(array()));
    }
    $buffer = file_get_contents('Membres.data');

    $membres = unserialize($buffer);

	if(isset($submit)){
		if(!(isset($sexe))||($sexe!='h'&&$sexe!='f'))
		{
			$erreurs = $erreurs."<li>Sexe</li>";
			$zoneSexe = FALSE;
		}
		if(!(isset($pseudo))||(strlen(trim($pseudo))<=5)){
			$erreurs = $erreurs."<li>Pseudo</li>";
			$zonePseudo = FALSE;
		}
        if(!(isset($nom))||(strlen(trim($nom))<=2)){
			$erreurs = $erreurs."<li>Nom</li>";
			$zoneNom = FALSE;
		}
		if(!(isset($prenom))||(strlen(trim($prenom))<1)||!(ctype_alpha(trim($prenom)))){
			$erreurs = $erreurs."<li>Prenom</li>";
			$zonePrenom = FALSE;
		}
		if(!(isset($email))||(strlen(trim($email))<=2)){
			$erreurs = $erreurs."<li>E-mail</li>";
			$zoneEmail = FALSE;
		}
        if(!(isset($mdp1))||(strlen(trim($mdp1))<=6)){
			$erreurs = $erreurs."<li>Mot de passe non conforme</li>";
			$zoneMdp1 = FALSE;
		}
        if(!(isset($mdp2))||(trim($mdp1)!=trim($mdp2)))
        {
            $erreurs = $erreurs."<li>Les mots de passe ne sont pas identiques</li>";
			$zoneMdp2 = FALSE;
        }
        if(!(isset($naissance))||(trim($naissance)=="")){
			$erreurs = $erreurs."<li>Date</li>";
			$zoneDate = FALSE;
		}
		else
		{ 
			if(preg_match("/^([0-9]{2}[\/][0-1][0-9][\/][0-9]{2,4})$/",$naissance)){
                list($day,$month,$year)=explode('/',$naissance);
                if(!checkdate($month,$day,$year)) 
                { 
                    $erreurs = $erreurs."<li>Date 1</li>";
                    $zoneDate = FALSE;
                }
            }
            else
            {
                $erreurs = $erreurs."<li>Date 2</li>";
                $zoneDate = FALSE;    
            }
		}
        foreach($membres as $IDmembre => $InfoMembre){
            if ($InfoMembre["pseudo"] == $pseudo){
                $erreurs = $erreurs."<li>Pseudo déja utilisé.</li>";
                $zonePseudo = FALSE;
            } 
        }
		
		if($erreurs==""){
			/*$affichage = $affichage.ucfirst(strtolower(trim($nom)))." ".
			$affichage.ucfirst(strtolower(trim($prenom)))." (".$sexe."), né";
			if($sexe=='f') $affichage = $affichage."e";
			list($year,$month,$day)=explode('/',$naissance);
			$affichage = $affichage." le ".$day."/".$month."/".$year.
			" / E-mail : ".$email;*/
            $mdp = md5($mdp1);
    
            $NouveauMembre = array(
                "id" => count($membres), //nb de membres déja inscrit
                "pseudo" => $pseudo,
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "password" => $mdp,
                "naissance" => $naissance,
                "sexe" => $sexe,
                "panier" => $_SESSION["InfoMembre"]["panier"]
            );
        
            $membres[] = $NouveauMembre;
            file_put_contents('Membres.data', serialize($membres));
                    
            $_SESSION["estConnecte"]=true;
            $_SESSION["InfoMembre"] = $NouveauMembre;           
            
            echo '<script> window.location.href="index.php" </script>';
        }
	}
?>