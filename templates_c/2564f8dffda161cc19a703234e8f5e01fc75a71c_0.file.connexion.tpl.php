<?php
/* Smarty version 3.1.30, created on 2017-03-29 18:47:49
  from "/var/www/html/micro_blog/templates/connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dbe5352062b6_72071396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2564f8dffda161cc19a703234e8f5e01fc75a71c' => 
    array (
      0 => '/var/www/html/micro_blog/templates/connexion.tpl',
      1 => 1490806061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dbe5352062b6_72071396 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Div pour le message d'erreur !-->
<div id="notif" class="hidden">
</div>
<?php if (isset($_smarty_tpl->tpl_vars['userInval']->value) && $_smarty_tpl->tpl_vars['userInval']->value == 'true') {?>
  <div class='alert alert-danger'><p>Utilisateur non reconnu!</p></div>
<?php }?>
<!-- Formulaire pour se connecter !-->
<form method="post" action="connexion.php" id="connex">
	<div class="form-group">
  	<label for="exampleInputName2">Pseudo</label>
  	<input type="text" class="form-control" id="login" placeholder="Thanos" name="pseudo">
	</div>
<div class="form-group">
	<label for="pwd">Password:</label>
	<input type="Password" class="form-control" id="pwd" name="pwd">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>


<?php }
}
