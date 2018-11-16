﻿<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:Login.php');
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
<link href="style-bloc_de_recherche.css" rel="stylesheet" type="text/css" />
<link href="style-tabbloc.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">
 

</head>
<style type="text/css">
.modele
{
	width: 300px;
}
</style>
<body>

<div id="container">
	<!-- header -->
    <div id="header">
	<div id="titre">
 <p id="title" >Nissan Djurdjura motors</p>	
	</div>
    	<div>
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
	<div id="section">

		
			<div id="left1">
		<h2 id="titre_de_recherche">recherche</h2><img id="loupe" src="images/loupe.png">
			<form action="proformat-supprimer.php" method="POST">
				
				<div class="choix"><label  for="nom_de_client" > le nom de client</label><input  type="text" name="nom_du_client" id="nom_de_client" ></div>
				<div class="choix"><label  for="nom_de_tel" > le num de telephone</label><input  type="text" name="num_du_tel" id="nom_de_tel" ></div>
				<div class="choix"><label  for="date_de_bon" >la date de bon </label><input type="date"name="date_du_bon" id="date_de_bon" ></div>
				<div class="choix"><label for="num_de_bon" >le numero de bon</label><input type="text"name="num_du_bon" id="num_de_bon" placeholder="example:2015/001" ></div>
				<div class="choix"><label for="mod_de_client" >le modele de vehicule</label><input type="text" name="model_du_vehicul" id="mod_de_client" ></div>
				<input  id="boton_recherche"type="submit" value="recherche" name="recherche"/>
			
			
			</form>
		</div>
		<div id="right1">
			
	   		<table id="tab_de_resultat">
		                                                  <!---<div id="section_saisie-pro"> -->
		            	<tr id="titre_de_tab">
		            <td class="numero">N°f</td>
					<td class="nom">nom</td>
					<td class="tel">telephone</td>
					<td class="modele">modele de vehicule</td>
					<td class="mode">vente</td>
					<td class="date">date</td>
					
				</tr>
			

	   
            
<div id="resultat"></div>       
       						<?php
$i=0;
$j=0;
                 if ((isset($_POST['nom_du_client']) and $_POST['nom_du_client'] != NULL)
                  or 
                 (isset($_POST['num_du_tel']) and ($_POST['num_du_tel'] != NULL)) 
                  or 
                 (isset($_POST['date_du_bon']) and ($_POST['date_du_bon'] != NULL))
                  or
                  (isset($_POST['num_du_bon']) and ($_POST['num_du_bon'] != NULL)) 
               )
{
 
            try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }

   $req1=$bdd->query('SELECT  facture_pro.id_client, facture_pro.id_facture, client.nom, facture_pro.mode_de_vente, facture_pro.date_facture ,client.tele,facture_pro.numero_fact FROM facture_pro, client WHERE (facture_pro.id_client=client.id_client)');
 
                  while(($donnee=$req1->fetch()))
                       {

                       	$req2=$bdd->query('select * from iteme_facture , facture_pro where iteme_facture.id_facture=\'' . $donnee['id_facture'] . '\' ');
                       
                         $donnee1=$req2->fetch();
                       
                         if(((preg_match("#$_POST[date_du_bon]#i","$donnee[date_facture]"))and($_POST['date_du_bon']!= NULL))
                         or
                         ((preg_match("#$_POST[num_du_bon]#i","$donnee[numero_fact]"))and($_POST['num_du_bon']!= NULL)) 
                         or 
                         ((preg_match("#$_POST[nom_du_client]#i","$donnee[nom]"))and($_POST['nom_du_client']!= NULL)) 
                         or 
                         ((preg_match("#$_POST[num_du_tel]#i","$donnee[tele]"))and($_POST['num_du_tel']!= NULL)) 
                          )
                       {
                       	


			echo '<tr class="resultat" ondblclick="takfa1('.$donnee['id_facture'].')" onclick="client('.$donnee['id_facture'].');">
				    <td>'.$donnee['numero_fact'].'</td>
				    <input  type="hidden" name="numero" value="'.$donnee['numero_fact'].'" id="nomero1"/>
					<td class="nom"><p>'.$donnee['nom'].'</td>
					<td  class="tel" "><p>'.$donnee['tele'].'</p></td>
					<td class="modele"><p> '.$donnee1['designation'].' </p></td>
					
					<td class="nom"><p>'.$donnee['mode_de_vente'].'</p></td>
					
					<td class="date"><p> '.$donnee['date_facture'].'</td>
					<input type="hidden" name="id_facture"  value="'.$donnee['id_facture'].'"/>
					<input type="hidden" name="id_client"  value="'.$donnee['id_client'].'"/>
					<td> </td>
			</tr>';		
	                $j=1;       
	                }
	            }


	        }
else{
if((isset($_POST['model_du_vehicul']) and $_POST['model_du_vehicul'] != NULL)){



try {

                $bdd1 = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }

   $req3=$bdd1->query('select  * from facture_pro ,client ,iteme_facture where (iteme_facture.id_facture = facture_pro.id_facture) and (facture_pro.id_client=client.id_client)');
 

$i=0;
                       while(($donnee3=$req3->fetch()))
                       {

                       	if (((preg_match("#$_POST[model_du_vehicul]#i","$donnee3[designation]"))and($_POST['model_du_vehicul']!= NULL)) ) {
                       	
                       	


            $j=1;
			echo '<tr class="resultat" ondblclick="takfa1('.$donnee3['id_facture'].')" onclick="client('.$donnee3['id_facture'].');">

				    <td><p>'.$donnee3['numero_fact'].'</p></td>
				    <input  type="hidden" name="numero" value="'.$donnee3['numero_fact'].'" id="nomero1"/>
					<td class="nom"><p><input  type="hidden" name="nom" value="'.$donnee3['nom'].'"/></p>'.$donnee3['nom'].'</td>
					<td  class="tel" "><p><input  type="hidden" name="tel" value="'.$donnee3['tele'].'"/></p>'.$donnee3['tele'].'</p></td>
					<td class="modele"><p> '.$donnee3['designation'].' '.$donnee3['couleur'].'</p></td>
					<td class="nom"><p>'.$donnee3['mode_de_vente'].'</p></td>
					<td class="date"><p> '.$donnee3['date_facture'].'</td>
					<input type="hidden" name="id_facture"  value="'.$donnee3['id_facture'].'"/>
					<input type="hidden" name="id_client"  value="'.$donnee3['id_client'].'"/>
					
			</tr>';		
	                      
	                
                      }   }
                   
              }
         
   }      
?>		
             
					
				  
</table>
		</div>
			
	</div>
</div>
	<div id="footer"><p id="right_footer">@copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>


<script >
      function takfa()
      {
    document.getElementById("resultat").innerHTML = ""; 
    document.getElementById("test").style.opacity="1";   
      }

function client(str) {
    if (str == "") {
    
        document.getElementById("resultat").innerHTML = "";
        return;
    } else { 
      
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       
        
        document.getElementById("resultat").innerHTML = xmlhttp.responseText;
        document.getElementById("test").style.opacity="0.3";
      
            }
        
        }

        xmlhttp.open("POST","proformat_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }

}



     </script>



<script>
function takfa1(ta){

if(confirm('vouler vous suprimer ')){
window.location.href=("proformat-suprimer_post.php?facture="+ta);
}
	
}
</script>

</body>
 
</html>
