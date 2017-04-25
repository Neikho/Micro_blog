$(function()
{
	$('#message').click(function()
	{
		$('#previsu').css('display', 'block');
		$('#message').keyup(function()
		{
			var contenumessage = $('#message').val();
			$('#previsu').html(contenumessage);

			$.get({
	            url : 'previsualisation.php', // La ressource ciblée
	            data : {acheck : contenumessage}, //donnée envoyée
	            dataType : 'html', // Le type de données à recevoir, ici, du HTML.
	            success : function(retour, statut){
	                window.console.log(retour);
	                $('#previsu').html(retour);	
	            },
	            error : function(resultat, statut, erreur){
	            },
	            complete : function(resultat, statut){
	            }
          	});

		});		
	});
});

// Script de vérification si les champs de connexion ne sont pas vide
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