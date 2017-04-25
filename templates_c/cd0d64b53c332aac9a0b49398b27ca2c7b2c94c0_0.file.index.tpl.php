<?php
/* Smarty version 3.1.30, created on 2017-03-29 18:47:45
  from "/var/www/html/micro_blog/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dbe53199e053_37891291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd0d64b53c332aac9a0b49398b27ca2c7b2c94c0' => 
    array (
      0 => '/var/www/html/micro_blog/templates/index.tpl',
      1 => 1490806059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dbe53199e053_37891291 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/micro_blog/vendor/smarty/plugins/modifier.date_format.php';
?>
<!-- si utilisateur est connecté -->
<?php if (isset($_smarty_tpl->tpl_vars['userConnecte']->value) && $_smarty_tpl->tpl_vars['userConnecte']->value == 1) {?>
  <p>
    <div class="row">
      <!-- Si aucune id pour modifier est dans l'url alors on envoi vers la page qui va inserer le message en BDD !-->
      <form method="post"
      <?php if (isset($_smarty_tpl->tpl_vars['urlId']->value) && $_smarty_tpl->tpl_vars['urlId']->value == 'false') {?>
        action="messages.php"
      <?php }?>>
          <div class="col-sm-10">
              <div class="form-group">
                  <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if (isset($_smarty_tpl->tpl_vars['tab']->value)) {
echo $_smarty_tpl->tpl_vars['tab']->value;
}?></textarea>
              </div>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-lg">
                  <!-- Si un id est passé en get on affiche le bouton modifier sinon envoyer !-->
                <?php if (isset($_smarty_tpl->tpl_vars['urlId']->value) && $_smarty_tpl->tpl_vars['urlId']->value == 'false') {?>
                  Envoyer
                <?php } else { ?>
                  Modifier
                <?php }?>
              </button>
          </div>
      </form>
    </div>
  </p>
  <p id="previsu"></p>
<?php }
$_smarty_tpl->_assignInScope('compteur', 0);
if (isset($_smarty_tpl->tpl_vars['tabGlobal']->value) && !empty($_smarty_tpl->tpl_vars['tabGlobal']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabGlobal']->value, 'liste');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['liste']->value) {
?>
        <!-- Affichage des infos et du message !-->
    <blockquote>
      <?php echo $_smarty_tpl->tpl_vars['tabGlobal']->value[$_smarty_tpl->tpl_vars['compteur']->value][1];?>
 , message écrit par: <?php echo $_smarty_tpl->tpl_vars['tabGlobal']->value[$_smarty_tpl->tpl_vars['compteur']->value][2];?>
 le: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['liste']->value[2],"%A, %B %e, %Y");?>

      <!-- <span class="infostemps">
      <br/>
      <?php echo '<?php
          ';?>$crea = $data['creation'];
          echo "Crée le : ".date('d/m/Y', $crea)." par ".$data['pseudo'];
      <?php echo '?>';?>
      <br/>
      <?php echo '<?php
          ';?>echo " Modifié le : ".date('H:i:s', $crea);
      <?php echo '?>';?>
    </span> -->

      <!-- Si user connecte alors on afficher les boutons de suppression de modification !-->
      <?php if (isset($_smarty_tpl->tpl_vars['userConnecte']->value) && $_smarty_tpl->tpl_vars['userConnecte']->value == 1) {?>
          <a href="index.php?idsupp=<?php echo $_smarty_tpl->tpl_vars['tabGlobal']->value[$_smarty_tpl->tpl_vars['compteur']->value][0];?>
" class="bout"><button class="btn btn-danger btn-sm">Supprimer</button></a>
          <a href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['tabGlobal']->value[$_smarty_tpl->tpl_vars['compteur']->value][0];?>
" class="bout"><button class="btn btn-warning btn-sm">Modifier</button></a>
      <?php }?>
    </blockquote>
    <?php $_smarty_tpl->_assignInScope('compteur', $_smarty_tpl->tpl_vars['compteur']->value+1);
?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php } else { ?>
  Tableau vide
<?php }?>

<!-- pagination -->
<div id="pagination">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li>
        <a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['pagePrec']->value;?>
" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
        <li><a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
      <?php }
}
?>

      <li>
        <a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['pageSuiv']->value;?>
" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>


<?php }
}
