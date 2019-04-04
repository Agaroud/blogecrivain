<?php
$this->title = "Ajouter un billet";
?>
<header>
	<div class="entete">
        <h1 >Billet simple pour l'Alaska</h1>
        <h3 >Jean Forteroche</h3>
	</div>
	<h3 class="titre">Ajouter un billet</h3> 
</header>

	<!--<?php
            if(isset($_SESSION['add_billet'])) {
            echo '<p class="notification">'.$_SESSION['add_billet'].'</p>';
            unset($_SESSION['add_billet']);
            }
    ?>-->
<section>
	<a href="../public/index.php?route=espaceAdmin" class="Admin">Retour la liste des billets</a>
	<div class="formulaire">
    	<form method="post" action="../public/index.php?route=rajoutBillet">
        	<label for="title">Titre</label><br>
        	<input type="text" id="title" name="title" value="<?php
            if(isset($post['title'])){
                echo $post['title'];}
            ?>"><br>
        	<label for="content">Texte</label><br>
        	<textarea id="mytextarea" name="content"><?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>      
            <input type="submit" value="Envoyer" id="submit" name="submit">
    	</form>    	
	</div>
	
</section>
