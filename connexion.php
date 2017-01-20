<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');

    if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pwd']) && !empty($_POST['pwd'])){
  	    $query = 'SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp';
	    $prep = $pdo->prepare($query);
	    $prep->bindValue(':pseudo', $_POST['pseudo']);
	    $prep->bindValue(':mdp', $_POST['pwd']);
	    $prep->execute();
	    $res=$prep->fetch();
	    $count = $prep->rowCount();

	    if($count >0){
	    	echo 'BIENVENUE';
	    	$sid = md5($_POST['pseudo'].time());
	    	echo $sid;
	    	$queryb = 'UPDATE utilisateurs SET SID = :sid WHERE pseudo = :pseudo AND mdp = :mdp';
	    	$prepb = $pdo->prepare($queryb);
	    	$prepb->bindValue(':sid', $sid);
	    	$prepb->bindValue(':pseudo', $_POST['pseudo']);
	    	$prepb->bindValue(':mdp', $_POST['pwd']);
	    	$prepb->execute();

	    	setcookie('pseudo', $sid, time() + 60*5, null, null, false, true);

	    	header('Location: http://localhost/micro_blog/index.php'); 
		}
		else{
			echo 'Utilisateur inconnu';
		}
    }
?>

<div id="notif" class="hidden">
    
</div>

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

<?php include('includes/bas.inc.php'); ?>

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
</script>