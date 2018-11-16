<?php

// l'ajout d un client//


  if (isset($_POST['save'])) {              /* test demande ajout */

if((isset($_POST['designe']))and($_POST['designe'] != NULL)){


$bool_identique = 0;
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



header('Location:proformat-ajouter.php?message=3');

}

else{


		if (((isset($_POST['nom']) and $_POST['nom'] != NULL)) and ((isset($_POST['adresse_client']) and ($_POST['adresse_client'] != NULL))) and 
		((isset($_POST['tel']) and ($_POST['tel'] != NULL))))
		{

            try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 

           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
$bool = 0;
$nom = $_POST['nom'];
$adresse_client = $_POST['adresse_client'];
$telephone = $_POST['tel'];


$verifier=$bdd->query('select *  from  client  ');   /*tester l'ixistance d ' un client*/
while ($donnee = $verifier->fetch()) {
if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone) and ($donnee['adresse']==$adresse_client)) {

	$bool=1;
}
}
if($bool == 0){               /* client n'existe pas */

$req=$bdd->prepare('INSERT INTO client(nom,tele,adresse) VALUES (?, ?, ?)');

$req->execute(

array($nom,$telephone,$adresse_client)

);
$req->closeCursor();
}
}

/************************************************* ajouter a la table commande   ***********************************************************/


if(((isset($_POST['date']) and $_POST['date'] != NULL)) and((isset($_POST['mode_de_vente']) and
 ($_POST['mode_de_vente'] != NULL))) and ((isset($_POST['validite']) and ($_POST['validite'] != NULL))) ) {
		


$recuprer_id_client=$bdd->query('select *  from  client  ');        /*recuperere le id du client */
while ($donnee = $recuprer_id_client->fetch()) {
if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone) and ($donnee['adresse']==$adresse_client)) {

 $id_client = $donnee['id_client'];

}
}		

/*  id user variable session  */
$id="takfa";

$recuprer_id_user=$bdd->query('select *  from  user where user.nom=\'' . $id . '\'   ');
$id_user = $recuprer_id_user->fetch();
$recuprer_id_user->closeCursor();

/********************************************/	

/* changement de date pour numero bon*/

$annee =date('Y');
$jour = date('d');
$mois = date('m');
$var=0;
$recherche_la_fin = $annee.'-'.$mois.'-'.$jour;
$recherche_la_debut = $annee.'-'.'01'.'-'.'01';
$recuprer_bon = $bdd->query('select  * from  facture_pro where (date_facture > \'' . $recherche_la_debut . '\') and  (date_facture <= \'' . $recherche_la_fin . '\' )  ');
while($donnee1 = $recuprer_bon->fetch()){
$var = $var+1;
}
$recuprer_bon->closeCursor();
                      
                      /*recuper le numero du dernier bon */
$recuprer_bon_fact1 = $bdd->query('select  numero_fact from  facture_pro order by id_facture desc ');
$donnee1 = $recuprer_bon_fact1->fetch();
$id_facture1 = utf8_decode($donnee1['numero_fact']);

$recuprer_bon_fact1->closeCursor();


/*recuper le id */ 

$numero = explode('/', $id_facture1);

$numero1 = $numero[0];

echo $numero1;echo"<br>";
/*****************************************/

/*tester quoi attrubier pour numero du bon */

            if ($numero1!=$var) 
            {
            $var = $numero1+1;
             }else{
             
         $var=$var+1;
           }
/******************** charger tout les champs de la table commande ******/

$numero_bon=$var.'/'.$annee;
echo $numero_bon;

echo"<br>";

$date_command = $_POST['date'];
$mode_de_vente = $_POST['mode_de_vente'];
$validite = $_POST['validite'];


/*requete d envoie */

$ajouter=$bdd->prepare('INSERT INTO facture_pro(date_facture,validete_de_loffre,id_client,numero_fact,mode_de_vente) VALUES (?, ?, ?, ?, ?)');
$ajouter->execute(array($date_command,$validite,$id_client,$numero_bon,$mode_de_vente));
$ajouter->closeCursor();


/******************************************** recuper le id_commande su bon ******************************************/

echo"pp";

$recuprer_id_facture=$bdd->query('select *  from  facture_pro  ');
while ($donnee = $recuprer_id_facture->fetch()) {

if ( ($donnee['date_facture']==$date_command) 
  and ($donnee['mode_de_vente']==$mode_de_vente) and
  ($donnee['validete_de_loffre']==$validite) and 
  ($donnee['numero_fact']==$numero_bon)) {
 $id_facture = $donnee['id_facture'];
}
}		
$recuprer_id_facture->closeCursor();
echo $id_facture;
/**************************************************************************************************************************/

/*** aajouuuuuuuuuuuuter itemmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmms */

if(isset($_POST['designe'])and($_POST['designe'] != NULL)){  /***************** teste designe ****************/


$liste_item=1;
$d=0;
$c=0;
$q=0;               
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

$recuprer_id_vehicul1=$bdd->query('select *  from  modele_veh  ');

while($donnee = $recuprer_id_vehicul1->fetch())
{
	 for ($i=0; $i <$liste_item ; $i++){
	if (utf8_decode($donnee['designation'])==utf8_decode($tab_designation[$i])) {
		$tab_id_vehicul[$i]=$donnee['id_modele_veh'];
	}
	}
}
$recuprer_id_vehicul1->closeCursor();
/********************************************************************************************************/



/*inserer les items a la table item *******************************/
for ($i=0; $i <$liste_item ; $i++) { 
  echo"<br>";
  echo $tab_couleur[$i];echo"<br>";
echo $tab_designation[$i];echo"<br>";
echo $tab_id_vehicul[$i];echo"<br>";
echo $tab_quantite[$i];echo"<br>";
echo $id_facture;echo "<br>";
}
               
$ajouter_item1=$bdd->prepare('INSERT INTO iteme_facture(designation,couleur,quantite,id_facture,id_modele_veh) VALUES (?, ?, ?, ?, ?)');

for ($i=0; $i <$liste_item ; $i++){ 
$ajouter_item1->execute(array($tab_designation[$i],$tab_couleur[$i],$tab_quantite[$i],$id_facture,$tab_id_vehicul[$i]));
}
$ajouter_item1->closeCursor();

/**************************************** le choix de mode de vente ***************************/
$type_de_vente=utf8_decode($_POST['mode_de_vente']);

switch ($type_de_vente) {

case 'LEASING':

/*******  RECUPER LES DONNE POUR CHAUQE ITEM *******/

$vehicul1=$bdd->query('select * from modele_veh ');
while ($donnee = $vehicul1->fetch()) {
for ($i=0; $i <$liste_item ; $i++) { 
if(utf8_decode($donnee['id_modele_veh'])==utf8_decode($tab_id_vehicul[$i]))
{
$tab_ttc[$i] = $donnee['TTC'];
$tab_quantite_stock[$i] = $donnee['quantite_stok'];
$tab_timbre[$i] = $donnee['TIMBRE'];

}}}
$vehicul1->closeCursor();

/********************************************************/

/****************************calcul montant********************* */

$montant = 0;
for ($i=0; $i <$liste_item ; $i++) { 
$prix_selon_bon[$i] = $tab_quantite[$i] *( ($tab_ttc[$i]/1.17)+$tab_timbre[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }
echo "<br>";
echo $montant.'cccc';
echo "<br>";
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
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();

/*pooooooou riad les autre mode de vente */

header('Location:proformat-ajouter.php?message=1&facture='.$id_facture);
 break;

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
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();

header('Location:proformat-ajouter.php?message=1&facture='.$id_facture);
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
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();
header('Location:proformat-ajouter.php?message=1');
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
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();
header('Location:proformat-ajouter.php?message=1&facture='.$id_facture);
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
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();
header('Location:proformat-ajouter.php?message=1&facture='.$id_facture.'');
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
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ttc[$i] + $tab_timber[$i]);
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
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();
header('Location:proformat-ajouter.php?message=1&facture='.$id_facture);
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
$prix_selon_bon[$i] = $tab_quantite[$i] *(($tab_ttc[$i])+$tab_timber[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }
$request_montant = $bdd->prepare('UPDATE facture_pro SET montant = :nvmontat WHERE (facture_pro.id_facture = :id_facture)');
$request_montant->execute(array(
'nvmontat' => $montant,
'id_facture' => $id_facture));

$request_montant->closeCursor();


/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrr  prix item */

$p=0;
$request = $bdd->query('select * from iteme_facture where (iteme_facture.id_facture=\''.$id_facture.'\')  ');
while ($donnee = $request->fetch())
{
$tab8[$p]=$donnee['id_item'];
$requet_prix_item1 = $bdd->prepare('UPDATE iteme_facture SET prix_selon_facture = :prix WHERE (iteme_facture.id_item = :id_itm)');
$requet_prix_item1->execute(array(
'prix'=>$prix_selon_bon[$p],
'id_itm'=>$tab8[$p]));
$p=$p+1;
}

$request->closeCursor();
$requet_prix_item1->closeCursor();
header('Location:proformat-ajouter.php?message=1&facture='.$id_facture);
break;
}/*********** la fin de  switch *********/


}/************ fin de designe *********/
}
}

}/************* la fermeture de else ***********/
}

?>