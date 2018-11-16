<?php
if (isset($_POST['valider'])) {
	echo $_POST['ident'].'<br>';
/* connection  a l base de donnees*/
if ((isset($_POST['modele'])) and (isset($_POST['remise'])) and (isset($_POST['hdd'])) and
		(isset($_POST['tcc'])) and(isset($_POST['dmm'])) and(isset($_POST['timbre']))) 
		{
			/*connexion  a la base de donnees*********************************/
try {$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');}   catch (Exception $e) {die('erreur:'.$e->gestMessge()); }
			
				/*suppression des encien couleur de modele a modifieé****************************/
			$requet_suppression_color = $bdd->query('DELETE from couleur WHERE (couleur.id_modele_veh = \''.$_POST['ident'].'\')');
$requet_suppression_color->closecursor();
echo 'suppression des couleur<br>';
					/*mise a jour de la table modele de voitures*********************************/

					$req = $bdd->prepare('UPDATE modele_veh SET REMISE = :remise, HT_HDD = :hdd, TTC = :tcc, HT_DDM = :dmm, TIMBRE = :timbre , designation = :des WHERE (id_modele_veh = :id)'); 
							 $req-> execute (array(
							 'remise' => $_POST['remise'],
							 'hdd' => $_POST['hdd'],
							 'tcc' => $_POST['tcc'],
							 'dmm' => $_POST['dmm'],
							 'timbre' => $_POST['timbre'],
							 'des' => $_POST['modele'],
							 'id' => $_POST['ident']));

							 echo 'mise à jour des modele<br>';
							 $req->closecursor();
							 /*reccuperation des information   a nouveau des couleur et des QTES */
							 $liste_item_test=1;
$c1=0;
$q1=0;
/***************** recupration des couleur et des Qts ****************/

               
               $tab_couleur1 [$c1]= $_POST['couleur'];
               $tab_quantite1 [$q1]= $_POST['quantite'];

              while (isset($_POST['couleur'.$liste_item_test])){
            $c1=$c1+1;$q1=$q1+1; 
               $tab_couleur1 [$c1]= $_POST['couleur'.$liste_item_test];
               $tab_quantite1 [$q1]= $_POST['quantite'.$liste_item_test];
               $liste_item_test = $liste_item_test+1;
                  }
/***************** requete d'ajoute  des couleur et des Qts ****************/
		$ajouter_color=$bdd->prepare('INSERT INTO couleur(code_couleur,quantite,id_modele_veh) VALUES (?, ?, ?)');
for ($i=0; $i <$liste_item_test ; $i++){
  
$ajouter_color->execute(array($tab_couleur1[$i],$tab_quantite1[$i],$_POST['ident']));
}
$ajouter_color->closeCursor();
header('location:vehicule.php?message=2');

}
}

























?>