<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');

  // Inclure la librairie smarty
	require_once('vendor/smarty/Smarty.class.php');

	// Instancier notre objet smarty
	$oSmarty = new Smarty();

	// Affecter la valeur "Bonjour le monde" à la varaible SMARTY 'hello_world'
	$oSmarty->assign('hello_world', 'Bonjour le monde');

	// Provoque le rendu du template
	$oSmarty->display('templates/inscription.tpl');

  // Insertion d'un nouvel utilisateur dans la BDD
  if(isset($_POST['inscripNom']) && isset($_POST['inscripPrenom']) && isset($_POST['inscripPseudo']) && isset($_POST['inscripMail']) && isset($_POST['inscripPass']) && !empty($_POST['inscripNom']) && !empty($_POST['inscripPrenom']) && !empty($_POST['inscripPseudo']) && !empty($_POST['inscripMail']) && !empty($_POST['inscripPass']))
  {
  	$query = 'INSERT INTO utilisateurs (nom,prenom,email,mdp,pseudo,SID) VALUES (:nom,:prenom,:email,:mdp,:pseudo,:sid)';
  	$insert = $pdo->prepare($query);
  	$insert->bindValue(':nom', $_POST['inscripNom']);
  	$insert->bindValue(':prenom', $_POST['inscripPrenom']);
  	$insert->bindValue(':pseudo', $_POST['inscripPseudo']);
  	$insert->bindValue(':email', $_POST['inscripMail']);
  	$insert->bindValue(':mdp', $_POST['inscripPass']);
  	$insert->bindValue(':sid', 5);
  	$insert->execute();

    echo "<div class='alert alert-success'><p>Inscription terminée avec succés!</p></div>";
  }
  include('includes/bas.inc.php');
?>

<!-- Script pour vérifier si des champs du formulaire sont manquants !-->
<script>
$(function(){
    $('#inscrip').submit(function(){
        var nom = $('#nom').val();
        var prenom = $('#prenom').val();
        var pseudo = $('#pseudo').val();
        var mail = $('#mail').val();
        var mdp = $('#passInsc').val();
        if(nom == "" || prenom == "" || pseudo == "" || mail == "" || mdp == "")
        {
            $('#notif').removeClass("hidden");
            $('#notif').addClass("alert alert-danger");
            $('#notif').slideDown("slow");
            $('#notif').html('<p>Champs manquants!</p>');
            return false;
        }
        else
        {
            return true;
        }
    });
});
</script>

<script>
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
</script>
