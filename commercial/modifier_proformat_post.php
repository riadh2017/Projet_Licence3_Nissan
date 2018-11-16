


<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:./../Login.php');
}

try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); 

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage()); 
 
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
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">

</head>
<style>
#right
{
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
  top:350px;
  left: 650px;
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
btn-commande5
{

}

#ppp
{
  width: 140px;
  height: 140px;
}
#btn-del-co
{
 position: absolute;
 top: 40%;
 left: 50%;
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
           <li><a   id="commande" href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">recu de versemet</a></li>
			<li><a  href="suiver_des_client.php">suivie des client</a></li>
      <li><a  href="mode_de_vente.php">mode de vente</a></li>

			<li><a href="deconnexion">deconnexion</a></li>
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
		

	   <form action="modifier_proformat_post_imprimer.php" method="post">
				 <div id="partie1">
                         <div id="client-commande">
                                                    
                         <?php             try {

                $bdd1 = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
                 if(isset($_POST['id_client']))
                 {
                echo'   <h1>client</h1>';
   $info_client=$bdd1->query('select * from client where (client.id_client = \''.$_POST['id_client'].'\')');
   $donnee = $info_client->fetch();
 $id_facture =  $_POST['id_facture'];
  $id_client = $_POST['id_client']; 	
   	$nom = $donnee['nom'];
   	$adresse_client = $donnee['adresse'];

   $telephone = $donnee['tele'];   ?>
                           
                           <input type="hidden" name="id_facture" value="<?php echo $id_facture; ?>" />
					       <input type="hidden" name="id_client"  value="<?php echo $id_client; ?>"  />
                            <label for="nomclient" class="text-commnade">Nom du client</label><input type="text" id="nomclient-com" name="nom" value="<?php echo $nom; ?>" required/>
                            <label for="adresse-client" class="text-commande">Adresse</label> <input type="text" id="adresse-com" name="adresse_client" value="<?php echo $adresse_client; ?>" required/>
                            <label for="tel" class="text-commande">Tel </label><input type="text"id="tel-com" name="tel" value="<?php echo $telephone; ?>"required/>
                    


						<?php   $info_client->closeCursor();
          }

            ?>	
							  
         		        </div>
						<div id="btn-commande">
									<input type="submit" value="Enregistrer" name="valider" id="btn-save-com" >
<?php
if (isset($_GET['message']) and isset($_GET['ident'])) {


   echo'<script>  



                 var element=document.getElementById("btn-save-com");
             element.type="hidden";

                </script>';

try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());  }
$req1=$bdd1->query('select mode_de_vente from  facture_pro where id_facture='.$_GET['ident'].'');
$donnee1=$req1->fetch();
$lien=$donnee1['mode_de_vente'];
      if ($lien=='TTC ENTERPRISE') {
      $lien='TTC_ENTERPRISE';
      }

echo '<a href="../page/fact'.$lien.'.php.?id='.$_GET['ident'].'" id="btn-del-co"><img id="ppp" src="images/print.png" /></a>';
}



?>

								
						</div>
				</div>
						<div id="items">

					<?php if(isset($_POST['id_facture'])){?>
                                               <h1>ITEMS</h1>
                                               
                            <input id="ajt" type="button" value="Ajouter" class="item_boton"  >
                            <input id="sup" type="button" value="Supprimer"  class="item_boton">
                                
								<div id="top">

                  <?php 

                  $requette=$bdd->query('SELECT * from iteme_facture where id_facture='.$id_facture.' '); 


                  while (($it=$requette->fetch())) {

                    
                  ?>
                                            <div id="div">
                                               <label for="designation" class="text-commande-align">Designation</label>
                                               <select id="val1" name="designe" required>

                                          <?php  if($it['designation']!=''){ echo '<option>'.$it['designation'].'</option>';}?>

													<?php   
  $req=$bdd->query('SELECT *  from  modele_veh   ');

while(($donnee=$req->fetch()))
                       {  if($donnee['designation']!=$it['designation']){?>

              <option> <?php echo  $donnee['designation'];?> </option>
 <?php 
}
}

$req->closeCursor();

 ?>
				</select>
																
                                               <label for="qauntite" class="text-commande-align">Quantite</label> <input id="qauntite-com" type="number" value="<?php echo $it['quantite'];?>" name="quantite" min="1" required/>
                                              
                                               <label for="couleur" class="text-commande-align">Couleur </label><select id="couleur-com" name="couleur" required>
												

                        	<?php

                           if($it['couleur']!=''){ echo '<option>'.$it['couleur'].'</option>';}

													$req1=$bdd->query('select *  from  couleur  ');
													while(($donnee1=$req1->fetch())){
                                  
                                  if($donnee1['code_couleur']!=$it['couleur']){   
                                                   ?>
													<option><?php echo $donnee1['code_couleur'];?></option>
													<?php  
                        }
                      }
$req1->closeCursor();
													?>
											
													</select> 											   
                                            </div>

                                            <?php }?>
                                </div>
								
                         </div>
			
			            <div id="info-commande">

                                               <h1> La Facture </h1>


                                               <?php

                                                if(isset($_POST['id_client']))
                 {
                                                  $info_facture=$bdd1->query('select * from facture_pro where (facture_pro.id_facture = \''.$_POST['id_facture'].'\')');

                                     $donnee = $info_facture->fetch();
                                    $date=$donnee['date_facture'];
                                     $validite=$donnee['validete_de_loffre'];
                                     $mode_vente=$donnee['mode_de_vente'];
                              
                                  

                                               ?>
                            <label for="date-commande" class="text-commande">Date de la facture</label><input value="<?php echo $date; ?>" type="date" class="select-com" name="date_facture" required/>
                            <label for="delai-commande" class="text-commande">Validité de l'offre</label><input type="date" value="<?php echo $validite; ?>"id="delai-com" name="validite" required/>
                                
<?php }
        else
        {
          echo ' <label for="date-commande" class="text-commande">Date de la facture</label><input  type="date" class="select-com" name="date_facture" />
                            <label for="delai-commande" class="text-commande">validite de loffre</label><input type="date" id="delai-com" name="validite" />';
        }


?>
                          <label for="mode-vente" class="text-commande">Mode d'achat</label>
                           <select class="select-com" name="mode_de_vente" required>
                          <?php 
                             
                          echo '<option>'.$mode_vente.'</option>' ?>
                            <option>TTC</option>
                            <option>TTC ENTERPRISE</option>
                            <option>ANSJ</option>
                            <option>CNAC</option>
                            <option>LEASING</option> 
                            <option>HDD</option>
                            <option>ANDI</option>
                        </select>
							
						
					
				  </form>
           
            </div></div>
			
<?php }?>
			</div></div>
	</div>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
</div>

<?php
if(isset($_GET['message']))
{
  if($_GET['message']==1){
   
 echo'<script>alert("facture modifier avec succe")</script>';
  }
}
if(isset($_GET['alert']))
{
  if($_GET['alert']==1)
  {
    echo'<script>alert("items identique !!!!!!!!")</script>';
  }
}
echo"<script>


var queryAll8 = document.querySelectorAll('#top #div #val1');
var r=queryAll8.length;
var val = document.getElementById('ajt');

val.addEventListener('click', function() {
var span = document.getElementById('div');
var span2 = span.cloneNode(true);
r++;
span.parentNode.appendChild(span2);},false);



var val = document.getElementById('sup');

val.addEventListener('click',function(){

var queryAll = document.querySelectorAll('#top #div #val1');
var l=queryAll.length;

if(l>1){
var element = document.getElementById('top');
element.removeChild(element.lastChild);

 }},false);


</script>";?>

<script>

var element1 = document.getElementById('btn-save-com');
element1.addEventListener('click',function(){
var queryAll = document.querySelectorAll('#top #div  #val1');
var queryAll1 = document.querySelectorAll('#top #div  #couleur-com');
var queryAll2 = document.querySelectorAll('#top #div  #qauntite-com');
var l = queryAll.length;
var k=1;
while(k<l){
queryAll[k].name = "designe"+k+"";
k++;
}
var l1 = queryAll1.length;
var k1=1;
while(k1<l1){
queryAll1[k1].name = "couleur"+k1+"";
k1++;
}
var l2 = queryAll2.length;
var k2=1;
while(k2<l2){
queryAll2[k2].name = "quantite"+k2+"";
k2++;
}




},true);

</script>
</body>
 
</html>
