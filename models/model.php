<?php

function insertQuizz($titre,$niveau,$pdo){
    
    $sql = "INSERT INTO `quizz`(`titre`,`niveau`) VALUES (:titre,:niveau)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':titre', $titre, PDO::PARAM_STR);
    $requetePrepare->bindParam(':niveau', $niveau, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}
function insertJoueur($email,$pdo){
    
    $sql = "INSERT INTO `joueur`(`email`) VALUES (:email)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}
function selectJoueur($email,$pdo){
    
    $sql = "SELECT * FROM joueur WHERE email = :email";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function insertBonne_reponse($libelle,$pdo){
    
    $sql = "INSERT INTO `bonne_reponse`( `libelle`) VALUES (:libelle)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':libelle', $libelle, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}
function insertMauvaise_reponse($libelle,$pdo){
    
    $sql = "INSERT INTO `mauvaise_reponse`( `libelle`) VALUES (:libelle)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':libelle', $libelle, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}
function insertQuestion($libelle,$pdo){
    
    $sql = "INSERT INTO `question`( `libelle`) VALUES (:libelle)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':libelle', $libelle, PDO::PARAM_STR);
    $requetePrepare->execute();
    
}
function insertQuestion_bonne_reponse($id_question,$id_bonne_reponse,$pdo){
    
    $sql = "INSERT INTO `question_bonne_reponse`(`id_question`, `id_bonne_reponse`) VALUES (:id_question,:id_bonne_reponse)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
    $requetePrepare->bindParam(':id_bonne_reponse', $id_bonne_reponse, PDO::PARAM_INT);
    $requetePrepare->execute();
    
}
function insertQuestion_mauvaise_reponse($id_question,$id_mauvaise_reponse,$pdo){
    
    $sql = "INSERT INTO `question_mauvaise_reponse`(`id_question`, `id_mauvaise_reponse`) VALUES (:id_question,:id_mauvaise_reponse)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
    $requetePrepare->bindParam(':id_mauvaise_reponse', $id_mauvaise_reponse, PDO::PARAM_INT);
    $requetePrepare->execute();
    
}
function insertQuestion_quizz($id_question,$id_quizz,$pdo){
    
    $sql = "INSERT INTO `question_quizz`(`id_question`, `id_quizz`) VALUES (:id_question,:id_quizz)";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
    $requetePrepare->bindParam(':id_quizz', $id_quizz, PDO::PARAM_INT);
    $requetePrepare->execute();
    
}
function getAllQuizz($pdo){
    
    $sql = "SELECT * FROM quizz WHERE fini = 1";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->execute();
    return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function getQuizz($id_quizz,$pdo){
    $sql = "SELECT * FROM quizz WHERE id_quizz = :id_quizz";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_quizz', $id_quizz, PDO::PARAM_INT);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}

function getQuestion($offset,$id_quizz,$pdo){
    $sql = "SELECT question_quizz.*,question.libelle as libelle FROM question_quizz
    JOIN question on question.id_question = question_quizz.id_question 
    WHERE question_quizz.id_quizz = :id_quizz 
    LIMIT 1 OFFSET :offset";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_quizz', $id_quizz, PDO::PARAM_INT);
    $requetePrepare->bindParam(':offset', $offset, PDO::PARAM_INT);
    $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}
function getAllReponse($id_question,$pdo){
    $sql = "SELECT * FROM bonne_reponse,mauvaise_reponse
    JOIN question_bonne_reponse on question_bonne_reponse.id_bonne_reponse = bonne_reponse.id_bonne_reponse
    JOIN question_mauvaise_reponse on question_mauvaise_reponse.id_mauvaise_reponse = mauvaise_reponse.id_mauvaise_reponse
    JOIN question on question_bonne_reponse.id_question = question.id_question

    -- JOIN mauvaise_reponse on question_mauvaise_reponse.id_mauvaise_reponse = mauvaise_reponse.id_mauvaise_reponse
   WHERE question.id_question = :id_question";
   $requetePrepare = $pdo->prepare($sql);
   $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
$requetePrepare->execute();
   return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function updateQuizz($id_quizz,$pdo){
    $sql = "UPDATE `quizz` SET `fini`= 1 WHERE id_quizz = :id_quizz";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_quizz', $id_quizz, PDO::PARAM_INT);
    $requetePrepare->execute();
}
function getBonneReponse($id_question,$pdo){
    $sql = "SELECT bonne_reponse.libelle as reponse FROM question JOIN question_bonne_reponse ON question_bonne_reponse.id_question = question.id_question JOIN bonne_reponse on bonne_reponse.id_bonne_reponse = question_bonne_reponse.id_bonne_reponse WHERE question.`id_question` = :id_question;";
     $requetePrepare = $pdo->prepare($sql);
     $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
  $requetePrepare->execute();
     return $requetePrepare->fetch(PDO::FETCH_ASSOC)["reponse"];
}
function getMauvaiseReponse($id_question,$pdo){
    $sql = "SELECT mauvaise_reponse.libelle as reponse FROM question JOIN question_mauvaise_reponse ON question_mauvaise_reponse.id_question = question.id_question JOIN mauvaise_reponse on mauvaise_reponse.id_mauvaise_reponse = question_mauvaise_reponse.id_mauvaise_reponse WHERE question.`id_question` = :id_question;";
   $requetePrepare = $pdo->prepare($sql);
   $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
$requetePrepare->execute();
   return $requetePrepare->fetchAll(PDO::FETCH_ASSOC);
}
function testReponse($id_question,$reponse,$pdo){
    $sql = "SELECT bonne_reponse.libelle as reponse FROM question JOIN question_bonne_reponse ON question_bonne_reponse.id_question = question.id_question JOIN bonne_reponse on bonne_reponse.id_bonne_reponse = question_bonne_reponse.id_bonne_reponse WHERE bonne_reponse.libelle = :reponse AND question.`id_question` = :id_question ;";
    $requetePrepare = $pdo->prepare($sql);
    $requetePrepare->bindParam(':id_question', $id_question, PDO::PARAM_INT);
    $requetePrepare->bindParam(':reponse', $reponse, PDO::PARAM_STR);
 $requetePrepare->execute();
    return $requetePrepare->fetch(PDO::FETCH_ASSOC);
}