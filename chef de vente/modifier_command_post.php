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
  margin-left: 1px;
}

#btn-del-com
{
  text-decoration: none;
}
#imprimer
{
  position:absolute;
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
            <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  id="commande"href="commande.php">bon de commande </a></li>
            <li><a   href="livraison.php">bon de livraison</a></li>
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

     <form action="modifier_commande_post_imprimer.php" method="post">
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
 $id_command =  $_POST['id_command1'];
  $id_client = $_POST['id_client'];   
    $nom = $donnee['nom'];
    $adresse_client = $donnee['adresse'];
    $registre = $donnee['n_registre'];
    $matricul = $donnee['matricul_fiscal'];
   $telephone = $donnee['tele'];   ?>
                           
                           <input type="hidden" name="id_command" value="<?php echo $id_command; ?>" />
                 <input type="hidden" name="id_client"  value="<?php echo $id_client; ?>"  />
                            <label for="nomclient" class="text-commnade">Nom de client</label><input type="text" id="nomclient-com" name="nom" value="<?php echo $nom; ?>" required/>
                            <label for="adresse-client" class="text-commande">Adresse</label> <input type="text" id="adresse-com" name="adresse_client" value="<?php echo $adresse_client; ?>" required/>
                            <label for="tel" class="text-commande">Tel </label><input type="text"id="tel-com" name="tel" value="<?php echo $telephone; ?>"required/>
                            <label for="mat-fisc" class="text-commande">Mat.fisc </label><input type="text" id="fisc-com" name="mat_fisc" value="<?php echo $matricul; ?>"required/>
                            <label for="reg-commerce" class="text-commande">Registre du commerce N°</label><input type="text" id="reg-com" value="<?php echo $registre; ?>" name="reg_commerce" required/>
            <?php   $info_client->closeCursor();}



            ?>  
                
                    </div>



                    					<div id="btn-commande">
									<input type="submit" value="Valider" name="valider" id="btn-save-com" >
									                  <?php 
                   try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }

                  if(isset($_GET['message'])){


                      echo'<script>  



                 var element=document.getElementById("btn-save-com");
             element.type="hidden";

                </script>';

                    $id_command_impression=$_GET['id_command'];
                    $req=$bdd->query('select mode_de_vente from command where(id_command='.$id_command_impression.')');
                    $donne=$req->fetch();
                    $lien=$donne['mode_de_vente'];
                    if($lien=='TTC ENTREPRISE')
                    {
 
                      $lien='TTC_ENTERPRISE';
                       
                      echo'<a href="../page/'.$lien.'.php?id='.$id_command_impression.'" id="btn-del-com" ><p id="imprimer"> imprimer </p></a>';
                    }else{

echo'<a href="../page/'.$lien.'.php?id='.$id_command_impression.'" id="btn-del-com"  ><p id="imprimer">imprimer</p></a>';
                  }}
                    ?>  
						</div>
				</div>

            <div id="items">



                           <?php 
if(isset($_POST['id_command1'])){ ?>          
                                               <h1>ITEMS</h1>
                                               
                            <input id="ajt" type="button" value="ajouter" class="item_boton"  >
                            <input id="sup" type="button" value="Suprimer"  class="item_boton">
                                 
                <div id="top">
<?php
                            $res=$bdd->query('select * from item where id_command='.$_POST['id_command1'].' ') ;
        $i=0;                   
    while($ooo=$res->fetch()){
$i=$i+1;

                           ?>    
                                            <div id="div">
                                               <label for="designation" class="text-commande-align">Designation</label>
                                               <select id="val1" name="designe">
                          

                           <?php  if($ooo['designation']!=''){ echo '<option>'.$ooo['designation'].'</option>';}?>

                          <?php  
  $req=$bdd->query('select *  from  modele_veh ');

while(($donnee=$req->fetch()))
                       {?>

              <option> <?php echo  $donnee['designation'];?> </option>
 <?php }

$req->closeCursor();

 ?>
        </select>
                                
<label for="qauntite" class="text-commande-align">quantite</label> <input id="qauntite-com" type="number" name="quantite" value="<?php echo $ooo['quantite'];?>" min="1"/>
                                              
                                               <label for="couleur" class="text-commande-align">couleur </label><select id="couleur-com" name="couleur">
                          <?php
                          
                           if($ooo['couleur']!=''){ echo '<option>'.$ooo['couleur'].'</option>';}

                          $req1=$bdd->query('select *  from  couleur  ');
                          while(($donnee1=$req1->fetch()))
                                                      {?>


                          <option><?php echo $donnee1['code_couleur'];?></option>

                          <?php  }$req1->closeCursor();?>
                        </select>                          
                                            </div>
<?php  }?>



                                </div>


                                <?php


         $info_command=$bdd1->query('select * from command where (command.id_command = \''.$_POST['id_command1'].'\')');

                                    $donnee = $info_command->fetch();
                                    $date=$donnee['date_command'];
                                    $delais=$donnee['dalai_livraison'];
                                    $adresse_livraison=$donnee['adresse_livraison']; 
                                    $date_de_versement=$donnee['date_de_versement'];
                                    $montant_verser=$donnee['montant_verser'];
                                    $etat_command=$donnee['etat_command'];
                                    $mode_de_paymant=$donnee['mode_de_paymant'];
                                    $date1=$donnee['date_rec_algere'];
                                    $mode_vente=$donnee['mode_de_vente'];
                                    $stock=$donnee['stock'];

                                   



                          ?>
                          
                                   <label for="couleur" class="text-commande-align" >Etat de la command </label>
                                             <select name="etat" id="selection" name="etat">
                                              <option><?php   echo $etat_command  ?></option>
                                              <option>Traitement dossier</option>
                                              <option>didoun</option>
                                              <option>facturitation</option>
                                              <option>transfer de vehicule</option>
                                             </select>
<label for="couleur" class="text-commande-align">Date rec dosssier algere </label> <input value="<?php echo $date1; ?>" type="date" id="selection" name="date_rec" />
       

                                             <style type="text/css">
                                             #selection{
        margin-top: 100px;   width: 140px;height: 30px; border-radius: 9px;
        }

       #riad{
  border:1px  solid red ;
  color: white;
  background:red;
          }
          a{
text-decoration: none;

            }</style>
                         </div>
								
                         

			
			         
      
                  <div id="info-commande">

                                               <h1> La commande </h1>
                                        
                         
                                               
                            <label for="date-commande" class="text-commande">Date de commande</label><input value="<?php echo $date; ?>" type="date" class="select-com" name="date_command" />
                           <label for="delai-commande" class="text-commande">Delai de livraison</label>
                            <select id="delai-com" name="dalai_livraison" VALUE="" required >
                                <option><?php   echo $delais ?></option> 
                              <option>Arrivage + 45 jours</option> 
                              <option>15 jours</option> 
                              <option>45 jours</option> 
                            </select>
                         
                          
              
              <label for="espace" class="text-commande">stock vehicul</label>  
            <select class="select-com" name="stock" >
                            <option><?php echo $stock?></option>
                            <option>SARL djurdjura motors</option>
                            <option>Nissan algerie</option>
                        </select>
              <label for="mode-pay" class="text-commande">Mode de paiment</label>  
              <select class="select-com" name="mode_de_paymant">
                      <option> <?php   echo $mode_de_paymant ?></option>
                            <option> cheque </option>
                            <option>espace</option>
                          </select>
                           <label for="mode-vente" class="text-commande">mode de vente</label> 
                           <select class="select-com" id="takfa1" name="mode_de_vente" value="" required >
                            <option><?php echo $mode_vente; ?> </option>
                            <option>TTC</option>
                            <option>TTC ENTREPRISE</option>
                            <option>ANSJ</option>
                            <option>CNAC</option>
                            <option>LEASING</option> 
                            <option>HDD</option>
                            <option>ANDI</option>+
                        </select>
               <label for="date-versement"class="text-commande">Date Versement à compte</label><input value="<?php echo $date_de_versement; ?>" type="date" class="select-com" name="date_de_versement" />              
                            <label for="adresse-liv" class="text-commande">Montant verser </label><input value="<?php echo $montant_verser; ?>" type="text" id="adresse1-com" name="montant_verser"/>
                      </div>
                    <?php  $info_command->closeCursor();} ?>
          
          </form>  
            </div>

      
    </div>
      </div>
  </div>
  <div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
</div>

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


<?php 
if(isset($_GET['message'])){
if($_GET['message']=='1'){
echo'<script>  


alert("le bon a ete modifier avec succe");</script>';
}}
?>



<?php

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
