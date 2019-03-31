<?php
session_start();
?>

<?php
$this->title = "Accueil";
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
  <a href="../public/index.php?" id="retourAcc">Retour à l'accueil</a>         
  </header>  
  <section>
        <?php 
        
        foreach ($billets as $billet)
        {
        ?>
            <div class="articles">
                <h2><?= htmlspecialchars_decode($billet->getTitle());?></h2>                
                <p><?= htmlspecialchars_decode($billet->getContent());?>...<a href="../public/index.php?route=billet&idBillet=<?= htmlspecialchars($billet->getId());?>" id="listeComment">(voir la suite)</a></p>                
                <p>Créé le : <?= htmlspecialchars($billet->getDateAdded());?></p>
            </div>
            <br>
        <?php
        }        
        ?>
  </section>
    
