<?php
include("include/connection.php");
include("include/userConnect.php");
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
-->
</style></head>

<body>

	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><img src="images/logo-1.gif" width="45" height="40"><strong><strong>Learn On Line</strong></strong></h1>
					<ul>
						<li><a href="index.php" ><strong>Home</strong></a></li>
						<li><a href=""><strong>About </strong></a></li>
						<li><a href="liste.php"><strong>Cours</strong></a></li>
						<li><a href="se-connecter.php" ><strong>se connecter</strong></a></li>
					</ul>
				</div>
			</div>
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
		          <li><a href="index.php"><strong>Home</strong></a></li>
		          <li> <strong><a href="ajout.php">Espace membre</a></strong></li>
		
		        </ul>
		        <ul class="categories">
		          
		          <li><a href="deconnect.php"><strong>Deconexion</strong></a></li>
		        </ul>
            </div>
	        
	<?php
extract($_POST);
extract($_FILES);
$err="";
$msg="";
if(isset($nom) && isset($fichier) && !empty($nom) && !empty($fichier)  ) {

	$extension = end(explode(".", $fichier["name"]));
	$bName = basename($fichier["name"], ".".$extension); 
	$dir = "./upload/";
	if ($fichier["error"] > 0)
    {
		$err = "Erreur : " . $fichier["error"] . "<br>";
    }
	else
    {
		$nomFichier = $fichier["name"];
		$i=1;
		while(file_exists($dir . $nomFichier)){
			$i++;
			$nomFichier = $bName . "_" . $i . "." . $extension ;
		}
		
		move_uploaded_file($fichier["tmp_name"], $dir .  $nomFichier); 

		$IdU = IdUser();
		
		$req = "insert into document values('', '".$nom."','".$nomFichier."', SYSDATE(), '".$IdU."')";
		$r = requete_execute($req);
		if($r){
			$msg = "Fichier upload&eacute; avec succ&egrave;s<br>";	
			$msg .= "Nom : " . $nomFichier . "<br>";
			$msg .= "Taille: " . ($fichier["size"] / 1024) . " kB<br>";	
		}
		else{
			//unlink($dir . $nomFichier );
		}
    }
	
}
elseif(isset($submit)){
	$err = "Veuillez saisir tous les champs !";
}
?><center>
<form action="" method="post" name="frmMain" id="frmMain" enctype="multipart/form-data">
	<table border=0>
	<tr><td height="53">Titre : </td><td><input type="text" name="nom" size="70"></td></tr>
	<tr><td>Fichier : </td><td><input type="file" name="fichier" size="30"></td></tr>
	</td><td height="16"></tr>
	<tr><td colspan=2 align="center"><input type="submit" name="submit" value="Ajouter"><button type="button" onClick="document.location='liste.php';">Retour</button></td></tr>
	<?php if(strlen($err)) {?>
	<tr class="erreur"><td colspan=2 align="center"><?php echo $err;?></td></tr>
	<?php } if(strlen($msg)) {?>
	<tr class="message"><td colspan=2 align="center"><?php echo $msg;?></td></tr>
	<?php } ?>
	</table>
	</form>
</center>
	        <section class="images"></section>
	          </div>
	        </div>
	      </div>
		</div>
		<div class="middle">
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
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