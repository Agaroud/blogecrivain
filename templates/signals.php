<?php
$this->title = "Signals";
?>


  <header>
    <div class="entete">
        <h1 >Billet simple pour l'Alaska</h1>
        <h3 >Jean Forteroche</h3>
    </div>
    <h3 class="titre">Commentaires signalés</h3> 
  </header>
  
    <?php
            if(isset($_SESSION['suppr_comment'])) {
            echo '<p class="notification">'.$_SESSION['suppr_comment'].'</p>';
            unset($_SESSION['suppr_comment']);
            }
            
            if(isset($_SESSION['designal_comment'])) {
                echo '<p class="notification">'.$_SESSION['designal_comment'].'</p>';
                unset($_SESSION['designal_comment']);
            }        
            
    ?>
    
  <section>
  	<a href="../public/index.php?route=espaceAdmin" class="Admin">Retour aux billets</a><br> 

    
        
        <?php
        foreach ($comments as $comment)
        {
        ?>
        <div class="commentaires">
            <h4 ><?= htmlspecialchars($comment->getPseudo());?></h4>
            <p><?= htmlspecialchars_decode($comment->getContent());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        </div>
        <form method="post" action="../public/index.php?route=supprimeComment" onSubmit="return verif()">
            <input type="hidden" value="<?php echo $comment->getId()?>" name="idComment">
           	<a href="../public/index.php?route=designalComment&amp;idComment=<?= htmlspecialchars($comment->getId());?>" id="designal" >Désignaler</a>
            <input type="submit" value="Supprimer" id="supprimer" name="supprimer">
            
        </form>
        
        <?php
        }        
        ?>   
    
  </section>
  