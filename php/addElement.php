<?php
    session_start();
    function estConnecte(){
        if(isset($_SESSION["estConnecte"])){
            return  $_SESSION["estConnecte"];
        }
        else{
            return false;
        }
        return false;
    }
    
    if(file_exists("../Membres.data")){
        
        $_SESSION["InfoMembre"]["panier"][] = "Mojito";
        
        if(estConnecte()){
            $membres = unserialize(file_get_contents('../Membres.data'));
            $membres[$_SESSION["InfoMembre"]["id"]]["panier"] =  $_SESSION["InfoMembre"]["panier"];
            file_put_contents('../Membres.data', serialize($membres));
        }
        
        echo '<script> window.location.href="../index.php?choix=panier" </script>' ;
    }

?>