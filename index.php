<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');
setlocale (LC_TIME, 'fr_FR','fra');
  // Inclure la librairie smarty
	require_once('vendor/smarty/Smarty.class.php');

	// Instancier notre objet smarty
	$oSmarty = new Smarty();

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
  // si user connecté alors il peut modifier supprimer et envoyer des messages
  if($connecte==true)
  {
    $oSmarty->assign('userConnecte', $connecte);
  }
  if(!isset($_GET['id']))
  {
    $oSmarty->assign('urlId', 'false');
  }
  if (isset($selectContenu))
  {
    $oSmarty->assign('contenuPres', 'true');
  }
  if (isset($_GET['id']) && !empty($_GET['id']))
  {
    $selectContenu = $pdo->prepare("SELECT contenu FROM messages WHERE id=:contenuZ");
    $selectContenu->bindValue(':contenuZ', $_GET['id']);
    $selectContenu->execute();
    $data = $selectContenu->fetch();
    $data = $data['contenu'];
    $oSmarty->assign('tab', $data);
  }

  // Affichage du nombre de message en fonction des paramètres de page
  $message_par_page = 2;
  $offset = ($_GET['p']-1)*$message_par_page;

  // Selection en BDD des messages correspondants
  $selectAllB = $pdo->query('SELECT * FROM messages');
  $selectAll = $pdo->query('SELECT mess.*, user.pseudo FROM messages mess INNER JOIN utilisateurs user ON mess.user_id = user.id LIMIT 2 OFFSET '.$offset.'');
  $selectAll->execute();
  $nbMess = $selectAllB->rowCount();
  $nb_page=ceil($nbMess/$message_par_page);

  $array = array();
  while($messInsert = $selectAll->fetch())
  {
    array_push($array, $messInsert);
  }
  $oSmarty->assign('tabMessages', $array);

  if(($_GET['p']-1) <= 0)
  {
    $oSmarty->assign('pagePrec', $_GET['p']);
  }
  else
  {
    $oSmarty->assign('pagePrec', $_GET['p']-1);
  }
  if(($_GET['p']+1 >$nb_page))
  {
    $oSmarty->assign('pageSuiv', $_GET['p']);
  }
  else
  {
    $oSmarty->assign('pageSuiv', $_GET['p']+1);
  }
  $oSmarty->assign('pagination', $nb_page);

  // Provoque le rendu du template
  $oSmarty->display('templates/index.tpl');
  include('includes/bas.inc.php');
?>
