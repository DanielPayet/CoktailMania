<?php
    // --- Affiche les informations d'un cocktail --- //
    function afficherCocktail($choix,$Recettes)
    {
        if(isset($Recettes[$choix]))
        {
            echo "<div class =\"recette\"><h3>".$Recettes[$choix]['titre']."</h3>";
            if(file_exists(normaliseTitreImage($Recettes[$choix]['titre'])))
            {
                echo "<img src='".normaliseTitreImage($Recettes[$choix]['titre'])."'></img>";
            }
            $composition = explode("|",$Recettes[$choix]['ingredients']);
            echo("<ul>");
            foreach($composition as $i)
            {
                echo "<li>".$i."</li>";
            }
            
            echo "</ul>";
            echo "<p>Preparation : ".$Recettes[$choix]['preparation']."<p><br>";
            foreach($Recettes[$choix]['index'] as $ingredient)
            {
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'>".$ingredient."</a> | ";
            }
            echo '</div>';
        } 
    }

    // --- Affiche un coktail aléatoire --- //
    function afficherCocktailAleatoire($Recettes)
    {
        $choix = rand(0,107);
        if(isset($Recettes[$choix]))
        {
            echo "<a href=\"index.php?choix=".$choix."\"><h3>".mb_strimwidth($Recettes[$choix]['titre'], 0, 40, "...")."</h3>";
            if(file_exists(normaliseTitreImage($Recettes[$choix]['titre'])))
            {
                echo "<img class=\"img_Coktail\" src='".normaliseTitreImage($Recettes[$choix]['titre'])."'></img></a>";
            }
            else{
                if(file_exists("Images/default_cocktail.jpg")){
                    echo "<img class=\"img_Coktail\" src='Images/default_cocktail.jpg'></img></a>";
                }
            }
        } 
    }

    // --- Affiche les noms des cocktails --- /
    function afficherNomCocktail($Recettes,$AvecAlcool)
        //$AvecAlcool = 0 si tout type de cocktail,
        //------------ = 1si avec alcool,
        //------------ = 2 si sans alccol.
    {
        $preg="/sans alcool/";
        switch($AvecAlcool){
            case 0:
                $choixAlcool = rand(0,107);
                break;
            case 1:
                do{
                    $choixAlcool = rand(0,107);
                }while(preg_match($preg,$Recettes[$choixAlcool]['titre']));
                break;
            case 2:
                 do{
                    $choixAlcool = rand(0,107);
                }while(!(preg_match($preg,$Recettes[$choixAlcool]['titre'])));
                break;
            default:
                $choixAlcool = rand(0,107);
                break;
        }
           
        if(isset($Recettes[$choixAlcool]))
        {
            echo '<a href="index.php?choix='.$choixAlcool.'">'.mb_strimwidth($Recettes[$choixAlcool]['titre'], 0, 40, "...").'</a>';
        } 
    }
?>