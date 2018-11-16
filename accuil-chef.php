<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('Location:Login.php');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="style2.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/home1_icon.jpg">
<link href="style-menu.css" rel="stylesheet" type="text/css" />
 <meta name="viewport" content="width=device-width">
  <!-- End SlidesJS Required -->

  <!-- CSS for slidesjs.com example -->
  <link rel="stylesheet" href="css/example.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Condiment' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.x.js"></script>
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
                slideshow:3000,
                numStatus:true,
                banners:'fromRight',
                waitBannerAnimation:false,
                progressBar:false
            })      
        });
    </script>
  <style>
.kenza
{
  position:absolute;
  z-index: 500000;
  left:0px;
  top:123px;
  width:47%;
  border-radius:50px 50px 50px 50px;
  height:48px;
  padding-top:1px;
  background-image:url('images/header_bckg2.jpg');
  
  color:white;}
#ecriture{margin-left:210px;margin-top: 18px;font-size: 1.4em; font-weight: bold;}

</style>


    <style type="text/css">#left4{
  margin-top: 2px;
 border-radius:6px;
 display:inline-block;
 width:230px;
 height:501px;
 background:url('left.png') repeat;
 padding:2px 2px 2px 2px;}</style>
</head>
<body>
<style type="text/css"> 
#left,#message
{
display: inline-block;
}
#left
{
height: 480px;

}

</style>
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
        <li><a  id="accuil" href="../accuil-chef.php">accueil</a></li>
           <li><a  href="chef de vente/proformat.php">F.proformat</a></li>
            <li><a  href="chef de vente/commande.php">bon de commande </a></li>
            <li><a  href="chef de vente/livraison.php">bon de livraison</a></li>
            <li><a  href="chef de vente/versement.php">recu de versemet</a></li>
      <li><a  href="chef de vente/suiver_des_client.php">suivi des client </a></li>
      <li><a    href="chef de vente/client.php">client</a></li>
      <li><a   href="chef de vente/vehicule.php">M.vehicule</a></li>
      <li><a href="chef de vente/deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> </div>



<div id="left4">
    
      <ul id="liste_option">
      <div class="lien"><img src="images/nouveau.png" id="icon_add"/><li id="ajouter"><a href="nouveau_messge-chef.php">Nouveau message</a> </li></div>
      <div class="lien"><img src="images/reception.png" id="icon_edit"><li id="modifier"><a href="messge_new-chef.php">Boite de réception</a></li></div>
      <div class="lien"><img src="images/envoyer.png" id="icon_del"><li id="supprimer"><a href="messge_envoyer-chef.php"> Message envoyer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>
    </div>
    <div id="message">
  <section id="content">
        <div id="slide" class="box-shadow">   
            <div class="slider">
                <ul class="items">
                    <li><img src="images1/slider-1.jpg" alt=""  width="450"/><div class="banner">My first scripte </div></li>
                    <li><img src="images1/slider-2.jpg" alt="" width="450"/><div class="banner">My second scripte </div></li>
                    <li><img src="images1/slider-3.jpg" alt="" width="450"/><div class="banner">My third scripte </div></li>
                    <li><img src="images1/slider-4.jpg" alt="" width="450"/><div class="banner">My third scripte </div></li>
                    <li><img src="images1/slider-5.jpg" alt="" width="450"/><div class="banner">My third scripte </div></li>
                    <li><img src="images1/slider-6.jpg" alt="" width="450"/><div class="banner">My third scripte </div></li>
                </ul>
            </div>  
        </div>
      
         
    </section> 
</div>
      
    
      
  </div>
  <div id="footer"><p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
  
     
</div>
<style>

#left
{
  height: 500px;
}
body{background: url('commercial/images/back.png') repeat; 
}
a{

text-decoration: none;

}
#div label{
  font-weight: bold;
  margin-right: 3px;
  margin-left: 80px;
}
#div select
{
  height: 30px;
  width: 200px;
  border-radius: 5px;
    box-shadow: 5px 5px 2px 2px rgb(10,12,37);

}
#div
{
  margin-left: -50px;

}
#recu_sms{
width: 140px;
padding-bottom: 15px;
padding-top: 8px;
border-radius:  8px ;
box-shadow: 3px 3px 2px 2px rgb(10,12,37);
border: 1px red;
background: red;
text-align: center;
  font-size: 1.5em; 
  color:white;

}
#envoyer
{
  width: 140px;
  height: 40px;
  text-align: center;
  font-size:1.5em;
  box-shadow: 3px 3px 2px 2px rgb(10,12,37);
  margin-left: 200px;
  border-radius: 8px;
 vertical-align: top;
 margin-top: 25px;
 background-color: red;
 border: transparent;
 color: white;
}
 #message,#lien
 {
position: center;
margin-left:10px;
margin-top: 30px;
margin-right: 120px;
color: #2f2f2f;
 }
 #message
 {
  margin-top: 50px;
  margin-left: 200px;
  padding: 5px 5px 5px 5px;
  border-radius: 50px 50px 50px 50px;
background: url('commercial/images/back.png') repeat;
width: auto;
height: 220px;
 }
#textarea
{
  border-radius: 9px;
  box-shadow: 5px 5px 2px 2px rgb(10,12,37);
}
.kenza
{
  position:absolute;
  z-index: 500000;
  left:0px;
  top:123px;
  width:47%;
  border-radius:50px 50px 50px 50px;
  height:48px;
  padding-top:1px;
  background-image:url('images/header_bckg2.jpg');
  
  color:white;}
  #ecriture{margin-left:210px;margin-top: 18px;font-size: 1.4em; font-weight: bold;}
#destinataire
{
  font-size: 1.5em;
  margin-left: 140px;
}
    #msg,#titre1,#lien
                           {
                            display: inline-block;

                           }
h2{margin-left: 130px;
    font-size: 2.9em;}
#container1{height: 626px;}
                           </style>


    
</body>
     <?php  

if(isset($_GET['message']))
{
if($_GET['message']==1)
{
echo'<script>alert("messge envoyer  avec succe ")</script>';
}


}


?>
</html>
