 <?php
include($workD."include/connection.php");
include($workD."include/userConnect.php");

if(!isConnected()){
	echo "<script>document.location = 'se-connecter.php';</script>";
	exit();
}

?>