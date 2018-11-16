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
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/home1_icon.jpg">
 <meta name="viewport" content="width=device-width">
 

</head>
<style>

#pro
{
	font-weight: bold;
	padding-left: 10px;
}
#btn-del-com
{
	text-decoration: none;
}
#imprimer
{
	width: 180px;
	padding-top: 7px;
	text-align: center;
	font-size: 1.1em;
	height:30px;
	border-radius: 3px;
	background: rgb(183,15,23);
	margin-left: 10px;
	font-weight: lighter;
}
#imprimer:hover
{background: rgb(238,34,45);

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
	<div id="left">
		
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
	
		<div id="right">
		            <div id="pro">

	   <form action="proformat_ajout_post.php" method="post">
				 <div id="partie1">
                         <div id="client-commande">
                                                     <h1>client</h1>
                            <label for="nomclient" class="text-commnade">Nom de client</label><input type="text" id="nomclient-com" name="nom" required/>
                            <label for="adresse-client" class="text-commande">Adresse</label> <input type="text" id="adresse-com" name="adresse_client" required />
                            <label for="tel" class="text-commande">Tel </label><input type="text"id="tel-com" name="tel" required/>
                          
							  
         		        </div>
						<div id="btn-commande">

									<input type="submit" value="Envoyer" name="save" id="btn-save-com">


 <?php 
                   try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }

                  if(isset($_GET['message']) and isset($_GET['facture']))
                  {
                    $fact=$_GET['facture'];
                    $req=$bdd->query('select mode_de_vente from facture_pro where(id_facture='.$fact.')');
                    $donne=$req->fetch();
                    $lien=$donne['mode_de_vente'];
                    if($lien=='TTC ENTERPRISE')
                    {

                      $lien='TTC_ENTERPRISE';
                    }

echo'<a href="../page/fact'.$lien.'.php?id='.$fact.'"  id="btn-del-com" ><p id="imprimer">imprimer<p></a>';
                  }
                    ?>	
								
						</div>
				</div>
						<div id="items">
					<h1>ITEMS</h1>
                            <input id="ajt" type="button" value="ajouter" class="item_boton"  >
                            <input id="sup" type="button" value="Suprimer"  class="item_boton">
                                
								<div id="top">
                                            <div id="div">
                                               <label for="designation" class="text-commande-align">Designation</label>
                                               <select id="val1" name="designe"  required>
                                               	<option> </option>
													<?php   try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
  $req=$bdd->query('select *  from  modele_veh ');

while(($donnee=$req->fetch()))
                       {?>

                                    
              <option> <?php echo  $donnee['designation'];?> </option>
 <?php }

$req->closeCursor();

 ?>
				</select>
																
                                               <label for="qauntite" class="text-commande-align">quantite</label> <input id="qauntite-com" type="number" name="quantite" min="1"/>
                                              
                                               <label for="couleur" class="text-commande-align">couleur </label><select id="couleur-com" name="couleur"   required>
													<option> </option>
													<?php
													$req1=$bdd->query('select *  from  couleur  ');
													while(($donnee1=$req1->fetch()))
                                                      {?>
                                                 
													<option><?php echo $donnee1['code_couleur'];?></option>
													<?php  }
$req1->closeCursor();
											

													?>
											
													></select> 											   
                        </div>
                                </div>
								
                         </div>
			
			            <div id="info-commande">

                                               <h1> la commande </h1>
                            <label for="date-commande" class="text-commande">Date de la facture</label><input type="date" class="select-com" name="date"  required />
                            <label for="delai-commande" class="text-commande">validité</label><input type="date" id="delai-com"  name="validite" required/>
                       
							
                           <label for="mode-vente" class="text-commande">mode d'achat</label> 
                           <select class="select-com" name="mode_de_vente">
                            	<option></option>
                            <option>TTC</option>
                            <option>TTC ENTERPRISE</option>
                            <option>ANSJ</option>
                            <option>CNAC</option>
                            <option>LEASING</option> 
                            <option>HDD</option>
                            <option>ANDI</option>
                        </select>
							 </div>
                    
					
				  </form>  
            </div>
                    
					
				  

		</div>
			
	</div>
	<div id="footer"><p id="right_footer">@copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
     
</div>
<?php


if(isset($_GET['message']))
{
  if(($_GET['message']=='1')){

  echo"<script>alert(' FACTEUR ete  ajouter avec succe');</script>";
      
}

if(isset($_GET['message']) and isset($_GET['facture']))
{

echo'<script>

var element4=document.getElementById("client-commande");
element4.style.display="none";

 var element=document.getElementById("btn-save-com");
             element.type="hidden";

                </script>';


	
echo'<script>
var element8=document.getElementById("info-commande");
element8.style.display="none";


var element8=document.getElementById("items");
element8.style.display="none";
 </script>';
}


if(($_GET['message']=='3')){
	
	echo"<script>alert('verifier les itemes !!!!!!');</script>";
}
}
?>
<script src="script.js"></script>
</body>
 
</html>
