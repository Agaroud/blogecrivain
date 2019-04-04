<?php
$this->title = "Modifier un billet";
?>
<header>
	<div class="entete">
        <h1 >Billet simple pour l'Alaska</h1>
        <h3 >Jean Forteroche</h3>
	</div>
	<h3 class="titre">Modifier le billet</h3> 
</header>
	
<section>
	<a href="../public/index.php?route=espaceAdmin" class="Admin">Retour la liste des billets</a>
	<div class="formulaire">
    	<form method="post" action="../public/index.php?route=modifierBillet">
        	<label for="title">Titre</label><br>
        	<input type="text" id="title" name="title" value="<?= htmlspecialchars_decode($billet->getTitle());?>"><br>
        	<label for="content">Texte</label><br>
        	<textarea id="mytextarea" name="content"><?= htmlspecialchars_decode($billet->getContent());?></textarea><br>
        	<input type="hidden" value="<?php echo $billet->getId()?>" name="idBillet">       	     
            <input type="submit" value="Envoyer" id="submit" name="submit">
    	</form>    	
	</div>
	
</section>
