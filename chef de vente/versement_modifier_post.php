<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:./../Login.php');
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
<link href="style1.css" rel="stylesheet" type="text/css"/>
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/versement_icon.jpg">

</head>
<style>
body
{
 
}
#client-recu1
{
  color: black;
  position: relative;
  left: 30%;
  width: 220px;
}
a
{
  text-decoration: none;
}

#brahim:hover
{
filter: none; background-color: rgb(238,34,45);
}
#brahim
{
  position: absolute;
  top:30%;
  right: 50%;
text-decoration: none;
padding-top: 8px;
background: rgb(183,15,23);
color: white;
width: 190px;
height: 30px;
border-radius: 3px;
text-align: center;
font-size: 1.1em;
}
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
        	<ul>  <li><a   href="../accuil-chef.php">accueil</a></li>
            <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a id="versement" href="versement.php">reçu de versemet</a></li>
      <li><a  href="suiver_des_client.php">suivie des client</a></li>
      <li><a    href="client.php">client</a></li>
      <li><a  href="vehicule.php">M.vehicule</a></li>
      <li><a href="deconnexion.php">deconnexion</a></li>
         
                      </ul>
        </div> 
    </div>
	<div id="section">
	<div id="left">
		
			 <ul id="liste_option">
      <div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="versement-ajouter.php" >ajouter</a> </li></div>
      <div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="versement-modifier.php">modifier</a></li></div>
      <div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="versement-supprimer.php"> supprimer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>

			</div>
			<div id="right">
			
			
			 	<form action="versement_modifier_post_etablire.php" method="POST">
    <div id="client-recu1">
                                                   
                       <label for="client-recu" class="text-recu">client</label>  
<?php

if(isset($_POST['etablire']))
{




try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage());}        


 $nom1=$_POST['nom'];
$id_command= $_POST['id_command'];
 $id_recu= $_POST['id_du_recu'];

 /******* versement a modifier ********/////////
 $req_monant_verser_dernier=$bdd->query('select versement from recu_verssement where(recu_verssement.id_rv='.$id_recu.') ');
$donne=$req_monant_verser_dernier->fetch();

$la_somme_verser=$donne['versement'];

$req_monant_verser_dernier->closeCursor();



/********* recupere le rest a payer du bon de command */////////////// 

$req_monant=$bdd->query('select rest_a_payer from command where(id_command='.$id_command.') ');
$donne1=$req_monant->fetch();
 $rest_a_payer_du_command = $donne1['rest_a_payer'];
$req_monant->closeCursor();
?>
                       
                        <input class="select-client-recu" name="clien" value="<?php echo $nom1;?>" disabled/>

                         <input type="hidden" name="id_command" value="<?php echo$id_command?>"/>
                         <input type="hidden" name="$id_recu" value="<?php echo $id_recu?>"/> 
                         <input type="hidden" name="la_somme_verser" value="<?php echo $la_somme_verser?>"/>
                         <input type="hidden" name="rest_a_payer_du_command" value="<?php echo $rest_a_payer_du_command?>"/>
                    
 <label for="adresse-recu" class="text-recu">date de recu</label><input type="date" class="select-client-recu"name="date_recue"   required/>
                                
<label for="versement-recu" class="text-recu">Versement</label><input type="number" class="select-client-recu" name="la_nouvel_somme_verser" value="<?php echo $la_somme_verser;?>" required/>
                       <div id="btn-recu"><input type="submit"  name="verser_modifier" value="Envoyer" id="btn-save-recu">        
               </div> 
      
                       <?php }?>

                       pkpo
                         	

              </form>
                                </div>    
                            
            </div> 
            <div id="info-recu">
                  							
                 

			</div>
		</div>
       <?php


                       if(isset($_GET['id_command']))
                       {


                        echo'<script>var ele= document.getElementById("client-recu1"); ele.style.display="none";</script>';

                if(isset($_GET['message=3']))
                           {
                                echo"<script>alert('versement modifier avec succe');</script>";      }

      $id_command=$_GET['id_command'];

echo'<a href="../page/recu_de_versement.php?&id_command='.$id_command.'"><p id="brahim">IMPRESSION</p></a>';

                       } 
                       




?>
	<div id="footer">
		<p id="right_footer">@copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p>
	</div>
	
     
</div>












</body>
 
</html>