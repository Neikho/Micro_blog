<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');

	// Inclure la librairie smarty
	require_once('vendor/smarty/Smarty.class.php');

	// Instancier notre objet smarty
	$oSmarty = new Smarty();

	// Affecter la valeur "Bonjour le monde" à la varaible SMARTY 'hello_world'
	$oSmarty->assign('hello_world', 'Bonjour le monde');

  // Fonction pour vérifier si l'utilisateur qui essaye de se connecter est en BDD
  if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pwd']) && !empty($_POST['pwd']))
  {
	    $query = 'SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':pseudo', $_POST['pseudo']);
    $prep->bindValue(':mdp', $_POST['pwd']);
    $prep->execute();
    $res=$prep->fetch();
    $count = $prep->rowCount();

    // Si oui on lui affecte un cookie
    if($count >0)
    {
    	$sid = md5($_POST['pseudo'].time());
    	$queryb = 'UPDATE utilisateurs SET SID = :sid WHERE pseudo = :pseudo AND mdp = :mdp';
    	$prepb = $pdo->prepare($queryb);
    	$prepb->bindValue(':sid', $sid);
    	$prepb->bindValue(':pseudo', $_POST['pseudo']);
    	$prepb->bindValue(':mdp', $_POST['pwd']);
    	$prepb->execute();
    	setcookie('pseudo', $sid, time() + 60*5, null, null, false, true);

    	header('Location: http://localhost/micro_blog/index.php');
	}
	else
	{
		$oSmarty->assign('userInval', 'true');
	}
  }
  // Provoque le rendu du template
	$oSmarty->display('templates/connexion.tpl');
  include('includes/bas.inc.php');
?>
