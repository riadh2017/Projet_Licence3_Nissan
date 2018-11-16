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

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">

</head>
<style type="text/css">

.input_container {
  height: 30px;
  float: left;
}

.input_container ul {
  width: 206px;
  border: 1px solid #eaeaea;
  z-index: 9;
  background: #f3f3f3;
  list-style: none;
}
.input_container input {
  height: 20px;
  width: 160px;
  padding: 2px;

  border: 1px solid white;
  border-radius: 0;
}
.input_container ul {
  color: white;
overflow: hidden;
  width: 165px;

  text-align:left;
  margin-top: 25px;
  border-radius: 3px;
  border: 1px solid transparent;
  position: absolute;
  z-index: 9;
  background: rgb(76,117,143);
  list-style: none;
}
.input_container ul li {
  padding: 1px;
}
.input_container ul li:hover {
  background: white;
  color: #2f2f2f;
}
#country_list_id {
  display: none;
}



#right
{
  color: #2f2f2f;
  padding-left: 10px;
}
#btn-del-com
{
  text-decoration: none;

  


}
#imprimer
{
  position: absolute;
  top: 200px;
  left: 35%;
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
            <li><a  href="../accuil-commercial.php">accueil</a></li>
           <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  id="commande" href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versement</a></li>
      <li><a  href="suiver_des_client.php">Suivie des clients</a></li>
      <li><a  href="mode_de_vente.php">mode de vente</a></li>
      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>
	<div id="section">
	<div id="left">
		
		<ul id="liste_option">
      <div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="commande-ajouter.php" >ajouter</a> </li></div>
      <div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="commande-modifier.php">modifier</a></li></div>
      <div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="commande-supprimer.php"> supprimer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>
		
		
		
		
		</div>
		
		<div id="right">
		

	   <form action="ajouter_command_post.php" method="post">
				 <div id="partie1">
                         <div id="client-commande">
                                                     <h1>client</h1>
                                                     
                            <label for="nomclient" class="text-commnade">Nom</label><div class="input_container"><ul id="country_list_id"></ul><input type="text" id="nomclient-com" name="nom" onkeyup="autocomplet()" autocomplete="off" required/>
                             
                           </div>
                             <label for="adresse-client" class="text-commande">Adresse</label> <input type="text" id="adresse-com" name="adresse_client" required/>
                            <label for="tel" class="text-commande">Tel </label><input type="text"id="tel-com" name="tel"required/>
                            <label for="mat-fisc" class="text-commande">Mat.fisc </label><input type="text" id="fisc-com" name="mat_fisc" />
                            <label for="reg-commerce" class="text-commande">Registre commerce N°</label><input type="text" id="reg-com" name="reg_commerce" />
							
							  
         		        </div>
						<div id="btn-commande">
							 <input type="submit" value="Enregistrer" name="save" id="btn-save-com" >
             
                  <?php 
                   try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }

                 
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
                                               <select id="val1" name="designe" required>
													<option></option>
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
																
                                               <label for="qauntite" class="text-commande-align">quantite</label> <input id="qauntite-com" type="number" name="quantite" value="1" min="1" />
                                              
                                               <label for="couleur" class="text-commande-align">couleur </label><select id="couleur-com" name="couleur" required>
												<option></option>
													<?php
													$req1=$bdd->query('select *  from  couleur  ');
													while(($donnee1=$req1->fetch()))
                                                      {?>

													<option><?php echo $donnee1['code_couleur'];?></option>
													<?php  }
$req1->closeCursor();
													?>
											
													></select> 	
                                     </div></div>
								                                             <label for="couleur" class="text-commande-align" >Etat de la command </label>
                                             <select name="etat" id="selection" name="etat">
                                             	<option></option>
                                             	<option>Traitement dossier</option>
                                             	<option>Didouanier</option>
                                             	<option>Facturitation</option>
                                             	<option>Transfer de vehicule</option>
                                             </select>
<label for="couleur" class="text-commande-align">Reception dossier</label> <input type="date" id="selection" name="date_rec"/>
                         </div>
			
      <style type="text/css">#selection{
        margin-top: 100px;   width: 160px;height: 35px; border-radius: 9px;
 }


 </style>
			            <div id="info-commande">

                                               <h1> La commande </h1>
                            <label for="date-commande" class="text-commande">Date de commande</label><input type="date" class="select-com" name="date_command" required/>
                            <label for="delai-commande" class="text-commande">Delai de livraison</label>
                            <select id="delai-com" name="dalai_livraison">
                            	 	<option></option> 
                            	<option>Arrivage + 45 jours</option> 
                            	<option>15 jours</option> 
                            	<option>45 jours</option> 
                            </select>
                         
							
							<label for="espace" class="text-commande">stock vehicul</label>  
						<select class="select-com" name="stock" >
                              <option></option>                         
                            <option>SARL djurdjura motors</option>
                            <option>Nissan algerie</option>
                        </select>
							<label for="mode-pay" class="text-commande">Mode de paiment</label>  
							<select class="select-com" name="mode_de_paymant">
                             <option></option>
                             <option>versement banqaire</option> 
                            <option> cheque du banque </option>
                            <option>Espace</option>
                        	</select>
                           <label for="mode-vente" class="text-commande">mode d'achat</label> 
                           <select class="select-com" id="takfa1"name="mode_de_vente">
                           	<option></option>
                            <option>TTC</option>
                            <option>TTC ENTREPRISE</option>
                            <option>ANSJ</option>
                            <option>CNAC</option>
                            <option>LEASING</option> 
                            <option>HDD</option>
                            <option>ANDI</option>
                        </select>
							 <label for="date-versement"class="text-commande">Date Versement à compte</label><input type="date" class="select-com" name="date_de_versement" required/>							
                            <label for="adresse-liv" class="text-commande">Montant verser </label><input type="text" id="adresse1-com" name="montant_verser"required/>
                      </div>
                    
					
				  </form>  
            </div>
			

			
	</div>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
</div>
<?php

if(isset($_GET['message']))
{
  if(($_GET['message']=='1')){

  echo"<script>alert('bon e ete  ajouter avec succe');</script>";
      
}

}
?>
<script type="text/javascript">

var element = document.getElementById('takfa1');

element.addEventListener('change',function() {
var str1 = element.value;
takfa(str1);
},false);

function takfa(srt){
switch(srt){

case 'TTC ENTREPRISE' : 
          var l=document.getElementById('fisc-com');
           var l1=document.getElementById('reg-com');
           l.setAttribute('required',true);
          l1.setAttribute('required',true);

              break;

default:
         var l=document.getElementById('fisc-com');
         var l1=document.getElementById('reg-com');

          l.required=false;
          l1.required=false;
             
}

}
</script>
 <script src="script.js"></script>
<?php if(isset($_GET['alert'])){ 

if ($_GET['alert']=='3') {
  echo'<script> alert("verifier les item !!!!")</script>';
}

 }

 if(isset($_GET['message'])){

                    $id_command_impression=$_GET['id_command'];

echo'<script> var element=document.getElementById("right");element.style.display="none";</script>';
                    $req=$bdd->query('select mode_de_vente from command where(id_command='.$id_command_impression.')');
                    $donne=$req->fetch();
                    $lien=$donne['mode_de_vente'];
                    if($lien=='TTC ENTREPRISE')
                    {
 
                      $lien='TTC_ENTERPRISE';
                       
                      echo'<a href="../page/'.$lien.'.php?id='.$id_command_impression.'"  id="btn-del-com" ><p id="imprimer">imprimer</p></a>';
                    }else{

echo'<a href="../page/'.$lien.'.php?id='.$id_command_impression.'"  id="btn-del-com" ><p id="imprimer">imprimer</p></a>';
                  }}



 ?>
 
</body>
 
</html>
