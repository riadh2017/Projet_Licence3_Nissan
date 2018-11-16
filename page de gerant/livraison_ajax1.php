


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<style>

#lien
{
	font-size: 1.2em;
	text-decoration: blink;
	margin-left: 180px;
}
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
	left:30%;
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

   $req1=$bdd->query('select * from bon_livraison');
  echo"<div  id='res' onclick='takfa();'  >";
echo "<p id='titre1'>Bon livraison :</p>";
while($donne=$req1->fetch())
{
	if($donne['id_bon_livraison']==$q){


	echo '<u id="ligne">Numero du bon de commande corrspandant:</u>'.$donne['numero_bon']; echo"<br>";
	echo'<u id="ligne">Date:</u>'.$donne['date_livraison'] ;echo'<br>';
	echo '<u id="ligne">Adresse delivrais :</u>'.$donne['delivrais_adrese'] ;echo'<br>';
	echo '<u id="ligne">CCP :</u>'.$donne['ccp'] ;echo'<br>';
	echo '<u id="ligne">CODE FACTURE :</u>'.$donne['code_facteur'] ;echo'<br>';echo'<br>';

	 echo"<a id='lien' href='item_gerant.php?id_command=".$donne['id_command']."' >voire la liste des items </a>";echo'<br>';echo'<br>';

}
}
}
?>
</body>
</html>