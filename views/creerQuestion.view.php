
<div class="mainPage">
<h1>Créer question</h1>
<h3>Question Numéro <?= $_SESSION["question"]?>/<?= $_SESSION["nb_question"]?></h3>
<div class="couple">
<label for="">Nombre de réponses : </label>
<select name="" id="nbMauvais">
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select>
</div>

<form action="index.php?page=/creerQuizz" method="post">
    <div class="couple">
    <h4 class="question" for="">Question :</h4>
    <input type="text" name="question">
    </div>
    <div class="couple">
    <label class="bonne" for="">Bonne réponse :</label>
    <input type="text"  name="bonne">
    </div>
    
    
    <div id="inputMauvais" >
        <input type="text"  name="mauvaise[]">
    </div>
    <input type="submit" value="envoyer">
</form>
</div>
<script>
    const nbMauvais = document.querySelector("#nbMauvais");
    // nbMauvais.value = 2
    const inputMauvais = document.querySelector("#inputMauvais");
    const originalText = inputMauvais.innerHTML;
    inputMauvais.innerHTML = "<span class='mauvaise'>Mauvaise réponse : </span>" + originalText
    nbMauvais.addEventListener("change",()=>{
        
        const nb = nbMauvais.value;
        console.log(nb)
        inputMauvais.innerHTML ="";
        if (nb > 2) {
            console.log("on finit là")
            for (let i = 1; i < nb; i++) {
            inputMauvais.innerHTML = inputMauvais.innerHTML + "<span class='mauvaise'>Mauvaise réponse "+(i)+":</span>"+ originalText +"<br>"
            }
        }else {
            console.log("on finit pas là")
            inputMauvais.innerHTML = "Mauvaise réponse : " + originalText
        }
    })
</script>