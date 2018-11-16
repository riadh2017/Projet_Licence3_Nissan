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
<title>ojojooj</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/livraison_icon.jpg">
			
</head>

       <style>


body
{
  
}

 #model1
{
margin-left: 10px;
color: black;


}
#couleur1
{
margin-left: 90px;
color: black;

}
#chassis1
{
margin-left: 180px;
color:black;
 }
#matricul1
{
margin-left: 160px;
color: black;
}
.client2
{
 margin-top: 3px;
 margin-bottom: 10px;

 }
 #liv{color: black;}
#couleur1{margin-left: 134px;}
#izan1,#izan
{
 display: inline-block;
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
text-decoration: none;
padding-top: 8px;
background: rgb(183,15,23);
color: white;
width: 190px;
height: 30px;
border-radius: 3px;
position: relative;
text-align: center;
left: 380px;
top: 200px;
font-size: 1.1em;
}

input
{
 border-radius: 5px;
height:25px;
width: 200px;
 margin-top: 2px;
 font-size: 1.1em;
 }
#client1
{ 
  margin-bottom: 10px;

  
 }

#izan_ameqran,#chassis_matricule
{
display: inline-block;

}
#inegura
{
 margin-top: 50px;
 
 width: 700px;
}
.envo
{

margin-top: 50px;
background-color: rgb(183,15,23);
border:none;
border-radius: 3px;
font-size: 1.1em;
color :white;
height:40px;
width: 180px;
margin-left: 600px;
}             

.envo:hover
{
filter: none; background-color: rgb(238,34,45);

}

#right,#left
{
  display: inline-block;
  
}
#right
{
  width: auto;
}
#section
{width: auto;
 
}
#client-liv1
{
  width: 400px;

}
#br,.envo
{
display: inline-block;
}
#liv
{
	margin-left: 20px;
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
            <li><a  href="../accuil-chef.php">accueil</a></li>
            <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  id="livraison" href="livraison.php">bon de livraison</a></li>
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
      <?php
if(isset($_GET['id_command']) and isset($_GET['message']))
{
 echo"<script>alert('bon e ete  ajouter avec succe');</script>";
  
 $id_command_imprimer=$_GET['id_command'];

echo'<a href="../page/bon_de_livraison.php?id_command='.$id_command_imprimer.'" id="br"><p id="brahim">imprimer</p></a>';


}else
{
?>
		   <div id="">

<form action="ajouter_livraison_etablire.php" method="post">
                         <div id="client-liv1">
                          <?php   



if(isset($_POST['id_command']))
{
 $id_command_livraison=$_POST['id_command'];
$numero_bon=$_POST['numero_bon'];
$id_client_livraison=$_POST['id_client'];?>  

     <input type="hidden" name="id_command_livraison" value="<?php echo $id_command_livraison?>" />
           <input type="hidden" name="numero_bon" value="<?php echo $numero_bon ; ?>" />


                                                  

                                                   

						        
<?php   
/**********recherche les item du bon selectioner *///////////////
$item=0;
$bool=0;
$req_verification=$bdd->query('select * from item where(item.id_command=\''.$id_command_livraison.'\')');
while($donne=$req_verification->fetch())
{
$tab_item[$item]=$donne['id_item'];
$item=$item+1;
}
              
/*************** verification***********///
$i=0;
$req_verification1=$bdd->query('select id_item from matricul_chassis' );
while($donne1=$req_verification1->fetch())
{

for($i=0;$i<$item;$i++)
{
if($tab_item[$i]==$donne1['id_item'])
{
$i=$item;
$bool=1;
$req_verification1->closeCursor();
}
}

}
 if($bool==0)
 {

$req1=$bdd->query('select *  from  client where (client.id_client=\''.$id_client_livraison.'\') ');
        $donne=$req1->fetch();
$nom=$donne['nom'];
$req1->closeCursor();
                          ?>

						    Client <input type="text" class="client2" name="client"  value="<?php echo $nom;?>" disabled/>

</div>

<div class="compagno">

<div id="chassis_matricule">

<?php
echo'<span id="model1">model  </span><span id="couleur1">couleur  </span><span id="chassis1">chassis  </span><span id="matricul1">matricul </span><br>';
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
echo'<input type="hidden" id="id_item" name="id_item" value="'.$id_item1.'" />';
							    echo'<label for="modele-liv" class="text-eliv"></label>  
						   <input type="text" id="model" name="model" value="'.$designe.'" disabled/>';

				echo'<label for="modele-liv" class="text-eliv"> </label> <input type="text" id="couleur" name="couleur" value="'.$couleur.'" disabled/>';

              echo'                   <label for="chassis-li1v" class="text-eliv" > </label><input type="text" value="" id="chassis" name="chassis" />              
                
                 <label for="chassis-li1v" class="text-eliv" > </label><input type="text" value="" id="matricule" name="matricule" />
</br>';
       $req1->closeCursor();

$i=$i+1;  }


}
$req->closeCursor();

}else{

  header('location:livraison.php?message=5');
}

}
else
{

echo'   CLient <input type="text" class="client2" name="client"  disabled/>

<br><br><br><br><br>

 <span>Designation</span><span>Couleur</span><span>matricul</span><span>chassis</span> <br>
 <input type="text" id="model" name="model"  disabled/>

        <label for="modele-liv" class="text-eliv"> </label> <input type="text" id="couleur" name="couleur"  disabled/>

                             <label for="chassis-li1v" class="text-eliv" > </label><input type="text" value="" id="chassis" name="chassis" />              
                
                 <label for="chassis-li1v" class="text-eliv" > </label><input type="text" value="" id="matricule" name="matricule" /> ';

}
?>
</div>

<div id="inegura">
  
								   <label  id="li">Delivré le </label> <input type="date"id="ddd"  name="lieu-liv"/>
							     <label id="il"> N° c.i.n/pc </label><input type="text" id="liv1" name="pc-liv"/><br><br>
                   <label > code facture  </label><input type="text" id="liv1" name="code_facture" required/>
                   <label id="liv"> code client  </label><input type="text" id="liv1" name="code_client" required/>

<style>
#li
{
  margin-left: 23px;
}
#il{
  margin-left: 27px;
}
#inegura input
{
border-radius:5px; 
}
</style>

</div>
<input type="submit" id="envoyer" class="envo" value="Etablire" name="etablire"/>

</div>
	

						
                        		
								</form>		

</div>
									  
        
			
		</div>
<?php }?>

	</div>
			</div>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
    

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

</body>
 
</html>
