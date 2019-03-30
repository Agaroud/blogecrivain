

<?php
$this->title = "AccueilAdmin";
?>

  <header>
    <div class="entete">
        <h1 >Billet simple pour l'Alaska</h1>
        <h3 >Jean Forteroche</h3>
    </div>
        <?php
			if(isset($_SESSION['add_billet'])) {
    		echo '<p class="notification">'.$_SESSION['add_billet'].'</p>';
    		unset($_SESSION['add_billet']);
            }
        ?>
       <div id="liens">
        <a href="../public/index.php?" id="retourAcc">Retour à l'accueil</a>
        <a href="../public/index.php?route=addBillet" class="ajoutbillet" id="ajoutdebillet">Ajouter un billet</a>
        <a href="../public/index.php?route=SignalList" id="listsignals">Voir les commentaires signalés(<?php  echo $comments;?>)</a>
       </div>
  </header>
  <section>
        <?php 
        
        foreach ($billets as $billet)
        {
        ?>
            <div class="articles">
                <h2><?= htmlspecialchars_decode($billet->getTitle());?></h2>                
                <p><?= htmlspecialchars_decode($billet->getContent());?>...</p>                
                <p>Créé le : <?= htmlspecialchars($billet->getDateAdded());?></p>
            </div>
            <br>
            
            	<form method="post" action="../public/index.php?route=supprimeBillet">
            		<input type="hidden" value="<?php echo $billet->getId()?>" name="idBillet">           	
            		<input type="submit" value="Supprimer" id="supprimeBillet" name="supprimeBillet">            	          	
        		</form>
        	 
        		<a href="../public/index.php?route=editeBillet&idBillet=<?= htmlspecialchars($billet->getId());?>" id="editer" >Editer</a>
            
        	<br>  
                       
        <?php
        }        
        ?>
  </section>
  
  
    
