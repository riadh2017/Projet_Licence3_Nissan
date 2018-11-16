<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<style>
.hhh
{
	opacity: 0.2;
}  

#livraison1
{
	display: inline-block;
	font-weight: bold;
	 font-size: 1.2em;
    border: 2px inset white;
	position: absolute;
    color: white;
	top:120px;
	margin-left: 10px;
	background:rgba(7,6,17,0.9);
	right:300px;
   
	left:23%;
    width: 25%;
    height: auto;
    padding:5px 5px 0px 5px;
    border-radius: 9px;
	z-index: 2;

} 

#livraison1,#res,#livraison2,#livraison3
{
	display: inline-block;
}
#ligne{
	color: red;
}

#ligne1{
	color: rgb(185,153,238);
}
#titre1
{
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
	right:15%;
	color: white;
font-weight: bold;
	 font-size: 1.2em;
    
	left:0px;
    width: 22%;
    height: auto;
    padding:5px 5px 0px 5px;
    border-radius: 9px;
	z-index: 2;
}
#lien
{
	padding:5px 5px 5px 5px;
	border-radius: 6px;
	font-size: 1.2em;
	margin-left:60px;
	color:blue;
	text-decoration: none;
	box-shadow: 2px 3px black;
border: 0px solid transparent;
background:rgba(7,6,17,0.9);

width: 130px;
color: white;
    font-size: 1.3em;
}
#livraison2
{

	display: inline-block;
    border: 2px inset white;
	position: absolute;
    color: white;
	top:0px;
background:rgba(7,6,17,0.9);

	right:300px;
	left:100%;
	margin-left: 10px;
    width: 60%;
    height: auto;
    padding:5px 5px 0px 5px;
    border-radius: 9px;
	z-index: 2;
font-weight: bold;
	 font-size: 1.2em;
    

}
#livraison3
{

	display: inline-block;
    border: 2px inset white;
	position: absolute;
    top:0;
    color: white;background:rgba(7,6,17,0.9);

	right:300px;
	left:100%;
	margin-left: 10px;
    width: 190%;
    font-size: 0.9em;
    height: auto;
    padding:5px 5px 0px 5px;
    border-radius: 9px;
	z-index: 2;


}  

#Aucun
{
	width:1200px;
	height: 150px;

}                                                        
</style>
</head>
<body>
<?php
try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}

if(isset($_POST['q1'])){
$bool1=0;
$i=0;
$j=0;
$taille=0;
$q = utf8_decode($_POST['q1']);
 $bool=0;  
   $req1=$bdd->query('select * from command  ');

  echo"<div title='clicker pour quitter cette affichage' id='res'  onclick='takfa();' >";
echo "<p id='titre1'>Commande : </p>";
while($donne=$req1->fetch())
{
	if($donne['id_client']==$q){
     $id_command[$i]=$donne['id_command'];
$numero_bon[$i]=$donne['numero_bon'];
  	echo '<u id="ligne1">Numero</u> : '.$donne['numero_bon']; echo"<br>";
	echo'<u id="ligne">Date</u> : '.$donne['date_command'] ;echo'<br>';
	echo '<u id="ligne">Montant</u> : '.$donne['montat'] ;echo'<br>';
	echo '<u id="ligne">Reste a payer</u> : '.$donne['rest_a_payer'] ;echo'<br>';
	echo '<u id="ligne">Delais de livraison </u> : '.$donne['dalai_livraison'] ;echo'<br>';
	echo '<u id="ligne">Adresse de livraison </u> : '.$donne['adresse_livraison'] ;echo'<br>';
	echo '<u id="ligne">Mode:payment / vente </u>: '.$donne['mode_de_paymant'].' / '.$donne['mode_de_vente'];echo'<br>';
	echo '<u id="ligne">Etat de la commande </u>: '.$donne['etat_command'] ;echo'<br>';
	echo '<u id="ligne">Date de reception a alger</u> : '.$donne['date_rec_algere'] ;echo'<br>';
	echo '<u id="ligne">Stock </u>: '.$donne['stock'] ;echo'<br>';echo'<br>';
echo'************************************************************';echo'<br>';
$bool=1;
$i=$i+1;
$taille=$taille+1;
}


}
if($bool==0)
{
   
	echo'<div id="Aucun">Aucun-Commande-effectuer</div>';

}else{

echo'</div>';

       echo'<div id="livraison1" onclick="takfa();"  >';
       echo'<p id="titre1">Versement : </p>';
$bool=0;
 while($j < $taille){
$req2=$bdd->query('select * from  recu_verssement where id_command=\''.$id_command[$j].'\' ' );
while($donne1=$req2->fetch()){
$bool=1;
      echo'<u id="ligne1">numero du bon a verser  </u> : '.$numero_bon[$j] ;echo'<br>';  
      echo '<u id="ligne">Versement</u>: '.$donne1['versement']; echo"<br>";	  
	    echo'<u id="ligne">Date de versement </u> : '.$donne1['date_de_verssement'] ;echo'<br>';
	    echo '<u id="ligne">reste a payer </u> : '.$donne1['rest_payer'] ;echo'<br>';echo'<br>';
echo'********************************************************************<br>';
}
 $j=$j+1;

}
if($bool==0)
{

	echo"pas de vercement ";echo"<br>";echo'<br>';
    echo'*****************************************************************';
}

      echo'<div id="livraison2" onclick="takfa();"  >';
       echo'<p id="titre1">Livraison  : </p>';
$m1=0;
 while($m1 < $taille){
$req3=$bdd->query('select * from  bon_livraison where id_command=\''.$id_command[$m1].'\' ' );
$donne3=$req3->fetch();
if($donne3['date_livraison']!=null){
      echo'<u id="ligne1">numero du bon  </u> : '.$numero_bon[$m1] ;echo'<br>';  
      echo '<u id="ligne">Date de livraison </u>: '.$donne3['date_livraison']; echo"<br>";
	   $m1=$m1+1;
	    echo'<u id="ligne">Adresse delivrais  </u> : '.$donne3['delivrais_adrese'] ;echo'<br>';
	    echo '<u id="ligne">CCP </u> : '.$donne3['ccp'] ;echo'<br>';
        echo'<u id="ligne">Code de facture  </u> : '.$donne3['code_facteur']; echo'<br>';echo'<br>';
echo'******************************************<br>';
}
else
{
	echo'<u id="ligne1">numero du bon  </u> : '.$numero_bon[$m1] ;echo'<br>';
	echo"pas de bon de livraison";echo'<br>';echo'<br>';
    echo'******************************************';echo'<br>';
	   $m1=$m1+1;
}
}

echo'<div id="livraison3" onclick="takfa();"  >';
       echo'<p id="titre1">Items : </p>';
$m2=0;

if ( isSet ( $id_command [ 'MAXLENGTH' ]) and $id_command [ 'MAXLENGTH']!=0)
$tailleMax = $params [ 'MAXLENGTH' ];else $tailleMax = $taille ;

echo $tailleMax;

 while($m2 < $tailleMax){
$req2=$bdd->query('select * from  item where id_command=\''.$id_command[$m2].'\' ' );
$don=$req2->fetch()	;
      echo'<span id="ligne1">numero du  bon  </span>  '.$numero_bon[$m2] ;echo'<br>';
      echo'<span id="ligne"> Model:</span>  '.$don['designation'].'.  ' ;echo'<br>';    
      echo '<span id="ligne">couleur:</span> '.$don['couleur'].'.  ';echo'<br>';	
      echo '<span id="ligne">le prix selon le bon :</span>  '.$don['prix_selon_bon'].'. ';	  
echo'<br>';
	    echo'<span id="ligne">quantite :</span>  '.$don['quantite'].'.' ;echo'<br>';echo'<br>';
 
 	    echo"<a id='lien'href='item.php?id_command=".$id_command[$m2]."'>voire Detail</a> ";echo'<br>';echo'<br>';
echo'******************************************************************<br>';

 $m2=$m2+1;

}














}
}


?>
</body>
</html>