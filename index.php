<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');
?>

<?php
    $current = time();
    if(isset($_GET['id']) && isset($_POST['message']))
    {
        $queryupdate = $pdo->prepare("UPDATE messages SET contenu=(:contenuup), creation=(:modif) WHERE id=:amaj");
        $queryupdate->bindValue(':amaj', $_GET['id']);
        $queryupdate->bindValue(':modif', $current);
        $queryupdate->bindValue(':contenuup', $_POST['message']);
        $queryupdate->execute();
        header('Location: http://localhost/micro_blog/index.php');
    }
?>

<?php
    if(isset($_GET['idsupp']) && !empty($_GET['idsupp']))
    {
        $querysupp = $pdo->prepare("DELETE FROM messages WHERE id=:asupp");
        $querysupp->bindValue(':asupp', $_GET['idsupp']);
        $querysupp->execute();
    }
?>

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
    $selectAll = $pdo->query('SELECT * FROM messages');
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
    <a href="index.php?idsupp=<?php echo $data['id']; ?>" class="bout"><button class="btn btn-danger btn-sm">Supprimer</button></a>
    <a href="index.php?id=<?php echo $data['id']; ?>" class="bout"><button class="btn btn-warning btn-sm">Modifier</button></a>
     
</blockquote>
<?php
    }
?>

<?php include('includes/bas.inc.php'); ?>
