<!-- Div pour le message d'erreur !-->
<div id="notif" class="hidden">
</div>
{if isset($userInval) and $userInval == 'true'}
  <div class='alert alert-danger'><p>Utilisateur non reconnu!</p></div>
{/if}
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
<script>
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
</script>
