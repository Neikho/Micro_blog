<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');

// Insertion dans la BDD
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
}

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

<?php include('includes/bas.inc.php'); ?>

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