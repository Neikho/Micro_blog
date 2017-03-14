<?php
/* Smarty version 3.1.30, created on 2017-01-31 18:22:49
  from "/var/www/html/micro_blog/templates/connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5890c7e915cba9_21871975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2564f8dffda161cc19a703234e8f5e01fc75a71c' => 
    array (
      0 => '/var/www/html/micro_blog/templates/connexion.tpl',
      1 => 1485883366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890c7e915cba9_21871975 (Smarty_Internal_Template $_smarty_tpl) {
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

<!-- Script pour afficher un bandeau d'erreur !-->
<?php echo '<script'; ?>
>
$(function(){
	$('#connex').submit(function(){
		var contenulog = $('#login').val();
		var contenumdp = $('#pwd').val();
		if(contenulog == "" || contenumdp == "")
		{
  		$('#notif').removeClass("hidden");
  		$('#notif').addClass("alert alert-danger");
  		$('#notif').slideDown("slow");
  		$('#notif').html('<p>Champs manquants</p>');
  		return false;
		}
		else
		{
			return true;
		}
	});
});

// Script de vérification si la recherche n'est pas vide
$(function(){
  $('#submitForm').submit(function(){
    var contenuRecherche = $('#rechercheInput').val();
    if(contenuRecherche == "")
    {
      $('#notif').removeClass("hidden");
      $('#notif').addClass("alert alert-danger");
      $('#notif').slideDown("slow");
      $('#notif').html('<p>Recherche vide!</p>');
      return false;
    }
    else
    {
      return true;
    }
  });
});
<?php echo '</script'; ?>
>
<?php }
}
