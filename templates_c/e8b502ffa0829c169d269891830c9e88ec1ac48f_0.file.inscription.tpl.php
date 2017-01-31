<?php
/* Smarty version 3.1.30, created on 2017-01-31 14:45:56
  from "/var/www/html/micro_blog/templates/inscription.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58909514d974e3_63145085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8b502ffa0829c169d269891830c9e88ec1ac48f' => 
    array (
      0 => '/var/www/html/micro_blog/templates/inscription.tpl',
      1 => 1485870222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58909514d974e3_63145085 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Formulaire d'inscription !-->
<form method="post" action="inscription.php" id="inscrip">

	<div class="form-group">
  	<label for="inscripNom">Nom:</label>
  	<input type="text" class="form-control" id="nom" placeholder="Thanos" name="inscripNom">
	</div>
<div class="form-group">
	<label for="inscripPrenom">Prenom:</label>
	<input type="text" class="form-control" id="prenom" placeholder="De titan" name="inscripPrenom">
</div>
<div class="form-group">
	<label for="inscripPseudo">Pseudo:</label>
	<input type="text" class="form-control" id="pseudo" placeholder="Marvel" name="inscripPseudo">
</div>
<div class="form-group">
	<label for="inscripMail">Email:</label>
	<input type="email" class="form-control" id="mail" name="inscripMail">
</div>
<div class="form-group">
	<label for="inscripPass">Mot de passe:</label>
	<input type="Password" class="form-control" id="passInsc" name="inscripPass">
</div>

<button type="submit" class="btn btn-default">Submit</button>

</form>
<?php }
}
