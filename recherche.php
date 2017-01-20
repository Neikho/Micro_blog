<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');

    if(isset($_POST['recherche']) && !empty($_POST['recherche']))
    {
        $query = 'SELECT contenu, user.pseudo, mess.creation FROM messages mess INNER JOIN utilisateurs user ON mess.user_id = user.id WHERE contenu LIKE "%":cherche"%" ';
        $recherche = $pdo->prepare($query);
        $recherche->bindValue(':cherche', $_POST['recherche']);
        $recherche->execute();
        $nbRes = $recherche->rowcount();

        if($nbRes>0)
        {
         	foreach ($recherche as $key) {
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