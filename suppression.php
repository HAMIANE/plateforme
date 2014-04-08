<?php
$workD = "";
$documentToCall = "Document";
include($workD."include/verifConnect.php");
?>
<!DOCTYPE html>

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
-->
</style></head>

<body>
<?php
extract($_POST);
if(!isset($_GET['id']))
	exit();
$Id=$_GET['id'];
$req = "SELECT `nom_utilisateur`, `prenom_utilisateur`, `login` FROM `utilisateur` WHERE `ID_utilisateur`=1";
$res = requete_ligne($req);
		
if(isset($IdU) && !empty($IdU)){
		$req = "delete from Users where idUser='".$IdU."'";
		$r = requete_execute($req);
		echo "<script>document.location = 'list.php'</script>";
		exit();
}
?>


	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
								<h1><img src="images/logo-1.gif" width="45" height="40"><strong><strong>Learn On Line</strong></strong></h1>
					<ul>
						<li><a href="index.html" ><strong>Home</strong></a></li>
						<li><a href=""><strong>About </strong></a></li>
						<li><a href="index-1.html"><strong>Cours</strong></a></li>
						<li><a href="se connecter.php" ><strong>se connecter</strong></a></li>
					</ul>
				</div>
			</div><!-- -->
		</nav>
		<section class="adv-content">
			<div class="container">
				<ul class="breadcrumbs">
					<li></li>
				</ul>
				<form action="" id="search-form" >
					<fieldset>
					</fieldset>
				</form>
			</div>
		</section><div class="ic"></div>
	</header>
	<section id="content">
	  <div class="top">
	    <div class="container">
	      <div class="wrapper">
	        <div class="grid3 first">
	          <ul class="categories">
	             <li><a href="index.html"><strong>Home</strong></a></li>
		          <li><a href="list.php"><strong>Gestion des Utilisateurs</strong></a><a href="ajout.php"><strong>Gestion des Roles</strong></a></li>
		          <li><a href=""><strong>Espace Formation</strong></a></li>
		          <li><a href="deconnect.php"><strong>About Us</strong></a></li>
              </ul>
	        </div>
	        <center>
	        <form action="" method="get">
              <p>
	  <input type="hidden" name="IdU" value="<?php echo $Id?>">
	  </p>
	<table width="508" height="292" background="images/bg_top2.jpg" class="formulaire2">
	  <tr>
	    <td height="31" colspan="2">&nbsp;</td>
	    </tr>
	  <tr>
	  <td height="47" colspan="2"><div align="center"><span class="title">Supprimer Utilisateur</span></div></td>
	  </tr>
	<tr><td width="92"><div align="center">Login : </div></td><td width="398"><input type="text" name="abrev" value="<?php echo $res[2]?>" readOnly="readOnly"></td></tr>
	<tr><td><div align="center">Nom : </div></td><td><input type="text" name="nom" value="<?php echo $res[0]?>" readOnly="readOnly"></td></tr>
	<tr><td height="61"><div align="center">Prenom : </div></td><td><input type="text" name="abrev" value="<?php echo $res[1]?>" readOnly="readOnly"></td></tr>
	<tr><td height="69" colspan=2 align="center"><input type="submit" value="Supprimer"><button type="button" onClick="document.location='list.php';">Retour</button></td></tr>
	</table>
	</form></center>
               <p><br/>
               </p>
               <p>&nbsp;</p>
               <p>&nbsp;</p>
               <p>&nbsp;</p>
               <p><br/>
               </p>
<section class="images"></section>
	        <div align="right"></div>
          </div>
          </div>
	  </div>
	  <section class="images"></section>
	          </div>
	        </div>
	      </div>
		</div>
		<div class="middle"></div>
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