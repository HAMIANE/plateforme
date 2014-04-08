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
	<script type="text/javascript" src="utilisateur/js/jquery-1.4.2.min.js" ></script>
	<script type="text/javascript" src="utilisateur/js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="utilisateur/js/jquery-ui-1.8.5.custom.min.js"></script>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-image: url(utilisateur/images/body-bg.gif);
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
						<li><a href="utilisateur/index.html" ><strong>Home</strong></a></li>
						<li><a href=""><strong>About </strong></a></li>
						<li><a href="Type_cours.php"><strong>Cours</strong></a></li>
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
	             <li><a href="index.html"><strong>Home</strong></a></li>
		          <li><a href="ajout.php"><strong>Espace membre</strong></a></li>
		        
		          <li><a href="deconnect.php">
		            <blockquote>
		              <p><strong>Deconexion</strong></p>
	              </blockquote>
		          </a></li>
              </ul>
            </div>
	        <div align="center">
	         
	          <?php
	
$req = "select ID_utilisateur, `nom_utilisateur`, `prenom_utilisateur`,`e-mail`, `gsm`,`login`,`password` from utilisateur ";
$tab = requete_retour($req);
if(count($tab)==0)
	echo "aucun utilisateur dans la liste";
else
{
?>
            </div>
	        <table align="right" cellpadding=0 cellspacing=1 class="liste" >
                  <tr><th width="72">Nom</th><th width="83">Pr&eacute;nom</th><th width="73">E-mail</th><th width="106">tel</th><th width="129">Login</th>
                 <th colspan=3>Actions</th></tr>
                  <?php 
	for($i=0;$i<count($tab);$i++){
	?>
                  <tr class="trListe">
                    <td height="39"><?php echo $tab[$i][1]."&nbsp;"; ?></td>
                    <td><?php echo $tab[$i][2]."&nbsp;"; ?></td>
                    <td><?php echo $tab[$i][3]."&nbsp;"; ?></td>
                    <td><?php echo $tab[$i][4]."&nbsp;"; ?></td>
                    <td><?php echo $tab[$i][5]."&nbsp;"; ?></td>

                    
                    <td width="34" align="center" style="width: 30px">
                      
                      <a href="modification.php?id=<?php echo $tab[$i][0]; ?>" title="Modifier"><img src="images/b_edit.png"/></a>
                      
                      
                    </td>
                    
                    <td width="34" align="center" style="width: 30px">
                      
                      <a href="suppression.php?id=<?php echo $tab[$i][0]; ?>" title="Supprimer"><img src="images/b_drop.png" /></a>
                      
                      
                  </td></tr>
                  <?php
	}
	?>
                  </table>
				    
          </div>

	
	        </center>
	        <p>
	          <?php
}
?>
            </p>
	        <p>&nbsp;</p>
	        <center>
              <div align="right">
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