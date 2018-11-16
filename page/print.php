
<html>
<head>

<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<title>Document sans titre</title>
</head>
<style>
#retour
{
	width: 200px;
	height: 30px;
	padding-top: 7px;
	background: red;
  color: white;
  font-size: 1.1em;
	border: 1px solid black;
  position: absolute;
  left: 60%;
  top:40%;

}
.lien
{
	text-decoration: none;
	color: white;
	text-align: center;


}
</style>
<body>

<?php
   
$mode=$_GET['id_command'];
?>


<?php           

try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }
$req=$bdd->query('select * from mode_de_vente where mode_de_vente.mode=\''.$mode.'\' ');
$donne=$req->fetch();

$mode=$donne['mode'];

if($mode=='TTC'){$mode=$mode.' PARTICULIER';}
if($mode=='CNAC'){$mode='ANSEJ '.$mode;}
if($mode=='ANSEJ'){$mode=$mode.' CNAC';}
$i=0;
 $mode_de_paiement = explode("\n", $donne['mode_de_paiement']);
$obligatoir=explode("\n", $donne['documents_obligatoires']);

?>
<div id="vente"><h2 >VENTE <?php   echo $mode;?></h2></div>


<b>Montant Minimum </b><br> 
<div id="a"><?php echo $donne['montant_min']; ?></div>
<br>
<b>Mode de payement Autorise</b><br> 
<div id="b"><?php foreach ($mode_de_paiement as $key) {
 
 echo $key.'<br>';

}?></div><br>

<b>Documents obligatoire</b> <br><div id="c"> <?php foreach ($obligatoir as $key1) {
 
 echo $key1.'<br>';

}?></div>

<a href="..\commercial\mode_de_vente.php" id="takfa"class="lien"><p id="retour">retour</p></a>
<style>
#a{margin-bottom: 10px;margin-top: 5px;}
#b{margin-bottom: 10px;margin-top: 5px;}
#c{margin-top: 15px; margin-top: 5px}

#vente{
margin-left: 150px;
text-decoration: underline;
font-size: 1.4em;

}
</style>




 <script> 

window.print();

 
 </script>

 </body>
</html>