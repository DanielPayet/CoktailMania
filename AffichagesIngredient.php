<?php
    // --- Affiche les super-catégorie d'un ingredient --- //
    function afficherSuperCategorie($choix,$Hierarchie)
    {
        echo"<div>";
        if(isset($Hierarchie[$choix]['super-categorie']))
        {
            foreach($Hierarchie[$choix]['super-categorie'] as $ingredient)
            {
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'>".$ingredient."</a> | ";
            }
        }
        echo"</div>";
    }

    // --- Affiche les sous-catégorie d'un ingredient --- //
    function afficherSousCategorie($choix,$Hierarchie)
    {
        echo"<div>";
        if(isset($Hierarchie[$choix]['sous-categorie']))
        {
            foreach($Hierarchie[$choix]['sous-categorie'] as $ingredient)
            {
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'>".$ingredient."</a> | ";
            }
        }
        echo"</div>";
    }

    // --- Affiche les informations d'un ingrédient --- //
    function afficherIngredients($choix,$Hierarchie,$Recettes)
    {
        afficherSuperCategorie($choix,$Hierarchie);
        afficherSousCategorie($choix,$Hierarchie);
        afficherRecettes($choix,$Hierarchie,$Recettes);
    }

    // --- Affiche les recettes d'un ingrédient --- //
    function afficherRecettes($choix,$Hierarchie,$Recettes)
    {
        foreach($Recettes as $cle=>$recette)
        {

            if(array_search($choix,$recette['index'])!==false)
            {
                echo "<a href='index.php?choix=".changerChoix($cle)."' style='color:green;'>".$recette['titre']."</a> | ";
            }
        }
        if(isset($Hierarchie[$choix]['sous-categorie']))
        {
            foreach($Hierarchie[$choix]['sous-categorie'] as $ingredient)
            {
                afficherRecettes($ingredient,$Hierarchie,$Recettes);
            }
        }
    }

    function afficherBoutonSuperCategoriePrincipal($choix,$Hierarchie)
    {
        echo"<div class=\"div_btn_ingre\">";
        $i=0;
        if(isset($Hierarchie[$choix]['sous-categorie']))
        {
            foreach($Hierarchie[$choix]['sous-categorie'] as $ingredient)
            {
                $i++;
                echo "<a href='index.php?choix=".changerChoix($ingredient)."'><button class=\"btn_ingre\">".mb_strimwidth($ingredient, 0, 20, "...")."</button></a>  ";
                if($i==4){echo "";}
            }
        }
        echo"</div>";
    }
?>