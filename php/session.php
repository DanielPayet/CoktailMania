<?php
    session_start();
    if(!isset($_SESSION["InfoMembre"]["panier"])){
        $_SESSION["InfoMembre"]["panier"] = array();
    }
    
?>