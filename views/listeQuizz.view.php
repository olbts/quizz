<a href="index.php">page d'accueil</a>
<div class="mainPage">
<h1>Quizzy</h1>
<ol>
<?php foreach ($quizz as $meh) : ?>
<?php if (!empty( $meh["titre"])) : ?>
<li><a href="index.php?page=/jouerQuizz&id=<?=$meh["id_quizz"]?>"><?=$meh["titre"]?></a>  <?=$meh["niveau"]?></li>
<?php endif; ?>
<?php endforeach; ?>
</ol>
</div>
