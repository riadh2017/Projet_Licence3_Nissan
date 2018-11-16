
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
 if($tab_designation1[$i]==$tab_designation1[$j]) 
                   {
                    
                           if( $tab_couleur1[$i]==$tab_couleur1[$j] ){
                             $i=$liste_item_test-1;
                            $bool_identique=1; 
                           
                          }
                  }else{

                          $i=$liste_item_test-1;
                            $bool_identique=2; 



                  }
$j=$j+1;
}
$i=$i+1;
}


if($bool_identique==1 or $bool_identique==2 ){
if($bool_identique==1)
{
header('Location:commande-ajouter.php?message=2');
}
elseif($bool_identique==2)
{


header('Location:commande-ajouter.php?message=3');

}
}

else{
/*modifier le client de la commande */

$id_command=$_POST['id_command'];
$id_client=$_POST['id_client'];

$id_client_intersser=$_POST['id_client'];
$nom = $_POST['nom'];
$adresse_client = $_POST['adresse_client'];
$telephone = $_POST['tel'];
$matricule_fisc = $_POST['mat_fisc'];
$registre_commerce = $_POST['reg_commerce'];

$nom_client = $bdd->query('select nom from client where(client.id_client=\''.$id_client.'\') ');
$donnee =  $nom_client->fetch(); 
if($nom!=$donnee['nom']){
 
 $req=$bdd->prepare('INSERT INTO client(nom,tele,n_registre,matricul_fiscal,adresse) VALUES (?, ?, ?, ?, ?)');

$req->execute(

array($nom,$telephone,$registre_commerce,$matricule_fisc,$adresse_client)

);
$req->closeCursor();

$recuprer_id_client=$bdd->query('select *  from  client  ');        /*recuperere le id du client */
while ($donnee = $recuprer_id_client->fetch()) {

if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone) and ($donnee['n_registre']==$registre_commerce) and ($donnee['matricul_fiscal']==$matricule_fisc)) 
{

 $id_client_intersser = $donnee['id_client'];

}
	
}
}



$recuprer_id_client=$bdd->query('select *  from  client  ');        /*recuperere le id du client */
while ($donnee = $recuprer_id_client->fetch()) {

if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone) and ($donnee['n_registre']==$registre_commerce) and ($donnee['matricul_fiscal']==$matricule_fisc)) 
{

 $id_client_intersser = $donnee['id_client'];

}
	
}
$request_modif_clien = $bdd->prepare('UPDATE client SET nom = :nvnom, adresse = :nvadresse, tele = :nvtele, matricul_fiscal = :nvmat, n_registre = :nvregistre WHERE (client.id_client = :id_client)');
$request_modif_clien->execute(array(
'nvnom' => $nom,
'nvadresse' => $adresse_client,
'nvtele' => $telephone,
'nvmat' => $matricule_fisc,
'nvregistre' => $registre_commerce,
'id_client' => $id_client_intersser
));
$request_modif_clien->closeCursor();


/*          modifier table command */


echo $id_command; echo '<br>';
echo $date_command = $_POST['date_command'];
echo$dalai_livraison = $_POST['dalai_livraison'];
echo $adresse_livraison = "SARL DJURDJURA MOTORS";
echo $mode_de_paymant = $_POST['mode_de_paymant'];
echo $date_de_versement = $_POST['date_de_versement'];
echo $mode_de_vente = $_POST['mode_de_vente'];
echo $montant_verser = $_POST['montant_verser'];
 echo $date_rec =$_POST['date_rec'] ;echo '<br>';
 echo $etat=$_POST['etat'];echo '<br>';


$request_modif_command = $bdd->prepare('update command set date_command = :nvdate , dalai_livraison = :nvdelai, adresse_livraison = :nvadresse, mode_de_paymant = :nvpaymant, mode_de_vente = :nvmodv,date_de_versement = :nvdate_ver, id_client = :nv_id_client, montant_verser = :nvmantant, etat_command = :etat1, date_rec_algere = :date_rec1   where (command.id_command = :id_command)');
$request_modif_command->execute(array(
'nvdate' => $date_command,
'nvdelai' => $dalai_livraison,
'nvadresse' => $adresse_livraison,
'nvpaymant' => $mode_de_paymant,
'nvmodv' => $mode_de_vente,
'nvdate_ver' => $date_de_versement,
'nv_id_client'=>$id_client_intersser,
'nvmantant' => $montant_verser,
'etat1' => $etat,
'date_rec1'=>$date_rec,
'id_command' => $id_command

));
$request_modif_command->closeCursor();



/****************** modifier les item ****************************/

 
	$suppression_item=$bdd->query('delete  from item where (item.id_command = \''.$id_command.'\')');
  $suppression_item->closeCursor();

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
               
$ajouter_item=$bdd->prepare('INSERT INTO item(designation,couleur,quantite,id_modele_veh,id_command) VALUES (?, ?, ?, ?, ?)');
for ($i=0; $i <$liste_item ; $i++){
  
$ajouter_item->execute(array($tab_designation[$i],$tab_couleur[$i],$tab_quantite[$i],$tab_id_vehicul[$i],$id_command));
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

$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command));

$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}
$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
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

$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command )');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
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

$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
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

$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
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

$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
break;
case 'TTC':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/
$vehicul=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ddm[$i] = $donnee['TTC'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ttc[$i]+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }

$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
break;
case 'TTC ENTREPRISE':

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
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ttc[$i]+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat WHERE (command.id_command = :id_command)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_command' => $id_command
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_command.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item = $bdd->prepare('UPDATE item SET prix_selon_bon = :prix WHERE (item.id_item = :id_itm)');
$requet_prix_item->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$requet_prix_item->closeCursor();
$request->closeCursor();
header('Location:modifier_command_post.php?message=1&id_command='.$id_command.'');
break;



}/**la fin de switch **/


}

}}







?>