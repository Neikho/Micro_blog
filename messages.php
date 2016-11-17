<?php
	include('includes/connexion.inc.php');
?>

<?php
	$current = time();
	if (isset($_POST['message']) && !empty($_POST['message'])) 
	{
	    $query = 'INSERT INTO messages (contenu,creation) VALUES (:contenu,:crea)';
	    $prep = $pdo->prepare($query);
	    $prep->bindValue(':contenu', $_POST['message']);
	    $prep->bindValue(':crea', $current);
	    $prep->execute();
	    header('Location: http://localhost/micro_blog/index.php');
	}
?>

