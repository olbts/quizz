<?php 

if(isset($_POST["email"])){
    $joueur = selectJoueur($_POST["email"],$db);
    if(empty($joueur)){
        insertJoueur($_POST["email"],$db);
    }
    $_SESSION["email"] = $_POST["email"];
    replace();
};
require "views/compte.view.php";

