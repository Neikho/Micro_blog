<?php
	include('includes/connexion.inc.php');
?>

<?php
	if (isset($_POST['message']) && !empty($_POST['message'])) {
	    $query = 'INSERT INTO messages (contenu) VALUES (:contenu)';
	    $prep = $pdo->prepare($query);
	    $prep->bindValue(':contenu', $_POST['message']);
	    $prep->execute();
	    header('Location: http://localhost/micro_blog/index.php');
	}
?>

