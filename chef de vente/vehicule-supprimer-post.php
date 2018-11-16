<?php


	     if (isset($_GET['id']))
{
                   
                   	try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	} catch (Exception $e) {die('Erreur : '.$e->getMessage()); } 



 $req = $bdd->prepare('DELETE FROM  modele_veh WHERE (id_modele_veh = :id1)'); 
							 $req-> execute (array('id1'=>$_GET['id']));
				

header('location:vehicule.php?message=3');
              
 }
               ?>

