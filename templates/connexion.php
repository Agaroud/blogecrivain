<?php
$this->title = "connexion";
?>
<header></header>
	<div class="entete">
        <h2 >Veuillez renseigner votre login et mot de passe</h2>        
	</div>
</header>
	
<section>
	<div class="formulaire">
    	<form method="post" action="../public/index.php?route=espaceAdmin">
        	<label for="login">Login</label><br>
        	<input type="text" id="login" name="login" value="<?php
            if(isset($post['login'])){
                echo $post['login'];}
            ?>"><br>
        	<label for="mp">Mot de passe</label><br>
        	<input type="text" id="mp" name="mp" value="<?php
            if(isset($post['mp'])){
                echo $post['mp'];}
            ?>"><br><br>        
        
        	<input type="submit" value="Envoyer" id="submit" name="submit">
    	</form>
    	<a href="../public/index.php?route=voirbillets" class="voirbillet">Voir la liste des billets</a>
	</div>
</section>