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
						<li><a href="se-connecter.php"><strong>se connecter</strong></a></li>
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
		          <li><a href="list.php"><strong>Espace membre</strong></a></li>
                 
		          <li><a href="deconnect.php"><strong>Deconnexion</strong></a>	        </li>
	          </ul><p> </p>
              <p></p>
              
	        </div>
	        <center>
	          <h2 class="title">Liste des Documents</h2>
    <?php
$req = "select ID_document, nom, nomfichier,dateinsertion from document 
		order by dateinsertion,nom";
$tab = requete_retour($req);
if(count($tab)==0)
	echo "aucun document dans la liste";
else
{

$dir = "./upload";

?>
    <table align="center" cellpadding=0 cellspacing=1 class="liste" >
	<tr><th width="300">Titre</th><th width="178">Date d'ajout</th><th colspan=2>Actions</th></tr>
	<?php 
	for($i=0;$i<count($tab);$i++){
	?>
	<tr class="trListe">
	<td height="45"><?php echo $tab[$i][1]."&nbsp;"; ?></td>
	<td><?php echo $tab[$i][2]."&nbsp;"; ?></td>
	
    <td width="34" align="center" style="width: 30px">
    <a  href="<?php echo $dir.$tab[$i][3]; ?>" title="Voir"><img src="./images/b_search.png" width="24" height="27" /></a></td>
	<td align="center" style="width: 30px">
	
	<a href="suppression.php?id=<?php echo $tab[$i][3]; ?>" title="Supprimer"><img src="./images/b_drop.png" width="20" height="21" /></a>
    
	
	
	
	</td>
	</tr>
	<?php
	}
	?>
	</table>
    <button type="button" onClick="document.location='upload.php';">Ajouter cours</button>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
	        </center>
<?php
}
?>
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