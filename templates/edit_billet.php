<?php
$this->title = "Modifier un billet";
?>
<header>
	<div class="entete">
        <h1 >Billet simple pour l'Alaska</h1>
        <h3 >Jean Forteroche</h3>
	</div>
</header>

	<?php
            if(isset($_SESSION['add_billet'])) {
            echo '<p class="notification">'.$_SESSION['add_billet'].'</p>';
            unset($_SESSION['add_billet']);
            }
    ?>
<section>
	<a href="../public/index.php?route=espaceAdmin" class="Admin">Retour la liste des billets</a>
	<div class="formulaire">
    	<form method="post" action="../public/index.php?route=modifierBillet&amp;idBillet=<?php echo $billet->getId()?>">
        	<label for="title">Titre</label><br>
        	<input type="text" id="title" name="title" value="<?= htmlspecialchars_decode($billet->getTitle());?>"><br>
        	<label for="content">Texte</label><br>
        	<textarea id="mytextarea" name="content"><?= htmlspecialchars_decode($billet->getContent());?></textarea><br>
        	<input type="hidden" value="<?php echo $billet->getId()?>" name="idBillet">        	     
            <input type="submit" value="Envoyer" id="submit" name="submit">
    	</form>    	
	</div>
	
</section>
