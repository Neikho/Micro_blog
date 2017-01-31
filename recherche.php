<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');

    // Si on a une demande de recherche alors on va chercher le contenu succeptible d'être interessant 
    if(isset($_POST['recherche']) && !empty($_POST['recherche']))
    {
        $query = 'SELECT contenu, user.pseudo, mess.creation FROM messages mess INNER JOIN utilisateurs user ON mess.user_id = user.id WHERE contenu LIKE "%":cherche"%" ';
        $recherche = $pdo->prepare($query);
        $recherche->bindValue(':cherche', $_POST['recherche']);
        $recherche->execute();
        $nbRes = $recherche->rowcount();

        // On affiche le message et infos complémentaires
        if($nbRes>0)
        {
         	foreach ($recherche as $key) 
         	{
        		echo "<br/>Message: <br/>".$key['contenu']."<br/>";
        		echo " Par : ".$key['pseudo']." le : ".date('d/m/Y', $key['creation']);
        		echo "<br/>";       	
        	}
        }
        else
        {
        	echo "Aucun resultat trouvé désolé.";
        }
        
    }
?>
<?php include('includes/bas.inc.php'); ?>

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