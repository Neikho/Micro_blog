<?php
	include('includes/connexion.inc.php');
?>

<?php
	$current = time();

	// Fonction pour insérer un nouveau message dans la BDD
	if (isset($_POST['message']) && !empty($_POST['message']) && $connecte==true) 
	{
	    $query = 'INSERT INTO messages (contenu,creation,user_id) VALUES (:contenu,:crea,:utilisateur)';
	    $prep = $pdo->prepare($query);
	    $prep->bindValue(':contenu', $_POST['message']);
	    $prep->bindValue(':crea', $current);
	    $prep->bindValue(':utilisateur', $id_user);	
	    $prep->execute();
	    header('Location: http://localhost/micro_blog/index.php');
	}
?>

