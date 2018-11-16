<?php


session_start();
$id_user=$_SESSION['id'];

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
if($bool_identique==1)
{
header('Location:commande-ajouter.php?alert=3');
}
elseif($bool_identique==2)
{


header('Location:commande-ajouter.php?alert=3');

}
}

else{


		if (((isset($_POST['nom']) and $_POST['nom'] != NULL)) and ((isset($_POST['adresse_client']) and ($_POST['adresse_client'] != NULL))) and 
		((isset($_POST['tel']) and ($_POST['tel'] != NULL)))  )
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
$matricule_fisc = $_POST['mat_fisc'];
$registre_commerce = $_POST['reg_commerce'];


 $date_enregistrer =date('Y,m,d');
$verifier=$bdd->query('select *  from  client  ');   /*tester l'ixistance d ' un client*/
while ($donnee = $verifier->fetch()) {
if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone)) {

	$bool=1;
}
}

if($bool == 0){               /* client n'existe pas */

$req=$bdd->prepare('INSERT INTO client(nom,tele,n_registre,matricul_fiscal,adresse,date_enregistre) VALUES (?, ?, ?, ?, ?, ?)');

$req->execute(

array($nom,$telephone,$registre_commerce,$matricule_fisc,$adresse_client,$date_enregistrer)

);
$req->closeCursor();
}
}

/************************************************* ajouter a la table commande   ***********************************************************/



		

/*recuperere le id du client */
$recuprer_id_client=$bdd->query('select *  from  client  ');        
 while ($donnee = $recuprer_id_client->fetch()) {
if (($donnee['nom']==$nom)and ($donnee['tele']==$telephone)) {

  $id_client = $donnee['id_client'];


}
}
/*  id user variable session  */


/* changement de date pour numero bon*/

 $annee =date('Y');
 $jour = date('d');
 $mois = date('m');
 $var=0;
 $recherche_la_fin = $annee.'-'.$mois.'-'.$jour;
 $recherche_la_debut = $annee.'-'.'01'.'-'.'01';
 $recuprer_bon = $bdd->query('select  * from  command where (command.date_command > \'' . $recherche_la_debut . '\') and  (command.date_command <= \'' . $recherche_la_fin . '\' )  ');
 while($donnee1 = $recuprer_bon->fetch()){
 $var = $var+1;
 }
 $recuprer_bon->closeCursor();
                      
                       /*recuper le numero du dernier bon */
 $recuprer_bon1 = $bdd->query('select  numero_bon from  command order by id_command desc  ');
 $donnee1 = $recuprer_bon1->fetch();
 echo $id_command1 = utf8_decode($donnee1['numero_bon']);

 $recuprer_bon1->closeCursor();

 /*recuper le id */ 
if($id_command1!=NULL){
 $numero = explode('/', $id_command1);

 $numero1 = $numero[0];
 $numero2 = $numero[1];

 /*****************************************/

 /*tester quoi attrubier pour numero du bon */
 if ($annee==$numero2) {



             if ($numero1!=$var) 
             {
             $var = $numero1+1;
              }else{
             
         $var=$var+1;
           }
         }else
          {
         $var=1;

         }

/******************** charger tout les champs de la table commande ******/

 $numero_bon=$var.'/'.$annee;}else{

   $numero_bon= '1'.'/'.$annee;
 }



echo  $id_user=$id_user['id_user'];echo '<br>';
echo $date_command = $_POST['date_command'];echo '<br>';
 echo $dalai_livraison = $_POST['dalai_livraison'];echo '<br>';
echo $adresse_livraison ="SARL DJURDJURA MOTORS";echo '<br>';
echo $mode_de_paymant = $_POST['mode_de_paymant'];echo '<br>';
echo$date_de_versement = $_POST['date_de_versement'];echo '<br>';
echo$mode_de_vente = $_POST['mode_de_vente'];echo '<br>';
echo$montant_verser= $_POST['montant_verser'];echo '<br>';
echo $date_rec =$_POST['date_rec'] ;echo '<br>';
echo $etat=$_POST['etat'];echo '<br>';
$stock1=$_POST['stock'];
echo $id_client;
echo$numero_bon;
/*requete d envoie */

$ajouter=$bdd->prepare('INSERT INTO command(date_command,dalai_livraison,adresse_livraison,mode_de_paymant,mode_de_vente,date_de_versement,id_client,id_user,montant_verser,numero_bon,date_rec_algere,etat_command,stock) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');
$ajouter->execute(array($date_command,$dalai_livraison,$adresse_livraison,$mode_de_paymant,$mode_de_vente,$date_de_versement,$id_client,$id_user,$montant_verser,$numero_bon,$date_rec,$etat,$stock1));
$ajouter->closeCursor();

/******************************************** recuper le id_commande su bon ******************************************/


$recuprer_id_commande=$bdd->query('select *  from  command  ');
while ($donnee = $recuprer_id_commande->fetch()) {

if (($donnee['id_user']==$id_user)and ($donnee['date_command']==$date_command) and ($donnee['dalai_livraison']==$dalai_livraison) and ($donnee['adresse_livraison']==$adresse_livraison)
  and($donnee['mode_de_paymant']==$mode_de_paymant)and($donnee['mode_de_vente']==$mode_de_vente)and($donnee['date_de_versement']==$date_de_versement)
  and($donnee['montant_verser']==$montant_verser)and($donnee['numero_bon']==$numero_bon)) {
  
  $id_commande = $donnee['id_command'];
}


}   
$recuprer_id_commande->closeCursor();

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
/*inserer les items a la table item *******************************/

   echo'<br>';
   echo $id_commande.'fffff';
   echo'<br>';

$ajouter_item=$bdd->prepare('INSERT INTO item(designation,couleur,quantite,id_modele_veh,id_command) VALUES (?, ?, ?, ?, ?)');

for ($i=0; $i <$liste_item ; $i++){
  
$ajouter_item->execute(array($tab_designation[$i],$tab_couleur[$i],$tab_quantite[$i],$tab_id_vehicul[$i],$id_commande));
}
$ajouter_item->closeCursor();


$type_de_vente=utf8_decode($_POST['mode_de_vente']);
}
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

$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));
$request_montant->closeCursor();

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
/*pooooooou riad les autre mode de vente */

header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
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
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));

/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
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
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));
/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
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
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));
/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
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
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));
/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
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
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));
/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
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
$prix_selon_bon[$i] = $tab_quantite[$i] *($tab_ttc[$i]+$tab_timber[$i]);
$montant = $montant + $prix_selon_bon[$i];
 }
$rest_a_payer=$montant-$montant_verser;
if($rest_a_payer<0)
{
$rest_a_payer=0;
}
$request_montant = $bdd->prepare('UPDATE command SET montat = :nvmontat, rest_a_payer = :rest WHERE (command.id_command = :id_command AND command.numero_bon = :numero_bon)');
$request_montant->execute(array(
'nvmontat' => $montant,
'rest'=>$rest_a_payer,
'id_command' => $id_commande,
'numero_bon' => $numero_bon
));
/*  modddddddddddddddddddddiiiiiiiiiiiifierrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */

$p=0;
$request = $bdd->query('select * from item where (item.id_command=\''.$id_commande.'\')  ');
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
header('Location:commande-ajouter.php?message=1&id_command='.$id_commande);
break;

}
/************* la fermeture de else et designer et isset1 ***********/
}
}

}




?>