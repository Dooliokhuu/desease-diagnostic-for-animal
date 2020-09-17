<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php
	require_once "header.php";
		if ($_SESSION["loggedIn"] = false){
			require_once 'asset/functions/content.php';
		} else {
			require_once 'asset/functions/login.php';
		};
		require_once 'footer.php'; 
	?>
</html>