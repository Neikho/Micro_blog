<?php
  // Inclure la librairie smarty
  require_once('vendor/smarty/Smarty.class.php');

  // Instancier notre objet smarty
  $oSmarty = new Smarty();

  $oSmarty->display('templates/bas.inc.tpl');
?>