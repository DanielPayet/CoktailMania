<?php
    session_start();
    $membres = unserialize(file_get_contents('../Membres.data'));

    $membres[$_SESSION["InfoMembre"]["id"]]["panier"] = array_merge($membres[$_SESSION["InfoMembre"]["id"]]["panier"],$_SESSION["InfoMembre"]["panier"]);
    $_SESSION["estConnecte"]=false;

    file_put_contents('Membres.data', serialize($membres));

    session_destroy();
    echo '<script> window.location.href="../index.php" </script>' ;
?>