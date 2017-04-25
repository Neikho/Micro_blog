<?php 
	if(isset($_GET['acheck']))
	{
	    $regexMail = '/[a-z0-9_]+@[a-z0-9]+\.[a-z0-9]+/';
  		$regexTweet = '/#([a-z\d-]+)/';
  		$regexUrl = '/https?:\/\/[w{3}\.]*[a-z0-9_-]+\.[a-z]{2,3}/';

	    if(preg_match_all($regexMail,$_GET['acheck'],$out))
	    {
	      $messInsert = preg_replace($regexMail,'<a href="mailto:'.$out[0][0].'">'.$out[0][0].'</a>',$_GET['acheck']);
	    }
	    else if(preg_match_all($regexTweet,$_GET['acheck'],$out))
	    {
	      $messInsert = preg_replace($regexTweet,'<a href="recherche.php?seek='.$out[0][0].'">'.$out[0][0].'</a>',$_GET['acheck']);
	      //$out[1][0] #batman sans le #
	    }
	    else if(preg_match_all($regexUrl,$_GET['acheck'],$out))
	    {
	      $messInsert = preg_replace($regexUrl,'<a href="'.$out[0][0].'">'.$out[0][0].'</a>',$_GET['acheck']);
	    }
	    else
	    {
	      $messInsert = $_GET['acheck'];
	    }	
	    echo $messInsert; 		
	}
	else
	{
		echo ('echec');
	}
?>