<?php
/* Smarty version 3.1.30, created on 2017-02-28 13:38:53
  from "/var/www/html/micro_blog/templates/haut.inc.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b56f5da99b08_66517696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '855731bb69aa8698b3a99c49e0f9fde62cf8b185' => 
    array (
      0 => '/var/www/html/micro_blog/templates/haut.inc.tpl',
      1 => 1488284918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b56f5da99b08_66517696 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Micro blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="js/jquery-3.1.1.js"><?php echo '</script'; ?>
>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" id="logo" href="index.php">Micro blog</a>
            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Barre de recheche !-->
                    <li id="barreRecherche">
                        <form method="post" action="recherche.php" id="submitForm">
                            <input type="text" class="form-control" name="recherche" id="rechercheInput" placeholder="Rechercher...">
                    </li>
                    <li id="boutonRecherche">
                        <button type="submit" class="btn btn-default">GO!</button>
                        </form>
                    </li>
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <!-- Affichage d'un bouton en fonction de l'utilisateur connecté ou non !-->
                    <?php if (isset($_smarty_tpl->tpl_vars['deconnecte']->value) && $_smarty_tpl->tpl_vars['deconnecte']->value == 'true') {?>
                      <li>
                        <a href="inscription.php">Inscription</a>
                      </li>
                    <?php }?>
                    <li class="page-scroll">
                    <?php if (isset($_smarty_tpl->tpl_vars['deconnecte']->value) && $_smarty_tpl->tpl_vars['deconnecte']->value == 'true') {?>
                      <a href="connexion.php">Connexion</a>
                    <?php } else { ?>
                      <a href="deconnexion.php">Déconnexion</a>
                    <?php }?>
                    </li> <br/>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Le fil</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
        <div id="notif" class="hidden">
        </div>


    </header>

    <!-- About Section -->
    <section>
        <div class="container">
<?php }
}
