<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('Location:./../Login.php');
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
<title>ojojooj</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/livraison_icon.jpg">
			
</head>

 <style>
 #right,#left
 {
  display: inline-block;
  }
 #a{
margin-left:0%;

 }
 #b
{
margin-left: 35%;
}
#c
{
margin-left:35%;
}
#d
{
margin-left: 32%;
}
.client2
 {
  margin-top: 10px;
  width: 180px;
  height: 25px;
  border-radius: 4px;
}
#liv{color: white;}
 #couleur1{margin-left: 134px;}
#izan1,#izan
 {
display: inline-block;
}
input
{
border-radius: 6px;
height:20px;
margin-top: 2px;
}
#client1
{
margin-bottom: 1px;
}
#izan_ameqran,#chassis_matricule
{
display: inline-block;
}
#inegura
{
  margin-top: 50px;
}
#inegura input
{
  width: 180px;
  height: 25px;
  border-radius: 4px;

}
.envo
{
margin-left: 75%;
background-color: rgb(183,15,23);
border:none;
border-radius: 3px;
font-size: 1.1em;
color :white;
height:40px;
width: 180px;
}
.envo:hover
{
  filter: none; background-color: rgb(238,34,45);

}
#btn-del-com
{
  text-decoration: none;

  


}
#imprimer
{
  position: absolute;
  left:25%;
  top: 35%;
  width: 180px;
  padding-top: 7px;
  text-align: center;
  font-size: 1.1em;
  height:30px;
  border-radius: 3px;
  background: rgb(183,15,23);
  margin-left: 20%;
  font-weight: lighter;
}
#imprimer:hover
{background: rgb(238,34,45);

}
</style>
        
<body>

	<?php
	try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}



?>




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
            <li><a   href="commande.php">bon de commande</a></li>
            <li><a  id="livraison" href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">recu de versemet</a></li>
			<li><a  href="suiver_des_client.php">suiver des client</a></li>
      <li><a  href="mode_de_vente.php">mode de vente</a></li>
      
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
                      </ul>
        </div>  
    </div>
	<div id="section">
<div id="left">
		
	
    <ul id="liste_option">
      <div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="livraison-ajouter.php" >ajouter</a> </li></div>
      <div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="livraison-modifier.php">modifier</a></li></div>
      <div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="livraison-supprimer.php"> supprimer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>
		
		
		
		
		</div>
		
		<div id="right">
		   
<form action="modifier_livraison_etablire.php" method="post">
                         <div id="client-liv1"><?php   


	

if(isset($_POST['id_command']))
{
$id_command_livraison=$_POST['id_command'];
$numero_bon=$_POST['numero_bon'];
$id_client_livraison=$_POST['id_client'];   



                                                 ?> 
<div class="client1"> 
<input type="hidden" name="id_command_livraison" value="<?php echo $id_command_livraison?>" />
<input type="hidden" name="numero_bon" value="<?php echo $numero_bon?>" />                                                   

						        
<?php   
                                                                        
$req1=$bdd->query('select *  from  client where (client.id_client=\''.$id_client_livraison.'\') ');
        $donne=$req1->fetch();
$nom=$donne['nom'];
$req1->closeCursor();
                          ?>

						    Client <input type="text" class="client2" name="client"  value="<?php echo $nom;?>" disabled/>

</div>

<div class="compagno">

<div id="chassis_matricule">

<span id="a">modele</span><span id="b">couleur</span><span id="c">matricule</span><span id="d">châssis</span><br>

<?php
$req=$bdd->query('select *  from  item  where   (item.id_command=\''.$id_command_livraison.'\') ');
      while(  $donne=$req->fetch()){

$i=1;     	$designe=$donne['designation']; 
           $couleur=$donne['couleur'];
	

  $id_item =$donne['id_item'];	
   $quantite=$donne['quantite'];

echo'<input type="hidden" id="quantite"name="quantite" value="'.$quantite.'" />';

 while($i<=$donne['quantite']){

$req1=$bdd->query('select *  from  matricul_chassis  where   (matricul_chassis.id_item=\''.$id_item.'\') ');

$donnee=$req1->fetch();
      
      $id_item1= $donne['id_item'];	
      $chassis=$donnee['chassis'];

							    echo'<label for="modele-liv" class="text-eliv"></label>  
						   <input type="text" id="model" name="model" value="'.$designe.'" disabled/>';

				echo'<label for="modele-liv" class="text-eliv"> </label> <input type="text" id="couleur" name="couleur" value="'.$couleur.'" disabled/>';
echo"<br>";
               echo'';
       $req1->closeCursor();

$i=$i+1;  }


}
$req->closeCursor();
?>
</div>
<div id="izan_ameqran">
<div id="izan">
<?php
$i=0;

/*******************recuperer les id_item **********************/
$req1212=$bdd->query('select *  from  item  where   (item.id_command=\''.$id_command_livraison.'\') ');
      while(  $donne=$req1212->fetch()){

$tab_couleur[$i]=$donne['designation'];
$tab_designation[$i]=$donne['couleur'];
$tabl[$i]=$donne['id_item'];
$i=$i+1;
                           }


$l2=0;
$t=0;
while($t<$i){
$req=$bdd->query('select *  from  matricul_chassis  where   (matricul_chassis.id_item=\''.$tabl[$t].'\') ');
     
 while($dooo=$req->fetch()){

 	 $table_chassis[$l2]=$dooo['chassis'];echo'<br>';
   $table_matricule[$l2]=$dooo['matricul'];
 $table_id[$l2]=$dooo['id'];
$l2=$l2+1;

     }
     $t=$t+1;
}
  

$m=0;
while($m<$l2){
echo'  <label for="chassis-li1v" class="text-eliv" > </label><input type="text" value="'.$table_chassis[$m].'" id="chassis" name="chassis" />
';echo "<br>";
echo'<input type="hidden" id="id_item" name="id_item" value="'.$table_id[$m].'" />';
$m=$m+1;
}
$m1=0;
?>
</div>
<div id="izan1">
<?php
while($m1<$l2){
echo'<label for="chassis-li1v" class="text-eliv" > </label><input type="text"  id="matricule" name="matricule" value="'.$table_matricule[$m1].'" />
';echo'<br>';
$m1=$m1+1;
}

?>

</div>

</div>
</div>
<input type="submit" id="envoyer" class="envo" value="modifier" name="etablire"/>
<div id="inegura">
  <?php

$requete=$bdd->query('select * from bon_livraison where bon_livraison.id_command=\''.$id_command_livraison.'\'');
$donn=$requete->fetch();

  ?>
  <label id="liv">Delivré le </label> <input type="date"id="ddd"   value="<?php echo $donn['delivrais_adrese']?>"name="lieu-liv"/>
								
							    <label id="liv"> N° c.i.n/pc </label><input type="text" id="liv1" value="<?php echo $donn['ccp']?>"name="pc-liv"/><br></br>

<label id="liv"> code facture  </label><input type="text" id="liv1"  value="<?php echo $donn['code_facteur'];?>"name="code_facture"required/>
<label id="liv"> code client  </label><input type="text" id="liv1"  value="<?php echo $donn['code_client'];?>"name="code_client"required/>


<?php }
else
{
  






}







?>
</div>
</div>
	

						</div>
                        		
   
                           	

				

								
														
								
								</form>		

									  
      
			
		</div>

</script>
	</div>
			</div>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
     
</div>
<?php if(isset($_GET['id_command']) and isset($_GET['message']))
{


echo"<script>alert('bon e ete  modifier avec succe');</script>";
$id_command=$_GET['id_command'];
echo'<a href="../page/bon_de_livraison.php?&id_command='.$id_command.'" id="btn-del-com"><p id="imprimer">imprimer</p></a>';

echo'<script>var element=document.getElementById("right");element.style.display="none";</script>';


}?> 
<script>
var element5 = document.getElementById('envoyer');
var queryAll = document.querySelectorAll('#chassis_matricule #model');
var queryAll1 = document.querySelectorAll('#chassis');
var queryAll2 = document.querySelectorAll('#matricule');

var queryAll3 = document.querySelectorAll('#id_item');

var queryAll4 = document.querySelectorAll('#chassis_matricule #couleur');

var queryAll5 = document.querySelectorAll('#chassis_matricule #quantite');

var l = queryAll.length;


element5.addEventListener('click',function(){
var k=1;
while(k<l){
queryAll[k].name = "model"+k+"";
k++;
}
var l1 = queryAll1.length;
var k1=1;
while(k1<l1){
queryAll1[k1].name = "chassis"+k1+"";
k1++;
}
var l2 = queryAll2.length;
var k2=1;
while(k2<l2){
queryAll2[k2].name = "matricule"+k2+"";
k2++;
}
var l3 = queryAll3.length;
var k3=1;
while(k3<l3){
queryAll3[k3].name = "id_item"+k3+"";
k3++;
}
var l4 = queryAll4.length;
var k4=1;
while(k4<l4){
queryAll4[k4].name = "couleur"+k4+"";
k4++;
}

var l5 = queryAll5.length;
var k5=1;
while(k5<l5){
queryAll5[k5].name = "quantite"+k5+"";
k5++;
}


},false);


</script>
<?php/* }*/?>
</body>
 
</html>
