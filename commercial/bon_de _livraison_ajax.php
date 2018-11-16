<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:./../Login.php');
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<style>

#ligne{
	text-align: center;
	margin-left: 90px;
	margin-right: 10px;
	color: red;
}
#titre1
{
text-align: center;
	color:white;
	text-decoration: underline;
	font-size: 1.3em;

}
#res
{ 
	border: 2px inset white;
	position: absolute;
	top:120px;
background:rgba(7,6,17,0.9);

	vertical-align: top;
	right:0;
	color: white;
	left:800px;
   width: 550px;
   height: auto;
   padding:5px 5px 0px 5px;
   border-radius: 9px;
	z-index: 2;
}                                                          
</style>
</head>
<body>
<?php
try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}

if(isset($_POST['q1'])){
$q = utf8_decode($_POST['q1']);

   $req1=$bdd->query('select * from command');
  echo"<div  id='res' onclick='takfa();' >";
echo "<p id='titre1'>Commande:</p>";
while($donne=$req1->fetch())
{
	if($donne['id_command']==$q){
     $id_command=$donne['id_command'];
echo"<script>alert('pas de bon de commande ');</script>";
	echo '<u id="ligne">Numero:</u>'.$donne['numero_bon']; echo"<br>";
	echo'<u id="ligne">Date:</u>'.$donne['date_command'] ;echo'<br>';
	echo '<u id="ligne">Montant:</u>'.$donne['montat'] ;echo'<br>';
	echo '<u id="ligne">Reste a payer:</u>'.$donne['rest_a_payer'] ;echo'<br>';
	echo '<u id="ligne">Delais de livraison:</u>'.$donne['dalai_livraison'] ;echo'<br>';
	echo '<u id="ligne">Adresse de livraison:</u>'.$donne['adresse_livraison'] ;echo'<br>';
	echo '<u id="ligne">Mode:payment / vente:</u>'.$donne['mode_de_paymant'].' / '.$donne['mode_de_vente'];echo'<br>';
	echo '<u id="ligne">Etat de la commande:</u>'.$donne['etat_command'] ;echo'<br>';
	echo '<u id="ligne">Date de reception a alger:</u>'.$donne['date_rec_algere'] ;echo'<br>';
	echo '<u id="ligne">Stock:</u>'.$donne['stock'] ;echo'<br>';echo'<br>';echo'<br>';echo'<br>';
}
}
}
?>
</body>
</html>