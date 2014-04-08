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
</style>

<script type="text/javascript">
	$(function(){
		
		
	
	function RemplireCategories(){
		$.getJSON('categories.php',function(d){
			premier = true;
			$.each(d,function(k,v){
				$('#categories').append("<option value='"+v['id_cat']+"'>"+v['nom']+"</option>");
				console.log("id "+v['id_cat']);
				if(premier){
					RemplireCorps(v['id_cat']);
					premier = false;
				}
			});
		});
	}
	
	
	
	
	
	
</script>
	


</head>

<body>

	<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><strong>E-learning</strong></h1>
					<ul>
						<li><a href="page1.php" ><strong>Home</strong></a></li>
						<li><a href="#"><strong>About </strong></a></li>
						<li><a href="Type_cours.php"><strong>Cours</strong></a></li>
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
	            <li><a href="page1.php"><strong>Home</strong></a></li>
	            <li><a href="ajout.php"><strong> Espace membre </strong></a></li>
	           
	            <li><a href="#"><strong>Espace Formation</strong></a></li>
	            <li><a href="#"><strong>Formation à distance</strong></a></li>
	            <li><a href="deconnect.php"><strong>Deconnexion</strong></a></li>
              </ul>
            </div>
            <div class="grid3 ">
		            <h2>&nbsp;</h2>
		            <h2>Cours list</h2>
		            <p>&nbsp;</p>
		            <ul class="list3">
		              <li><a href="list.php">Informatiques Industrielles</a></li>
		              <li><a href="suppression.php">Programmation</a></li>
		              <li><a href="modification.php">Technologie Web</a></li>
	                </ul>
		            <ul class="list3">
		              <li><a href="#">Multimédia</a></li>
		              <li><a href="#">Administrations Reseaux</a></li>
		              <li><a href="#">Systemes D'exploitation</a></li>
		              <li><a href="#">Systemes Télécommunication</a></li>
	                </ul>
		            <ul class="list3">
		              <li><a href="#">Sécurité Réseaux</a></li>
		              <li><a href="#">Langues : Englais, Français Professionnelles</a></li>
		              <li><a href="#">Gestion Projet</a></li>
	                </ul>
	              </div>
            
	        <form method="get" class="popupform">
	          <div>
	            <label >
	            <div align="left">Catégories de cours
	            <select name="categorie">
				<?php 
				$host = "localhost";
	$database = "gestion";
	$user = "root";
	$pass = "";

	$connection = mysql_connect($host,$user,$pass);
	mysql_select_db($database);
						$req1="select * from categorie";
						$rs1=mysql_query($req1) or die(mysql_error());
					?>
                    
                	
                    <?php while($et=mysql_fetch_assoc($rs1)){ ?>
                    	<option value="<?php echo($et['id_cat'])?>"> <?php echo($et['nom']); ?> </option>
                        
                    <?php }?>

	               
                  </select>
                </div>
	            </label>
	            
              <p>
                
             
                      </p>
                      <div align="center">                                                                    
              <div class="container">
		    <div class="clearfix">
		      <div class="categorypicker"></div>
		      <div class="container">
		        <div class="clearfix">
		         
	                <input name="sesskey" value="pjrT3kfoB7" type="hidden">
                  </p>
                </div>
	            <div id="noscriptswitchcategory" style="display: none;">
	              <input value="Valider" type="submit">
                </div>
	            <fieldset class="coursesearchbox invisiblefieldset">
	              <label for="navsearchbox">Rechercher des cours:</label>
	              <input id="navsearchbox" size="20" name="search" alt="Rechercher des cours" type="text">
	              <input value="Valider" type="submit">
                </fieldset>
	            <p>&nbsp;</p>
              </div>
            </form>
	        <p>&nbsp;</p>
		       <center>
             
	        <section class="images"></section>
	      </div>
          </div>
	  </div>
	 
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