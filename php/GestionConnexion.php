<?php
    extract($_POST);
	$erreurs = "";
    $zonePseudo = TRUE;
    $zoneMdp = TRUE;
	$affichage ="";

    if(!file_exists("Membres.data"))
    {
        file_put_contents('Membres.data', serialize(""));
    }
    $membres = unserialize(file_get_contents('Membres.data'));
    
	if(isset($submit)){
        $trouverMembre = false;
        if(empty($membres)){
            $membresVide = true;
        }
        else{
            $membresVide = false;
        }
        $id=-1;
        if(!$membresVide){
            while(!$trouverMembre && $id<count($membres)-1){
                $id++;
                if($membres[$id]["pseudo"] == $pseudo){
                    $trouverMembre = true;
                }
            }
        }
        
        if(!$trouverMembre){
            $erreurs = $erreurs."<li>Pseudo inconnu</li>";
            $zonePseudo = FALSE;
        }
        else{
            if(!($membres[$id]["password"] == md5($mdp1))){
                $erreurs = $erreurs."<li>Mot de passe</li>";
                $zoneMdp = FALSE;
            }
        }
		if($erreurs==""){
            $membres[$id]["panier"] = array_merge( $membres[$id]["panier"],$_SESSION["InfoMembre"]["panier"]);
            $_SESSION["estConnecte"]=true;
            $_SESSION["InfoMembre"] = $membres[$id];
            
            
            echo '<script> window.location.href="index.php" </script>';
        }

	}
?>