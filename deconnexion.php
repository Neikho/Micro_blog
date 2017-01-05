<?php
    setcookie('pseudo', '', time()-1, null, null, false, true);
	header('Location: http://localhost/micro_blog/index.php'); 
?>



