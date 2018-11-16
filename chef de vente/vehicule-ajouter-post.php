<?php
if (isset($_POST['valider']))
{
	if ((isset($_POST['modele']) && $_POST['modele']!=null) 
		and (isset($_POST['remise']) ) 
		and (isset($_POST['hdd']) && $_POST['hdd']!=null) 
		and(isset($_POST['tcc']) && $_POST['tcc']!=null) 
		and(isset($_POST['dmm']) && $_POST['dmm']!=null) 
		and(isset($_POST['timbre']) && $_POST['timbre']!=null)) 
		{
				try {
			  			$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');

			  		}   catch (Exception $e) {
			  									die('erreur:'.$e->gestMessge());
			  		                          }
			  		          $reponse = $bdd->query('SELECT * FROM modele_veh');
			  		          $bool=0;
			  		          while ($donnees = $reponse->fetch())
			  		          	{
			  		          		if (($_POST['modele'] == $donnees['designation']))
			  		          		{
			  		          			$bool=1;/*  la condition  -----------------_____le modele existe deja*/
			  		          		}

			  		          	}
			  		          	$reponse->closeCursor();
			  		      
			  		          	if ($bool != 0) 
			  		          	       {


			  		          		header('location:vehicule-ajouter.php?message=1');
			  		         /*le modele existe deja*/
									


                                       }                                    
								else   /* sinon isere l element on peut ajouter*/
								{
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
                  }/***********************************************************************************/
									
							
								
							

							      $req = $bdd->prepare('INSERT INTO modele_veh (REMISE , HT_HDD, TTC,HT_DDM, TIMBRE, designation) VALUES (:nom,:tel, :registre, :adresse, :mat, :des)');
							 $req-> execute (array(
							 'nom' => $_POST['remise'],
							 'tel' => $_POST['hdd'],
							 'registre' => $_POST['tcc'],
							 'adresse' => $_POST['dmm'],
							 'mat' => $_POST['timbre'],
							 'des' => $_POST['modele']));
							
									$req ->closeCursor();
							    		/*saisir la suite des element color + sa Qt*/
							    		$rep = $bdd->query('SELECT * FROM modele_veh WHERE designation=\''.$_POST['modele'].'\'');
							    		$donnees1 = $rep->fetch();

							    		$id_veh=$donnees1['id_modele_veh'];
							    		
							    		

/***************** requete d'ajoute  des couleur et des Qts ****************/
		$ajouter_color=$bdd->prepare('INSERT INTO couleur(code_couleur,quantite,id_modele_veh) VALUES (?, ?, ?)');
for ($i=0; $i <$liste_item_test ; $i++){
  
$ajouter_color->execute(array($tab_couleur1[$i],$tab_quantite1[$i],$id_veh));
}
$ajouter_color->closeCursor();
						header('location:vehicule.php?message=1'); /*ajouter*/

		                       
	}
		

}                   



}
?>