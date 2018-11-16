


<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:./../Login.php');
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Author: Reality Software
Website: http://www.realitysoftware.ca
Note: This is a free template released under the Creative Commons Attribution 3.0 license, 
which means you can use it in any way you want provided you keep the link to the author intact.
-->
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/home1_icon.jpg">
 <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <script src="js1/jquery-1.7.min.js"></script>
    <script src="js1/jquery.easing.1.3.js"></script>
    <script src="js1/tms-0.4.x.js"></script>
     <script>
		$(document).ready(function(){				   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:false,
				nextBu:false,
				playBu:false,
				duration:1000,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:5000,
				numStatus:true,
				banners:'fromRight',
				waitBannerAnimation:false,
				progressBar:false
			})		
		});
	</script>
 

</head>
<style>
</style>

<body>

<div id="container">
	<!-- header -->
    <div id="header">
	<div id="titre">
 <p id="title" >Nissan Djurdjura motors</p>	
	</div>
    	<div >
<img id="logo" src="images\nissan.png" title="nissan" ></div>
		
		 <div id="menu">
        	<ul>
           
            <li><a  href="../accuil-chef.php">accueil</a></li>
            <li><a id="proformat" href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versemet</a></li>
      <li><a  href="suiver_des_client.php">suivie des client</a></li>
      <li><a    href="client.php">client</a></li>
      <li><a  href="vehicule.php">M.vehicule</a></li>
      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>


    <style type="text/css">#left2{
 	margin-top: 2px;
 border-radius:6px;
 display:inline-block;
 width:230px;
 height:98%;
 background:url('left.png') repeat;
 padding:2px 2px 2px 2px;}</style>
	<div id="section">
<div id="left2">
		
			<ul id="liste_option">
			<div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="proformat-ajouter.php" >ajouter</a> </li></div>
			<div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="proformat-modifier.php">modifier</a></li></div>
			<div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="proformat-supprimer.php"> supprimer</a></li></div>
			</ul>
		<p id="information">  
				SARL DJURDJURA MOTORS 
				Agent Agrée NISSAN ALGERIE 
				  Service Commercial<br>
				Tel/fax: 034 34 72 16<br>
				Mob:05 52 27 45 95</p>
		
		
		
		</div>
		<section id="content">
        <div id="slide" class="box-shadow">		
            <div class="slider">
                <ul class="items">
                    <li><img src="images1/slider-9.jpg" alt=""  width="450"/><div class="banner">My first scripte </div></li>
                    <li><img src="images1/slider-2.jpg" alt="" width="450"/><div class="banner">My second scripte </div></li>
                    <li><img src="images1/slider-3.jpg" alt="" width="450"/><div class="banner">My third scripte </div></li>
                </ul>
            </div>	
        </div>
        <div class="container_12">
          <div class="clear"></div>
        </div>
        <div class="aside">
            <div class="container_12"></div>
        </div>  
    </section> 

	
	
			
	</div>
</div>
	<div id="footer"><p id="right_footer">@copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
<?php

if(isset($_GET['message']))
{
if($_GET['message']=='2')
{
	echo"<script>alert('le bon a ete supprimer avec succe');</script>";
}


if(($_GET['message']=='3')){

	echo"<script>alert('bon e ete  modifier avec succe');</script>";

}


}
?>
</div>
</body>
 
</html>
