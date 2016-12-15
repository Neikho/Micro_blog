<?php
    include('includes/connexion.inc.php');
    include('includes/haut.inc.php');
?>

<form method="post">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email">
	</div>
	<div class="form-group">
		<label for="pwd">Password:</label>
		<input type="Password" class="form-control" id="pwd">
	</div>
	<div class="checkbox">
		<label><input type="checkbox">Remember me</label>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<?php include('includes/bas.inc.php'); ?>