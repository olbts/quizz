<?php 

if (isset($_GET["id"])) {
    $_SESSION["score"] = 0;
    $_SESSION["actuelleQuestion"] = 0;
    $_SESSION["currentQuizz"] = $_GET["id"];
    $question = getQuestion($_SESSION["actuelleQuestion"],$_GET["id"],$db);
    $titre_question = $question["libelle"];
    $reponses[] =  getBonneReponse($question["id_question"],$db);
    foreach (getMauvaiseReponse($question["id_question"],$db) as $mauvaise) {
        $reponses[] = $mauvaise["reponse"];
    }
    shuffle($reponses);
    $_SESSION["actuelleQuestion"] =  $_SESSION["actuelleQuestion"] + 1;
    require "views/jouerQuizz.view.php";
}
else if(isset($_POST["reponse"])&& isset($_POST["id"])){//dans le cas où on appuie sur valider
    $verifier = !empty(testReponse($_POST["id"],$_POST["reponse"],$db));
    //requete pour verifier si la reponse est 
    if ($verifier) {//réponse bonne
        # code...
        $_SESSION["score"] =  $_SESSION["score"] + 1 ;
        $banner = ["green" , "Bonne réponse !"];
    } else {//reponse mauvaise
        # code...
        $banner = ["red" , "Mauvaise réponse !"];
    }
    $question = getQuestion($_SESSION["actuelleQuestion"],$_SESSION["currentQuizz"],$db);
    if($question){
        $titre_question = $question["libelle"];
    $reponses[] =  getBonneReponse($question["id_question"],$db);
    foreach (getMauvaiseReponse($question["id_question"],$db) as $mauvaise) {
        $reponses[] = $mauvaise["reponse"];
    }
    shuffle($reponses);
    $_SESSION["actuelleQuestion"] =  $_SESSION["actuelleQuestion"] + 1;
    require "views/jouerQuizz.view.php";
    }
    else{
    require "views/score.view.php";
    }
    // $questions = getAllQuestion($_SESSION["actuelleQuestion"],$_GET["id"],$db);
    
    
}

