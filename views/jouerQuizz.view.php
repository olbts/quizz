<div class="flexRow">
<a href="index.php">page d'accueil</a>
<div class="mainPage">
    <h1>Quizzy</h1>
    <h3><span class="question">Question <?= $_SESSION["actuelleQuestion"]?>:</span> <?= $titre_question?></h3>
    <form action="index.php?page=/jouerQuizz" method="post">
        <input type="hidden" name="reponse">
        <input type="hidden" name="id" value='<?=$question["id_question"]?>'>
        <div class="reponses">
        <?php foreach ($reponses as $reponse) : ?>
        <button class="reponse"><?= $reponse?></button>
        <?php endforeach;?>
        </div>
    
    </form>
</div>
<p>Score : <?= $_SESSION["score"]?></p>
</div>
<script>
    const form = document.querySelector("form");
    const buttons = document.querySelectorAll("button");
    const input = document.querySelector("input");
    buttons.forEach(e => e.addEventListener("click",()=>{
        input.value = e.innerHTML;
        form.submit();
    }))
</script>