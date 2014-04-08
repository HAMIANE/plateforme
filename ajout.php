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
</style>


</head>

<body>
<?php
extract($_POST);
$err="";
if(isset($nom) && isset($prenom)  && isset($e) && isset($tel) && isset($login) && isset($pass)
		&& !empty($nom) && !empty($prenom) && !empty($login) && !empty($pass)  ) {
		
		$req = "insert into utilisateur values('', '".$nom."', '".$prenom."','".$e."', '".$tel."', '".$login."', '".$pass."')";
		$r = requete_execute($req);
		
		//echo $req;
		echo "<script>document.location = 'ajout.php';</script>";
		exit();
}
elseif(isset($submit)){
	$err = "Veuillez saisir tous les champs !";
}
?>

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
					  <li><a href="index.html" ><strong>Home</strong></a></li>
						<li><a href="#"><strong>About </strong></a></li>
						
						<li><a href="se-connecter.php" ><strong>se connecter</strong></a></li>
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
	            <div class="grid3 first">       <p>&nbsp;</p>
	              <ul class="categories">
	         
	                <li><a href="index.html"><strong>Home</strong></a></li>
		          <li><a href="#"><strong>Espace membre</strong></a></li>
                 
		          <li><a href="deconnect.php"><strong>Deconexion</strong></a></li>
                  </ul>
	            </div>
	           <center>

	<h2 class="title">&nbsp;</h2>
    
	<form action="" method="post" name="frmMain" id="formulaire">
	  <table  border=0 align="center"  class="formulaire">
	    <tr>
	      <td height="22" colspan="2">&nbsp;</td>
	      </tr>
	    <tr>
	  <td height="40" colspan="2"> <div align="center">
	    <p class="title"><em>Ajouter un utilisateur</em></p>
	  </div></td>
	  </tr>
	<tr><td width="119" height="34"><div align="center">Nom : </div></td><td width="430"><input type="text" name="nom" size="70"></td></tr>
	<tr><td height="35"><div align="center">Pr&eacute;nom : </div></td><td><input type="text" name="prenom" size="70"></td></tr>
	<tr><td height="74"><div align="center">Email : </div></td><td><input type="text" name="e" size="70" ></td>
	<tr><td height="36"><div align="center">Telephone : </div></td><td><input type="text" name="tel" size="70"></td></tr>
	<tr><td height="35"><div align="center">Login : </div></td><td><input type="text" name="login" size="70"></td></tr>
	<tr><td height="36"><div align="center">Mot de passe : </div></td><td><input type="password" name="pass" size="70"></td></tr>
	
	
	 
	<tr>
	  <td height="61" colspan=2 align="center"><div align="center">
	    <input type="submit" name="submit" value="Ajouter" >
	   <!-- <input type="submit" name="retour"  value="Retour" onClick="document.location='ajout.php';" id="retour" > -->
	    </div></td>
	  </tr>
	<?php if(strlen($err)) {?>
	<tr class="erreur">
	  <td colspan=2 align="center"><?php echo $err;?></td></tr>
	<?php } ?>
	</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	</form>
</center>
              </div>
            </div>
	      </div>
	    </div>
	  </div>
	  </div>
	        </div>
	      </div>
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