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
        if(estConnecte()){
            $membres = unserialize(file_get_contents('../Membres.data'));
            $membres[$_SESSION["InfoMembre"]["id"]]["panier"] = array();
            file_put_contents('../Membres.data', serialize($membres));
        }
        $_SESSION["InfoMembre"]["panier"] = array();
        
        echo '<script> window.location.href="../index.php?choix=panier" </script>' ;
    }

?>