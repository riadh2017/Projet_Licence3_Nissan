

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
	top:28%;
	background:rgba(7,6,17,0.9);
	vertical-align: top;
	right:0;
	color: white;
   left:330px;
   width: 50%;
overflow: hidden;
word-wrap:break-word;
   height: 50%;
   padding:5px 5px 0px 5px;
   border-radius: 9px;
   font-size: 1.3em;
	overflow: auto;
	z-index: 9000000000000;

}          
#ecriture{padding: 20px 20px 20px 20px;}                                                
</style>
</head>
<body>
<?php
try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}

if(isset($_POST['q1'])){
$q = utf8_decode($_POST['q1']);

   $req1=$bdd->query('select * from messagerie where id_messagerie='.$q.' ');
  
  echo"<div  id='res' onclick='takfa();'  >";
echo'';
echo "<p id='titre1'>MESSAGE</p>";

echo'<div id="ecriture">';
echo'<div id="objet">L\'objet :</div><br>';
$donne=$req1->fetch();
		echo '<u id="ligne"></u>'.$donne['message']; echo".<br>";
echo'</div>';

}
?>
</body>
</html>