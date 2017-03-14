<?php
  // Inclure la librairie smarty
  require_once('vendor/smarty/Smarty.class.php');

  // Instancier notre objet smarty
  $oSmarty = new Smarty();

  if($connecte == false)
  {
    $oSmarty->assign('deconnecte', 'true');
  }
  $oSmarty->display('templates/haut.inc.tpl');
?>
