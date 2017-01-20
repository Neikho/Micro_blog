<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');

    // Si on est sur la page index on affecte p à 1 pour éviter tout problème sur clic page précédente
    if(!isset($_GET['p']))
    {
        $_GET['p']=1;
    }

    $current = time();

    //Fonction pour modifier un message si user connecté
    if(isset($_GET['id']) && isset($_POST['message']) && !empty($_POST['message']) && $connecte==true)
    {
        $queryupdate = $pdo->prepare("UPDATE messages SET contenu=(:contenuup), creation=(:modif) WHERE id=:amaj");
        $queryupdate->bindValue(':amaj', $_GET['id']);
        $queryupdate->bindValue(':modif', $current);
        $queryupdate->bindValue(':contenuup', $_POST['message']);
        $queryupdate->execute();
        header('Location: http://localhost/micro_blog/index.php');
    }

    //Fonction pour supprimer un message si user connecté
    if(isset($_GET['idsupp']) && !empty($_GET['idsupp']) && $connecte==true)
    {
        $querysupp = $pdo->prepare("DELETE FROM messages WHERE id=:asupp");
        $querysupp->bindValue(':asupp', $_GET['idsupp']);
        $querysupp->execute();
    }
?>


<p>
    <?php 
        // si user connecté alors il peut modifier supprimer et envoyer des messages
        if($connecte==true)
        {
            echo "Bienvenue ".$pseudo_user;
    ?>
</p>

<div class="row">      
    <!-- Si aucune id pour modifier est dans l'url alors on envoi vers la page qui va inserer le message en BDD !-->        
    <form method="post" <?php if(!isset($_GET['id'])) { ?> action="messages.php" <?php } ?>>
        <div class="col-sm-10">  
            <div class="form-group">
                <!-- Sinon on affiche le contenu du message correspondant a l'id passé en GET !--> 
                <?php
                    if (isset($_GET['id']) && !empty($_GET['id'])) 
                    {
                        $selectContenu = $pdo->prepare("SELECT contenu FROM messages WHERE id=:contenuZ");
                        $selectContenu->bindValue(':contenuZ', $_GET['id']);
                        $selectContenu->execute();
                        $data=$selectContenu->fetch();
                    }   
                ?>
                <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if (isset($selectContenu)){echo $data['contenu'];} ?></textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">
                <!-- Si un id est passé en get on affiche le bouton modifier sinon envoyer !--> 
                <?php
                    if(!isset($_GET['id']))
                    {
                        echo 'Envoyer';
                    }
                    else if(isset($_GET['id']))
                    {
                        echo 'Modifier';
                    }               
                ?>
            </button>
        </div>                        
    </form>
</div>
<?php 
        } 
?>
<!-- Affichage du nombre de message en fonction des paramètres de page !-->
<?php
    $message_par_page = 2;
    $offset = ($_GET['p']-1)*$message_par_page;
    
    // Selection en BDD des messages correspondants
    $selectAllB = $pdo->query('SELECT * FROM messages');
    $selectAll = $pdo->query('SELECT mess.*, user.pseudo FROM messages mess INNER JOIN utilisateurs user ON mess.user_id = user.id LIMIT 2 OFFSET '.$offset.'');    
    $selectAll->execute();
    $nbMess = $selectAllB->rowCount();
    $nb_page=ceil($nbMess/$message_par_page);

    while ($data = $selectAll->fetch()) 
    {
?>
<!-- Affichage des infos et du message !--> 
<blockquote>
    <input type="hidden" name="id" value="<?php $data['id'] ?>">
	<?= $data['contenu'] ?>
    <span class="infostemps">
    <br/>
    <?php 
        $crea = $data['creation'];
        echo "Crée le : ".date('d/m/Y', $crea)." par ".$data['pseudo']; 
    ?> 
    <br/>
    <?php 
        echo " Modifié le : ".date('H:i:s', $crea); 
    ?>
    </span>

    <!-- Si user connecte alors on afficher les boutons de suppression de modification !--> 
    <?php
        if($connecte==true)
            { 
    ?>
        <a href="index.php?idsupp=<?php echo $data['id']; ?>" class="bout"><button class="btn btn-danger btn-sm">Supprimer</button></a>
        <a href="index.php?id=<?php echo $data['id']; ?>" class="bout"><button class="btn btn-warning btn-sm">Modifier</button></a>   
    <?php 
            }
    ?>
</blockquote>
<?php
    }
?>

<!-- VISUEL PAGINATION !-->
<div id="pagination">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li>
          <a href="index.php?p=<?php 
            if(($_GET['p']-1)<=0)
              {
                echo $_GET['p'];
              }
              else
              {
                echo $_GET['p']-1; 
              }
            ?>"
          aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php
            for($page=1; $page <= $nb_page; $page++)
            { 
        ?>
                <li><a href="index.php?p=<?php echo $page; ?>"><?php echo $page; ?></a></li>
        <?php 
            } 
        ?>
        <li>
          <a href="index.php?p=<?php 
            if(($_GET['p']+1)>$nb_page)
              {
                echo $_GET['p'];
              }
              else
              {
                echo $_GET['p']+1; 
              }
            ?>"
          aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
</div>
<?php include('includes/bas.inc.php'); ?>

<script>
// Script de vérification si la recherche n'est pas vide
$(function(){
    $('#submitForm').submit(function(){
        var contenuRecherche = $('#rechercheInput').val();
        if(contenuRecherche == "")
        {
            $('#notif').removeClass("hidden");
            $('#notif').addClass("alert alert-danger");
            $('#notif').slideDown("slow");
            $('#notif').html('<p>Recherche vide!</p>');
            return false;
        }
        else
        {
            return true;
        }
    });
});
</script>
<script>
// Script de vérification si la recherche n'est pas vide
$(function(){
    $('#submitForm').submit(function(){
        var contenuRecherche = $('#rechercheInput').val();
        if(contenuRecherche == "")
        {
            $('#notif').removeClass("hidden");
            $('#notif').addClass("alert alert-danger");
            $('#notif').slideDown("slow");
            $('#notif').html('<p>Recherche vide!</p>');
            return false;
        }
        else
        {
            return true;
        }
    });
});
</script>