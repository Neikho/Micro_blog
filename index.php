<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');
?>

<?php
    if(isset($_GET['id']) && isset($_POST['message'])){
        $queryupdate = $pdo->prepare("UPDATE messages SET contenu=(:contenuup) WHERE id=:amaj");
        $queryupdate->bindValue(':amaj', $_GET['id']);
        $queryupdate->bindValue(':contenuup', $_POST['message']);
        $queryupdate->execute();
        header('Location: http://localhost/micro_blog/index.php');
    }
?>

<?php
    if(isset($_GET['idsupp']) && !empty($_GET['idsupp'])){
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
                        $requete = $pdo->prepare("SELECT contenu FROM messages WHERE id=:contenuZ");
                        $requete->bindValue(':contenuZ', $_GET['id']);
                        $requete->execute();
                        $data=$requete->fetch();
                    }   
                ?>
                <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if (isset($requete)){echo $data['contenu'];} ?></textarea>
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

    $query = 'SELECT * FROM messages';
    $stmt = $pdo->query($query);
    while ($data = $stmt->fetch()) {
?>
<blockquote>
    <input type="hidden" name="id" value="<?php $data['id'] ?>">
	<?= $data['contenu'] ?>
     <a href="index.php?id=<?php echo $data['id']; ?>"><button class="btn btn-warning btn-xs">Modifier</button></a>
     <a href="index.php?idsupp=<?php echo $data['id']; ?>"><button class="btn btn-danger btn-xs">Supprimer</button></a>
</blockquote>
<?php
    }
?>

<?php include('includes/bas.inc.php'); ?>
