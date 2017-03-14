<?php
/* Smarty version 3.1.30, created on 2017-01-31 18:45:41
  from "/var/www/html/micro_blog/includes/haut.inc.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5890cd45243092_35701898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5c17841996c28bf3de51c33858767de24c53e56' => 
    array (
      0 => '/var/www/html/micro_blog/includes/haut.inc.php',
      1 => 1485884427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890cd45243092_35701898 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
  ';?>// Inclure la librairie smarty
  require_once('/var/www/html/micro_blog/vendor/smarty/Smarty.class.php');

  // Instancier notre objet smarty
  $oSmarty = new Smarty();

  if($connecte == false)
  {
    $oSmarty->assign('deconnecte', 'true');
  }
<?php echo '?>';
}
}
