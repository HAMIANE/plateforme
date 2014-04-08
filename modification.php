<?php
include("include/connection.php");
include("include/userConnect.php");


?>

<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery-ui-1.8.5.custom.css" type="text/css" media="all">
	<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-image: url(images/body-bg.gif);
}
#content .top .container .wrapper .grid9 h2 {
	color: #000;
}
#content .top .container .wrapper .grid9 p strong {
	color: #000;
}
#content .top .container .wrapper .grid9 p strong {
	color: #000;
}
#content .top .container .wrapper .connect tr td .TitleC h2 {
	color: #FFF;
}
#content .top .container .wrapper #frmMain table tr td {
	color: #000;
}
#content .top .container .wrapper .container .wrapper center #frmMain table tr td {
	color: #0080FF;
}
-->
</style></head>

<body>

	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
								<h1><img src="images/logo-1.gif" width="45" height="40"><strong><strong>Learn On Line</strong></strong></h1>
				  <div class="container">
		  <ul class="breadcrumbs">
					    <li></li>
				      </ul>
					  <form action="" id="search-form">
					    <fieldset>
				        </fieldset>
				      </form>
				  </div>
			
					<ul>
					  <li><a href="index" ><strong>Home</strong></a></li>
						<li><a href=""><strong>About </strong></a></li>
						<li><a href="Type_cours.php"><strong>Cours</strong></a></li>
						<li><a href="se-connecter.php"><strong>se connecter</strong></a></li>
				  </ul>
			  </div>
			</div>
		</nav>
		<section class="adv-content"></section><div class="ic"></div>
	</header>
	<section id="content">
	  <div class="top">
	    <div class="container">
	      <div class="wrapper">
	        <div class="container">
	          <div class="wrapper">
	            <div class="grid3 first">
	              <ul class="categories">
	                <li><a href="index.html"><strong>Home</strong></a></li>
		          <li><a href="list.php"><strong>Gestion des Utilisateurs</strong></a><a href="ajout.php"><strong>Gestion des Roles</strong></a></li>
		          <li><a href="Type_cours.php"><strong>Espace Formation</strong></a></li>
		          <li><a href="deconnect.php"><strong>About Us</strong></a></li>
                  </ul>
	            </div>
                 <?php
extract($_POST);
if(!isset($_GET['id']))
	exit();
$Id=$_GET['id'];
$ID_utilisateur='1';
$req = "select `nom_utilisateur`, `prenom_utilisateur`, `adresse`, `login`, `password`,`telephone`, `ID_role` from utilisateur where ID_utilisateur='".$Id."'";
$res = requete_ligne($req);
$err="";
if(isset($IdU) && isset($nom) && isset($prenom) && isset($login) && isset($IdRole)
	&& !empty($IdU) && !empty($nom) && !empty($prenom) && !empty($login) && !empty($IdRole) ) {
		$req = "update utilisateur set nom_utilisateur = '".$nom."', prenom_utilisateur = '".$prenom."', login = '".$login."', ID_role = '".$IdRole."'";
		if( isset($pass) && !empty($pass))	 
			$req .= ", password = '".$pass."'";
		if( isset($telephone) && !empty($telephone))	 
			$req .= ", telephone = '".$telephone."'";
		if( isset($adresse) && !empty($adresse))	 
			$req .= ", adresse = '".$adresse."'";
		$req .= " where ID_utilisateur='".$IdU."'";
		echo $req;
		$r = requete_execute($req);
		echo "<script>document.location = 'list.php'</script>";
		exit();
}
elseif(isset($IdU)){
			$err = "Veuillez saisir tous les champs !";
		}
?>
	          <center>
             

	<form action="" method="post">
	<input type="hidden" name="IdU" value="<?php echo $Id ?>">
	<table  class="formulaire3">
	<tr>
	  <td height="30" colspan="2">&nbsp;</td>
	  </tr>
	<tr>
	  <td height="58" colspan="2">
	<h2 align="center" class="title">Modifier Utilisateur</h2></td>
	  </tr>
	<tr><td width="104" height="51"><div align="center">Nom : </div></td><td width="405"><input type="text" name="nom" value="<?php echo $res[0]?>" size="70"></td></tr>
	<tr><td height="44"><div align="center">Pr&eacute;nom : </div></td><td><input type="text" name="prenom" value="<?php echo $res[1]?>" size="70"></td></tr>
	<tr><td height="39"><div align="center">Login : </div></td><td><input type="text" name="login" value="<?php echo $res[3]?>" size="70"></td></tr>
	<tr><td height="46"><div align="center">Mot de passe : </div></td><td><input type="password" name="pass" value="<?php echo $res[4]?>" size="70"></td></tr>
	<tr><td height="42"><div align="center">Telephone : </div></td><td><input type="text" name="telephone" value="<?php echo $res[5]?>" size="70"></td></tr>
	<tr>
	  <td height="79"><div align="center">Adresse: </div></td><td><textarea name="e_mail" cols="53"><?php echo $res[2]?></textarea></td></tr>
	<tr><td height="57"><div align="center">Role : </div></td><td>
	<Select name="IdRole">
		<?php
			$req = "select ID_role, nom_role from role";
			$tab = requete_retour($req);
			for($i=0;$i<count($tab);$i++){
				$selected = ($tab[$i][0]==$res[1]) ? "selected" : "";
				echo "<Option value='".$tab[$i][0]."' ".$selected .">".$tab[$i][1]."</Option>";
			}
		?>
	</Select>
	</td></tr>
	<tr><td height="58" colspan=2 align="center"><input type="submit" value="Modifier"><button type="button" onClick="document.location='list.php';">
	Retour </button>
	  <div align="right"></div></td></tr>
	<?php if(strlen($err)) {?>
	<tr class="erreur"><td height="26" colspan=2 align="center"><?php ?></td></tr>
	<?php } ?>
	</table>
	<p>&nbsp;</p>
	</form></center> 
              </div>
            </div>
	      </div>
	    </div>
	  </div>
      </div>
	  <section class="images"></section>
	          </div>
	        </div>
	      </div>
		</div>
		<div class="middle">
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		</div>
		<div class="bottom"></div>
	</section>
	<footer></footer>
<script type="text/javascript">
		$(document).ready(function() {
			$('.pics').cycle({
				fx: 'toss',
				next:	 '#next', 
				prev:	 '#prev' 
			});
			
			// Datepicker
			$('#datepicker').datepicker({
				inline: true
			});
			
		});
	</script>
</body>
</html>