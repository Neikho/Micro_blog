<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');

    if(!isset($_GET['p']))
    {
        $_GET['p']=1;
    }

    $current = time();
    if(isset($_GET['id']) && isset($_POST['message']) && $connecte==true)
    {
        $queryupdate = $pdo->prepare("UPDATE messages SET contenu=(:contenuup), creation=(:modif) WHERE id=:amaj");
        $queryupdate->bindValue(':amaj', $_GET['id']);
        $queryupdate->bindValue(':modif', $current);
        $queryupdate->bindValue(':contenuup', $_POST['message']);
        $queryupdate->execute();
        header('Location: http://localhost/micro_blog/index.php');
    }

    if(isset($_GET['idsupp']) && !empty($_GET['idsupp']) && $connecte==true)
    {
        $querysupp = $pdo->prepare("DELETE FROM messages WHERE id=:asupp");
        $querysupp->bindValue(':asupp', $_GET['idsupp']);
        $querysupp->execute();
    }
?>


<p>
    <?php 
        if($connecte==true){
            echo "Bienvenue ".$pseudo_user;
    ?>
</p>
<div class="row">              
    <form method="post" <?php if(!isset($_GET['id'])) { ?> action="messages.php" <?php } ?>>
        <div class="col-sm-10">  
            <div class="form-group">
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
    
    $selectAllB = $pdo->query('SELECT * FROM messages');
    $selectAll = $pdo->query('SELECT * FROM messages LIMIT 2 OFFSET '.$offset.'');
    $selectAll->execute();
    $nbMess = $selectAllB->rowCount();
    $nb_page=ceil($nbMess/$message_par_page);

    while ($data = $selectAll->fetch()) 
    {
?>

<blockquote>
    <input type="hidden" name="id" value="<?php $data['id'] ?>">
	<?= $data['contenu'] ?>
    <span class="infostemps">
    <br/>
    <?php 
        $crea = $data['creation'];
        echo "Crée le : ".date('d/m/Y', $crea); 
    ?> <br/>
    <?php 
        echo " Modifié le : ".date('H:i:s', $crea); 
    ?>
    </span>
    <?php
        if($connecte==true){ ?>
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
            if(($_GET['p']-1)==0)
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
            { ?>
                <li><a href="index.php?p=<?php echo $page; ?>"><?php echo $page; ?></a></li>
            <?php } ?>
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
