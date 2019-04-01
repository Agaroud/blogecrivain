

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
    
        if(isset($_SESSION['signal_comment'])) {
            echo '<p class="notification">'.$_SESSION['signal_comment'].'</p>';
            unset($_SESSION['signal_comment']);
        }
    
    
            if(isset($_SESSION['add_comment'])) {
            echo '<p class="notification">'.$_SESSION['add_comment'].'</p>';
            unset($_SESSION['add_comment']);
            }
    ?>
    
  <section>

    <div class="articles">
        <h2><?= htmlspecialchars_decode($billet->getTitle());?></h2>
        <p><?= htmlspecialchars_decode($billet->getContent());?></p>            
        <p>Créé le : <?= htmlspecialchars($billet->getDateAdded());?></p>
         <br>
        <a href="../public/index.php?route=voirbillets" id="retourA" >Retour à la liste des billets</a>
    </div>        
       
    
   
    <div id="comments" class="formulaire" >
        <h3>Commentaires</h3>       

        <form method="post" action="../public/index.php?route=addComment&amp;idBillet=<?php echo $billet->getId()?>">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?php
             if(isset($post['pseudo'])){
                echo $post['pseudo'];}
            ?>"><br>
            <label for="content">Texte</label><br>
            <textarea id="mytextarea" name="content"><?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>

            <input type="submit" value="Envoyer" id="submit" name="submit">

        </form>   

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
        <form method="post" action="../public/index.php?route=signalComment">
            <input type="hidden" value="<?php echo $comment->getId()?>" name="idComment">
            <input type="hidden" value="<?php echo $billet->getId()?>" name="idBillet">
            <input type="submit" value="Signaler" id="signaler" name="signaler">
        </form>
        <?php
        }        
        ?>   
    
  </section>
  