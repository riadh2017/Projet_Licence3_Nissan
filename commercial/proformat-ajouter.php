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
	position: absolute;
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
#ppp
{
	width: 140px;
	height: 140px;
}
#btn-del-com5
{
	position: relative;
	left: 35%;
	top: 30%;
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
            <li><a  href="../accuil-commercial.php">Accueil</a></li>
			<li><a   id="proformat"href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">Bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">Reçu de versement</a></li>
			<li><a  href="suiver_des_client.php">suivie des clients</a></li>
			<li><a  href="mode_de_vente.php">mode de vente</a></li>

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
                                                     <h1>Client</h1>
                            <label for="nomclient" class="text-commnade">Nom du client</label><input type="text" id="nomclient-com" name="nom" required autocomplete="off"/>
                            <label for="adresse-client" class="text-commande">Adresse</label> <input type="text" id="adresse-com" name="adresse_client" required autocomplete="off"/>
                            <label for="tel" class="text-commande">Tel </label><input type="text"id="tel-com" name="tel" required autocomplete="off"/>
                          
							  
         		        </div>
						<div id="btn-commande">

									<input type="submit" value="Enregistrer" name="save" id="btn-save-com">



								
						</div>
				</div>
						<div id="items">
					<h1>ITEMS</h1>
                            <input id="ajt" type="button" value="Ajouter" class="item_boton"  >
                            <input id="sup" type="button" value="Supprimer"  class="item_boton">
                                
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
																
                                               <label for="qauntite" class="text-commande-align">Quantite</label> <input id="qauntite-com" type="number" name="quantite" min="1" required/>
                                              
                                               <label for="couleur" class="text-commande-align">Couleur </label><select id="couleur-com" name="couleur"   required>
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

                                               <h1> La Facture </h1>
                            <label for="date-commande" class="text-commande">Date de la facture</label><input type="date" class="select-com" name="date"  required />
                            <label for="delai-commande" class="text-commande">Validité de l'offre</label><input type="date" id="delai-com"  name="validite" required/>
                       
							
                           <label for="mode-vente" class="text-commande">Mode d'achat</label> 
                           <select class="select-com" name="mode_de_vente"  required>
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

 <?php 
                   try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }

                  if(isset($_GET['message']) and isset($_GET['facture']))
                  {
echo'<script> var element=document.getElementById("right"); element.style.display="none";</script>';
                    $fact=$_GET['facture'];
                    $req=$bdd->query('select mode_de_vente from facture_pro where(id_facture='.$fact.')');
                    $donne=$req->fetch();
                    $lien=$donne['mode_de_vente'];
                    if($lien=='TTC ENTERPRISE')
                    {

                      $lien='TTC_ENTERPRISE';
                    }

echo'<a href="../page/fact'.$lien.'.php?id='.$fact.'"  id="btn-del-com5" ><img src="images/print.png" id="ppp"></a>';
                  }
                    ?>	
			
	</div>

	<div id="footer"><p id="right_footer">@copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
     
</div>
<?php
if(isset($_GET['message'])){

if(($_GET['message']=='2')){
	
	echo"<script>alert('designation identique');</script>";
}
if(($_GET['message']=='3')){
	
	echo"<script>alert('impossible etablire cette facteur a deux designation');</script>";
}
if(($_GET['message']=='1')){
	
	echo"<script>alert('facture ajouter avec succe');</script>";
}
}
?>
<script src="script.js"></script>
</body>
 
</html>
