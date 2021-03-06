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
    <script src="js/jquery-3.1.1.js"></script>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                    {if isset($deconnecte) and $deconnecte == 'true'}
                      <li>
                        <a href="inscription.php">Inscription</a>
                      </li>
                    {/if}
                    <li class="page-scroll">
                    {if isset($deconnecte) and $deconnecte == 'true'}
                      <a href="connexion.php">Connexion</a>
                    {else}
                      <a href="deconnexion.php">Déconnexion</a>
                    {/if}
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
