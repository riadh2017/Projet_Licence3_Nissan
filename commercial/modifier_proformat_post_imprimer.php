
<?php

if(isset($_POST['valider'])and ($_POST['valider'])){
 

try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}



$liste_item_test=1;
$d1=0;
$c1=0;
$q1=0;
/***************** teste designe ****************/

               $tab_designation1[$d1] = $_POST['designe'];
               $tab_couleur1 [$c1]= $_POST['couleur'];
               $tab_quantite1 [$q1]= $_POST['quantite'];

              while (isset($_POST['designe'.$liste_item_test])){
             $d1=$d1+1; $c1=$c1+1;$q1=$q1+1; 
               $tab_designation1[$d1] = $_POST['designe'.$liste_item_test];
               $tab_couleur1 [$c1]= $_POST['couleur'.$liste_item_test];
               $tab_quantite1 [$q1]= $_POST['quantite'.$liste_item_test];
               $liste_item_test = $liste_item_test+1;
                  }
$i=0;
$j=1;
$bool_identique=0;

while($i<($liste_item_test-1))
{
while($j<$liste_item_test)
{
 if($tab_couleur1[$i]==$tab_couleur1[$j]) 
                   {
                   	
                           if($tab_designation1[$i]==$tab_designation1[$j]){
                           	 $i=$liste_item_test-1;
                            $bool_identique=1; 
                           
                          }
                  }
$j=$j+1;
}
$i=$i+1;
}
if($bool_identique==1){

header('location:modifier_proformat_post.php?alert=1');

}
else
{ 
/*modifier le client de la facture */

$id_facture=$_POST['id_facture'];
$id_client=$_POST['id_client'];

$id_client_intersser=$_POST['id_client'];
$nom = $_POST['nom'];
$adresse_client = $_POST['adresse_client'];
$telephone = $_POST['tel'];


$nom_client = $bdd->query('select nom from client where(client.id_client=\''.$id_client.'\') ');
$donnee =  $nom_client->fetch(); 
if($nom!=$donnee['nom']){
 
 $req=$bdd->prepare('INSERT INTO client(nom,tele,adresse) VALUES (?, ?, ?)');

$req->execute(

array($nom,$telephone,$adresse_client)

);
$req->closeCursor();

$recuprer_id_client=$bdd->query('select *  from  client  ');        /*recuperere le id du client */
while ($donnee = $recuprer_id_client->fetch()) {

if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone) and ($donnee['adresse']==$adresse_client)) 
{

 $id_client_intersser = $donnee['id_client'];

}
	
}
}



$request_modif_clien = $bdd->prepare('UPDATE client SET nom = :nvnom, adresse = :nvadresse, tele = :nvtele WHERE (client.id_client = :id_client)');
$request_modif_clien->execute(array(
'nvnom' => $nom,
'nvadresse' => $adresse_client,
'nvtele' => $telephone,
'id_client' => $id_client_intersser
));
$request_modif_clien->closeCursor();


/*          modifier table facture_pro */



$date_facture = $_POST['date_facture'];
$validite= $_POST['validite'];
$mode_de_vente = $_POST['mode_de_vente'];



$request_modif = $bdd->prepare('UPDATE facture_pro SET  date_facture = :nvdate, validete_de_loffre = :nvdelai, id_client = :nv_id_client, mode_de_vente = :nvmodv  WHERE (facture_pro.id_facture = :id_facture)');
$request_modif->execute(array(

'nvdate' => $date_facture,
'nvdelai' => $validite,
'id_facture' => $id_facture,
'nv_id_client'=>$id_client_intersser,
'nvmodv' => $mode_de_vente));
$request_modif->closeCursor();




/****************** modifier les item ****************************/


	$suppression_iteme=$bdd->query('delete  from iteme_facture where (iteme_facture.id_facture = \''.$id_facture.'\')');


/*** aajouuuuuuuuuuuuter itemmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmms */

$liste_item=1;
$d=0;
$c=0;
$q=0;
if(isset($_POST['designe'])and($_POST['designe'] != NULL)){  /***************** teste designe ****************/
               $tab_designation[$d] = $_POST['designe'];
               $tab_couleur [$c]= $_POST['couleur'];
               $tab_quantite [$q]= $_POST['quantite'];

              while (isset($_POST['designe'.$liste_item])){
	           $d=$d+1; $c=$c+1;$q=$q+1; 
               $tab_designation[$d] = $_POST['designe'.$liste_item];
               $tab_couleur [$c]= $_POST['couleur'.$liste_item];
               $tab_quantite [$q]= $_POST['quantite'.$liste_item];
               $liste_item = $liste_item+1;
                  }
 /**************************************** id model vehicul ***************************************/

$recuprer_id_vehicul=$bdd->query('select *  from  modele_veh  ');
while($donnee = $recuprer_id_vehicul->fetch())
{
	 for ($i=0; $i <$liste_item ; $i++){
	if (utf8_decode($donnee['designation'])==utf8_decode($tab_designation[$i])) {
		$tab_id_vehicul[$i]=$donnee['id_modele_veh'];
	}

	}
}
$recuprer_id_vehicul->closeCursor();
/********************************************************************************************************/



/*inserer les items a la table item *******************************/
               
$ajouter_item=$bdd->prepare('INSERT INTO iteme_facture(designation,couleur,quantite,id_modele_veh,id_facture) VALUES (?, ?, ?, ?, ?)');
for ($i=0; $i <$liste_item ; $i++){
  
$ajouter_item->execute(array($tab_designation[$i],$tab_couleur[$i],$tab_quantite[$i],$tab_id_vehicul[$i],$id_facture));
}
$ajouter_item->closeCursor();


$type_de_vente=utf8_decode($_POST['mode_de_vente']);

switch ($type_de_vente) {


case 'LEASING':/**************************************** le choix LEASING ***************************/

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/
$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ttc[$i] = $donnee['TTC'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *( ($tab_ttc[$i]/1.17)+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }

$montant=round($montant,2);
$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();

header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
/*pooooooou riad les autre mode de vente */

case 'ANDI':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/
$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_hdd[$i] = $donnee['HT_HDD'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_hdd[$i]+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }

$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee1 = $request->fetch())
{
$tab8[$p]=$donnee1['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
break;

case 'ANSJ':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/
$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ddm[$i] = $donnee['HT_DDM'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ddm[$i]+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }

$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
break;
case 'CNAC':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/
$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ddm[$i] = $donnee['HT_DDM'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ddm[$i]+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }

$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
break;
case 'TTC ENTERPRISE':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/

$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ttc[$i] = $donnee['TTC'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ttc[$i]+$tab_timber[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee1 = $request->fetch())
{
$tab8[$p]=$donnee1['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
break;

case 'TTC':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/

$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ttc[$i] = $donnee['TTC'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ttc[$i]+$tab_timber[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee1 = $request->fetch())
{
$tab8[$p]=$donnee1['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
break;
case 'HDD':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/
$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ddm[$i] = $donnee['HT_HDD'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ddm[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }

$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from iteme_fact where iteme_fact.id_facture='.$id_facture.'');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_proformat_post.php?message=1&ident='.$id_facture);
break;



}/**la fin de switch **/


}

}}







?>