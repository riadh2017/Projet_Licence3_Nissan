

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
	top:120px;background:rgba(7,6,17,0.9);

	vertical-align: top;
	right:0;
	font-size: 12px;
	font-weight: bold;
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

   $req1=$bdd->query('select * from modele_veh');
  echo"<div  id='res' onclick='takfa();'  >";
echo "<p id='titre1'>Modele :</p>";
while($donne=$req1->fetch())
{
	if($donne['id_modele_veh']==$q){


	echo '<u id="ligne">Designation:</u>'.$donne['designation']; echo"<br>";
	echo'<u id="ligne">Quantité :</u>'.$donne['quantite_stok'] ;echo'<br>';
	echo '<u id="ligne">Prix TTC :</u>'.$donne['TTC'] ;echo'<br>';
	echo '<u id="ligne">Prix HT_HDD  :</u>'.$donne['HT_HDD'] ;echo'<br>';
	echo '<u id="ligne">Prix HT_DDM :</u>'.$donne['HT_DDM'] ;echo'<br>';
	echo '<u id="ligne">Timbre :</u>'.$donne['TIMBRE'] ;echo'<br>';
	echo '<u id="ligne">Remise :</u>'.$donne['REMISE'] ;echo'<br>';echo'<br>';echo'<br>';
}
}
}
?>
</body>
</html>