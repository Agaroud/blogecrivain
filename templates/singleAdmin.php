

<?php
$this->title = "Billet";
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
  	<a href="../public/index.php?route=espaceAdmin" class="Admin">Retour aux billets</a><br> 

    <div class="articles">
        <h2><?= htmlspecialchars_decode($billet->getTitle());?></h2>
        <p><?= htmlspecialchars_decode($billet->getContent());?></p>            
        <p>Créé le : <?= htmlspecialchars($billet->getDateAdded());?></p>
        
    </div>    
        
        <?php
        foreach ($comments as $comment)
        {
        ?>
        <div class="commentaires">
            <h4 ><?= htmlspecialchars($comment->getPseudo());?></h4>
            <p><?= htmlspecialchars_decode($comment->getContent());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        </div>
        <form method="post" action="../public/index.php?route=supprimeComment">
            <input type="hidden" value="<?php echo $comment->getId()?>" name="idComment">
            <input type="hidden" value="<?php echo $billet->getId()?>" name="idBillet">
            <input type="submit" value="Supprimer" id="supprimer" name="supprimer">
        </form>
        <?php
        }        
        ?>   
    
  </section>
  