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
