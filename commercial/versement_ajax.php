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

   $req1=$bdd->query('select * from  recu_verssement');
  echo"<div  id='res' onclick='takfa();'  >";
echo "<p id='titre1'>Recu de versement :</p>";
while($donne=$req1->fetch())
{     
	if($donne['id_rv']==$q){
      
      $id_command=$donne['id_command'];
$req11=$bdd->query('select numero_bon from  command where id_command=\''.$id_command.'\' ');
 	$tak=$req11->fetch();
 	echo'<u id="ligne">Numero bon a verser  :</u>'.$tak['numero_bon'] ;echo'<br>';
	echo'<u id="ligne">Date de versement :</u>'.$donne['date_de_verssement'] ;echo'<br>';
	echo '<u id="ligne">Versement :</u>'.$donne['versement'] ;echo'<br>';
	echo '<u id="ligne">Rest a payer :</u>'.$donne['rest_payer'] ;echo'<br>';echo'<br>';
	
}
}
}
?>
</body>
</html>