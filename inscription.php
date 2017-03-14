<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');

  // Inclure la librairie smarty
	require_once('vendor/smarty/Smarty.class.php');

	// Instancier notre objet smarty
	$oSmarty = new Smarty();

	// Provoque le rendu du template
	$oSmarty->display('templates/inscription.tpl');

  // Insertion d'un nouvel utilisateur dans la BDD
  if(isset($_POST['inscripNom']) && isset($_POST['inscripPrenom']) && isset($_POST['inscripPseudo']) && isset($_POST['inscripMail']) && isset($_POST['inscripPass']) && !empty($_POST['inscripNom']) && !empty($_POST['inscripPrenom']) && !empty($_POST['inscripPseudo']) && !empty($_POST['inscripMail']) && !empty($_POST['inscripPass']))
  {
  	$query = 'INSERT INTO utilisateurs (nom,prenom,email,mdp,pseudo,SID) VALUES (:nom,:prenom,:email,:mdp,:pseudo,:sid)';
  	$insert = $pdo->prepare($query);
  	$insert->bindValue(':nom', $_POST['inscripNom']);
  	$insert->bindValue(':prenom', $_POST['inscripPrenom']);
  	$insert->bindValue(':pseudo', $_POST['inscripPseudo']);
  	$insert->bindValue(':email', $_POST['inscripMail']);
  	$insert->bindValue(':mdp', $_POST['inscripPass']);
  	$insert->bindValue(':sid', 5);
  	$insert->execute();
  }
  include('includes/bas.inc.php');
?>
