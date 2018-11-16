
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<title>Document sans titre</title>
</head>
<body>

<?php
  
   ob_start(); 
   

$mode=$_GET['id_command'];
?>
<page backtop="35mm" backleft="20mm" backright="20mm" backbottom="20mm" >

<img src="takfa1.jpg" width="200"></img>

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

<style>
#a{margin-bottom: 10px;margin-top: 5px;}
#b{margin-bottom: 10px;margin-top: 5px;}
#c{margin-top: 15px; margin-top: 5px}
</style>

</page>



<a href="hhh.php" id="takfa" >lien</a>


 <script> 

window.print();

 
 </script>

 </body>
</html>