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
$req = "select NomUser, PrenomUser,Login, Password, TelephoneUser, AdresseUser,  IdRole from users where idUser='".$Id."'";
$res = requete_ligne($req);
		
$err="";
if(isset($IdU) && isset($nom) && isset($prenom) && isset($login) && isset($IdRole)
	&& !empty($IdU) && !empty($nom) && !empty($prenom) && !empty($login) && !empty($IdRole) ) {
		$req = "update users set NomUser = '".$nom."', PrenomUser = '".$prenom."', login = '".$login."', IdRole = '".$IdRole."'";
		if( isset($pass) && !empty($pass))	 
			$req .= ", Password = '".$pass."'";
		if( isset($telephone) && !empty($telephone))	 
			$req .= ", TelephoneUser = '".$telephone."'";
		if( isset($adresse) && !empty($adresse))	 
			$req .= ", AdresseUser = '".$adresse."'";
		$req .= " where idUser='".$IdU."'";
		//echo $req;
		$r = requete_execute($req);
		echo "<script>document.location = 'liste.php'</script>";
		exit();
}
elseif(isset($IdE)){
			$err = "Veuillez saisir tous les champs !";
		}
?><center>
	<h2 class="title">Modifier Utilisateur</h2>
	<form action="" method="post">
	<input type="hidden" name="IdU" value="<?php echo $Id?>">
	<table>
	<tr><td>Nom : </td><td><input type="text" name="nom" value="<?php echo $res[0]?>" size="70"></td></tr>
	<tr><td>Pr&eacute;nom : </td><td><input type="text" name="prenom" value="<?php echo $res[1]?>" size="70"></td></tr>
	<tr><td>Login : </td><td><input type="text" name="login" value="<?php echo $res[2]?>" size="70"></td></tr>
	<tr><td>Mot de passe : </td><td><input type="password" name="pass" value="" size="70"></td></tr>
	<tr><td>Telephone : </td><td><input type="text" name="telephone" value="<?php echo $res[4]?>" size="70"></td></tr>
	<tr><td>Adresse : </td><td><textarea name="adresse" cols="53"><?php echo $res[5]?></textarea></td></tr>
	<tr><td>Role : </td><td>
	<Select name="IdRole">
		<?php
			$req = "select IdRole, NomRole from Role";
			$tab = requete_retour($req);
			for($i=0;$i<count($tab);$i++){
				$selected = ($tab[$i][0]==$res[6]) ? "selected" : "";
				echo "<Option value='".$tab[$i][0]."' ".$selected .">".$tab[$i][1]."</Option>";
			}
		?>
	</Select>
	<tr><td colspan=2 align="center"><input type="submit" value="Modifier"><button type="button" onclick="document.location='liste.php';">Retour</button></td></tr>
	<tr><td colspan=2 align="center"><?php echo $err;?></td></tr>
	</table>
	</form></center>
</body>
</html>