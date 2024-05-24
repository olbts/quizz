<?php
if(isset($_POST["niveau"]) && isset($_POST["titre"])){
    insertQuizz($_POST["titre"],$_POST["niveau"],$db);
    $_SESSION["id_quizz"] = $db->lastInsertId();
    $_SESSION["nb_question"] = $_POST["nb_question"];
    $_SESSION["question"] = 1;
    require "views/creerQuestion.view.php";
}
else if(isset($_SESSION["nb_question"])){
    insertQuestion($_POST["question"],$db);
    $id_question = $db->lastInsertId();
    insertQuestion_quizz($id_question,$_SESSION["id_quizz"],$db);
    insertBonne_reponse($_POST["bonne"],$db);
    $id_bonne_reponse = $db->lastInsertId();
    insertQuestion_bonne_reponse($id_question,$id_bonne_reponse,$db);
    foreach ($_POST["mauvaise"] as $mauvaiseR) {
        insertMauvaise_reponse($mauvaiseR,$db);
        $id_mauvaise_reponse = $db->lastInsertId();

        insertQuestion_mauvaise_reponse($id_question,$id_mauvaise_reponse,$db);
    }
    $_SESSION["question"] = $_SESSION["question"] + 1;
    if($_SESSION["question"] <= $_SESSION["nb_question"]){
        require "views/creerQuestion.view.php";
    }
    else{
        unset($_SESSION["question"]);
        unset($_SESSION["nb_question"]);
        updateQuizz($_SESSION["id_quizz"],$db);
        require "views/quizzCree.view.php";
    }
}
else{
    require "views/creerQuizz.view.php";
}