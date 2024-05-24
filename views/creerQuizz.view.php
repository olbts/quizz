<a href="index.php">page d'accueil</a>

<form action="" method="post" class="mainPage">
    <h1>Créer Quizz</h1>
    <div class="couple">
    <label for="">Titre :</label>
    <input  name="titre" id="">
    </div>
    <div class="couple">
    <label for="">Nombre de questions :</label>
    <input type="number" name="nb_question" id="">
    </div>
    <div class="couple">
    <label for="">Niveau de difficulté du quizz :</label>
    <select name="niveau" id="">
        <option value="facile">facile</option>
        <option value="moyen">moyen</option>
        <option value="difficile">difficile</option>
    </select>
    </div>
    
    
    
    <input type="submit" value="envoyer">
</form>