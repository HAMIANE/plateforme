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
					<h1><strong>E-learning</strong></h1>
					<ul>
						<li><a href="index.html" ><strong>Home</strong></a></li>
						<li><a href="index05.html"><strong>About </strong></a></li>
						<li><a href="index-1.html"><strong>Cours</strong></a></li>
						<li><a href="se connecter.php" class="current"><strong>se connecter</strong></a></li>
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
	            <li><a href="modification.php"><strong>Home</strong></a></li>
	            <li><a href="utilisateur/ajout.php"><strong> Espace d'inscription</strong></a></li>
	            <li><a href="suppression.php"><strong>Gestion Des utilisateurs</strong></a></li>
	            <li><a href="#"><strong>Espace Formation</strong></a></li>
	            <li><a href="#"><strong>Formation à distance</strong></a></li>
	            <li><a href="#"><strong>About Us</strong></a></li>
              </ul>
            </div>
	        <p>&nbsp;</p>
		       
             <center>
	<h2 class="title">Liste des Documents</h2>
<?php
$req = "select ID_document, titre, dateinsertion from document 
		order by dateinsertion,titre";
$tab = requete_retour($req);
if(count($tab)==0)
	echo "aucun document dans la liste";
else
{

$dir = "../upload/";

?>
	
	<table class="liste" cellpadding=0 cellspacing=1 >
	<tr><th width="400">Titre</th><th width="100">Date d'ajout</th><th colspan=2>Actions</th></tr>
	<?php 
	for($i=0;$i<count($tab);$i++){
	?>
	<tr class="trListe">
	<td><?php echo $tab[$i][1]."&nbsp;"; ?></td>
	<td><?php echo $tab[$i][2]."&nbsp;"; ?></td>
	<td align="center" style="width: 30px"><a target ="_blank" href="modification.php?id=<?php echo $tab[$i][0]; ?>" title="Voir"><img src="./images/b_search.png" width="24" height="27" /></a></td>
	<td align="center" style="width: 30px">
	<?php if(haveDroit(11)) {?>
	<a href="suppression.php?id=<?php echo $tab[$i][0]; ?>" title="Supprimer"><img src="./images/b_drop.png" width="20" height="21" /></a>
	<?php } else {?>

	<?php } ?>
	</td>
	</tr>
	<?php
	}
	?>
	</table>
	</center>
<?php
}
?>
	        <section class="images"></section>
	        <div align="right">
	          <table width="613" height="0" border="0"   align="center" cellspacing="0" class="connect">
	            </table>
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