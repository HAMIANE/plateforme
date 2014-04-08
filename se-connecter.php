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
<?php
extract($_POST);

if(isConnected()){
	echo "<script>document.location = 'Type_cours.php';</script>";
	exit();
}

if(isset($logA) && !empty($logA) && isset($passA) && !empty($passA)){
	if(connectUser($logA,$passA)){
	
		echo "<script>document.location = 'Type_cours.php';</script>";
		exit();
	}
}
?>
	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
								<h1><img src="images/logo-1.gif" width="45" height="40"><strong><strong>Learn On Line</strong></strong></h1>
					<ul>
					  <li><a href="page1.php" ><strong>Home</strong></a></li>
						<li><a href=""><strong>About </strong></a></li>
						
						<li><a href="se-connecter.php" class="current"><strong>se connecter</strong></a></li>
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
		          <li><a href="page1.php"><strong>Home</strong></a></li>
		          <li> <strong><a href="ajout.php">Espace membre</a></strong></li>
		
		        </ul>
		        <ul class="categories">
		        
		          <li><a href="deconnect.php"><strong>Deconexion</strong></a></li>
	          </ul>
            </div>
	        <p>&nbsp;</p>
		       <center>
             
	        <section class="images"></section>
	        <div align="center">
	          <table width="613" height="314" border="0"   align="center" cellspacing="0" class="connect">
	            <tr>
	              <td height="44" colspan="2"  align="center">&nbsp;</td>
                </tr>
	            <tr valign="bottom"><td height="102" colspan="2"  align="center"><div class="TitleC">
	              <h2 align="center"> Authentification</h2>
	              </div> </td>
                </tr>
	            <tr>
	              <td width="159" height="57" id="login" align="center">Login: </td>
	      <td width="450">
          
          			<form name="form1" method="post" action="">
	                
	                
	                <input type="text" name="logA" id="login1">
                  
	              
                  
	            <tr>
	              <td height="22" id="pass" align="center"><label>
	                Mot de passe </label>
	                :</td>
	              <td>
	                <label for="pass1"></label>
	                <input type="password" name="passA" id="pass1">
                  </td>
	              </tr>
                  
	            <tr>
	              <td height="89"></td>
	              <td width="450">
	                <p align="right">
	                  <input type="submit" name="submit" id="bout" value="CONNEXION"  >
                    </p>
                  </form></td>
                </tr>
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