

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

   $req1=$bdd->query('select * from client');
  echo"<div  id='res' onclick='takfa();'  >";
echo "<p id='titre1'>Client :</p>";
while($donne=$req1->fetch())
{
	if($donne['id_client']==$q){


	echo '<u id="ligne">Nom:</u>'.$donne['nom']; echo"<br>";
	echo'<u id="ligne">Adresse:</u>'.$donne['adresse'] ;echo'<br>';
	echo '<u id="ligne">Telephone :</u>'.$donne['tele'] ;echo'<br>';
	echo '<u id="ligne">Matricule fiscale  :</u>'.$donne['matricul_fiscal'] ;echo'<br>';
	echo '<u id="ligne">Registre commerce :</u>'.$donne['n_registre'] ;echo'<br>';
	echo '<u id="ligne">Date enregistre :</u>'.$donne['date_enregistre'] ;echo'<br>';echo'<br>';echo'<br>';
}
}
}
?>
</body>
</html>