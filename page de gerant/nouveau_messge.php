<?php
session_start();
$id_exp=$_SESSION['id'];
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
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />

  <!-- End SlidesJS Required -->

  <!-- CSS for slidesjs.com example -->
  <link rel="stylesheet" href="css/example.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

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
<div id="container1">
	<!-- header -->
    <div id="header">
	<div id="titre">
 <p id="title" >Nissan Djurdjura motors</p>	
	</div>
    	<div >
     <img id="logo" src="images\nissan.png" title="nissan" ></div>
    
     <div id="menu">
          <ul>
            <li><a id="commande" href="accuil.php">accueil</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versement</a></li>
      <li><a  href="parametre.php">parametre</a></li>
      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
     </div>
<form action="accuil_etablir.php" method="POST">

  <div id="container">
    <div id="left">
    <ul id="liste_option">
    <div class="lien"><img src="images/nouveau.png" id="icon_add"/><li id="ajouter"><a href="nouveau_messge.php">Nouveau message</a> </li></div>
      <div class="lien"><img src="images/reception.png" id="icon_edit"><li id="modifier"><a href="messge_new.php">Boite de réception</a></li></div>
      <div class="lien"><img src="images/envoyer.png" id="icon_del"><li id="supprimer"><a href="messge_envoyer.php"> Message envoyer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>
    
    
    
    
    </div>
<div id="message">


                                   <div id="titre1">  <h2> messagerie</h2><br></br>
                     <div id="div">
                                               <label for="designation" id="destinataire">Destinataire</label>
                                               <select id="val1" name="destinataire" required>
													<option>  </option>
													<?php   try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
  $req=$bdd->query('select *  from  user where(id_user!='.$id_exp.')');

while(($donnee=$req->fetch()))
                       {?>

              <option> <?php echo  $donnee['nom'].' '.$donnee['prenom'];?> </option>
 <?php }

$req->closeCursor();

 ?>

 	</select>
	<input type="hidden" name="expiditeur" value=".<?php echo $id_exp ?>." />		
    
</div>

<div id="msg">
    <textarea id="textarea" cols="45" rows="7" name="text" ></textarea></div>
   
<input type="submit" id="envoyer" value="envoyer"/>

 </div>



</div>


   <div id="resultat"><div id="ecriture"></div></div>


</div>

			
</div>
</form>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>

</div>



 	<style>

#container
{
  
}
body{background: url('images/back.png') repeat; 
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
  margin-left: 280px;
  padding: 5px 5px 5px 5px;
  border-radius: 50px 50px 50px 50px;
width: 395px;
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
  left:400px;
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
#container1{height: 627px;}
                           </style>
  <?php  

if(isset($_GET['message']))
{
if($_GET['message']==1)
{
echo"
<script>
var ecriture =document.getElementById('ecriture');
  
  var element=document.getElementById('resultat');
  ecriture.innerHTML='Ajouter avec succs !!! ';
  element.className='kenza';
  

document.addEventListener('click',function (){
  
  var element=document.getElementById('resultat');
  element.style.display='none';
  
  },false);</script>";

}
if($_GET['message']==2)
{
echo"
<script>

  var ecriture =document.getElementById('ecriture');
  var element=document.getElementById('resultat');
  ecriture.innerHTML='Remplisser le champs  !!! ';
  element.className='kenza';
  

document.addEventListener('click',function (){
  
  var element=document.getElementById('resultat');
  element.style.display='none';
  
  },false);</script>";

}

}


?>
                           </body>
</html>
