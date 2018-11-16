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
	margin-left: 30px;
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

   $req1=$bdd->query('select * from facture_pro');
  echo"<div  id='res' onclick='takfa();'  >";
echo "<p id='titre1'>Facture:</p>";
while($donne=$req1->fetch())
{
	if($donne['id_facture']==$q){
     $id_facture=$donne['id_facture'];

	echo '<u id="ligne">Numero:</u>'.$donne['numero_fact']; echo"<br>";
	echo'<u id="ligne">Date:</u>'.$donne['date_facture'] ;echo'<br>';
	echo '<u id="ligne">Montant:</u>'.$donne['montant'] ;echo'<br>';
	echo '<u id="ligne">validiter le loffre :</u>'.$donne['validete_de_loffre'] ;echo'<br>';
	echo '<u id="ligne">Mode de vente :</u>'.$donne['mode_de_vente'] ;echo'<br>';echo'<br>';echo'<br>';
}
}
}
?>
</body>
</html>