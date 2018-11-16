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
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">
<style type="text/css"> a{

text-decoration: none;


  }
  #form_modif
  {
    margin-top: 20px;
    margin-left: 200px;
  }
#salim{

width: 180px;
border: 1px red;
height: 16px;
color: white;
padding-bottom: 15px;
background: rgb(183,15,23);
border-radius: 3px;
text-align: center;
padding-top: 10px;
margin-left: 10px;
}
#salim:hover
{

background-color: rgb(238,34,45);

}
#text1,#text2
{
    display: inline-block;

}
#text2
{

 font-size: 1.1em;
  margin-left: 2%;
}
#text1
{

 font-size: 1.1em;
  margin-left: 2%;
}
#mode
{
  margin-left: 20px;
  font-size: 1.4em;
}
#autoriser
{
  font-size: 1.1em;
font-weight: bold;
  border-radius: 9px;

}
#montant_min
{
margin-left: 2%;
  font-size: 1.1em;
  font-weight: bold; 
  width: 380px;
  height: 30px;
  border-radius: 7px;
}
#montant
{
  margin-left: 2%;
  font-size: 1.1em;
}
.imprim
{
  margin-left: 500px;
}


</style>
</head>
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
            <li><a   href="../accuil-chef.php">accueil</a></li>
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
		<div id="right">
		<div id="section-saisie-commande">

	  <div id="form_modif">
<form action="mode_de_vente.php" method="post">
	<label for="mode-vente" class="text-commande">mode d'achat</label> 
                           <select class="select-com" id="takfa1" name="mode_de_vente">
                           	<option></option>
                            <option>TTC</option>
                            <option>TTC ENTREPRISE</option>
                            <option>ANSJ</option>
                            <option>CNAC</option>
                            <option>LEASING</option> 
                            <option>HDD</option>
                            <option>ANDI</option>
                        </select>
                         <input type="submit" value="Modifier" name="modifier" id="btn-save-com" > 

     <input type="button" value="Imprimer" name="Imprimer" id="btn-save-com1" onclick="takfa();" /><br></br>
</form>
                         <?php
                         if(isset($_POST['modifier'])){ 
            try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); 

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage()); 
 
                 }

if($_POST['mode_de_vente']=='')
{

echo'<script>alert("Choisire un mode a imprimer !!!")</script>';
header('Location:mode_de_vente.php?message=8');
}else{
   $req1=$bdd->query('SELECT * from mode_de_vente where mode= \''.$_POST['mode_de_vente'].'\' ');
   $donne=$req1->fetch();
   $req1->CloseCursor();

 
    ?>
              <span id="mode">  <?php echo $donne['mode']; echo'<br>';?> </span>         

 <br>
 <form action="mode_de_vente.php" method="post">
 <input type="hidden" name="mode1" value="<?php echo $donne['mode'];?>" />
 <label id="montant">Montant Minimnum</label><br><input type="text" name="montant_min" id="montant_min" value="<?php echo $donne['montant_min'];?>"/><br><br>


 <p id="text1">
<label for="mode_payment_auto">Mode de payment Autorisé</label><br />
<textarea  id="autoriser" cols="40" rows="7" name="auto"><?php echo $donne['mode_de_paiement'];?></textarea>
</p>

 <p id="text2">
<label for="doc_obligatoires">Documents obligatoires </label><br />
<textarea  id="autoriser"cols="40" rows="7" name="obligation"><?php echo $donne['documents_obligatoires'];?></textarea>
</p>
<input type="submit" value="VALIDER" name="valid_modif"  id="btn-save-com2" ><br></br>

  </form>
 
<?php }}
?>                   <br>     


     </div>

     <script>
    
     function takfa(){
        var element=document.getElementById('takfa1');
       var ta = element.value;
if(ta!=''){
             window.location.href=("../page/print.php?id_command="+ta+"");
}else
{
  alert('Choisire un mode a imprimer !!! ');
}
}
      </script>




            </div>
			
		</div>
		</div>	
	</div>
  
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
     
</div>
<?php

if(isset($_GET['message']))
{
if($_GET['message']=='2')
{
	echo"<script>alert('le bon a ete supprimer avec succe');</script>";
}


if(($_GET['message']=='3')){

	echo"<script>alert('bon e ete  modifier avec succe');</script>";

}


}

if(isset($_POST['modifier'])){ 
echo'<script>  



                 var element=document.getElementById("btn-save-com1");
             element.type="hidden";
                </script>';}


?>
<?php
if(isset($_POST['valid_modif']))
{
  try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); 

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage()); 
 
                 }

$mode=$_POST['mode1'];


$auto=$_POST['auto'];

$obligation4=$_POST['obligation'];
$min=$_POST['montant_min'];
$request_modif = $bdd->prepare('UPDATE mode_de_vente SET mode_de_paiement = :autori, documents_obligatoires = :doc, montant_min = :mont WHERE (mode_de_vente.mode = :mod)');
$request_modif->execute(array(
'autori' => $auto,
'doc' => $obligation4,
'mont' => $min,
'mod' => $mode
));
$request_modif->closeCursor();
echo"<script>alert('le mode ".$mode." a ete modifier avec succe ');</script>";

}

 ?>

<?php  if (isset($_GET['message'])){
  if($_GET['message']=='8')
    {
        echo"<script>alert('selection un mode !!!!!!!!');</script>";
    }
}
?>
</body>
 
</html>
