<?php
	$pdo = new PDO('mysql:host=localhost;dbname=albathomasblog', 'root', 't815131s');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fonction si il y a un cookie pour recuperer certaines informations correspondantes et indiquer que quelqu'un est connecté en affectant la variable connecte a true
    if(isset($_COOKIE['pseudo'])){
        $query = 'SELECT pseudo, id FROM utilisateurs WHERE SID=:sid';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':sid', $_COOKIE['pseudo']);
        $prep->execute();
        $res=$prep->fetch();

        $nb = $prep->rowCount();

        if($nb>0){
        	$connecte = true;
        	$pseudo_user = $res['pseudo'];
            $id_user = $res['id'];
        }
        else{
        	$connecte = false;
        }
    }
    else{
    	$connecte = false;
    }
?>
