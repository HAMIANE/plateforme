<?php
$workD = "../";
$documentToCall = "Parent";
include($workD."include/verifConnect.php");
?>
<html>
<head>
<link rel="STYLESHEET" type="text/css" href="../style.css">
</head>
<body>
<?php
extract($_POST);
if(!isset($_GET['id']))
	exit();
$Id=$_GET['id'];
$req = "select titre, NomFichier from document where idDocument='".$Id."'";
$res = requete_ligne($req);
		
if(isset($IdD) && !empty($IdD)){
		$req = "delete from document where IdDocument='".$IdD."'";
		$r = requete_execute($req);
		
		$dir = "../upload/";
		if(isset($nomFichier) && !empty($nomFichier)){
			unlink($dir .  $nomFichier);
		}
		echo "<script>document.location = 'liste.php'</script>";
		exit();
}
?><center>
	<h2 class="title">Supprimer Document</h2>
	<form action="" method="post">
	<input type="hidden" name="IdD" value="<?php echo $Id?>">
	<input type="hidden" name="nomFichier" value="<?php echo $res[1]?>">
	<table>
	<tr><td>Titre : </td><td><input type="text" name="abrev" value="<?php echo $res[0]?>" readOnly="readOnly"></td></tr>
	<tr><td colspan=2 align="center"><input type="submit" value="Supprimer"><button type="button" onclick="document.location='liste.php';">Retour</button></td></tr>
	</table>
	</form></center>
</body>
</html>