<?php
if(isset($_GET['id_command']))
{




try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage());}        



$id_command= $_GET['id_command'];
  $id_recu= $_GET['id_a_supprimer'];

 /********* recupere montant verser de dernier recu *///////////
 $req_monant_verser_dernier=$bdd->query('select versement from recu_verssement where(recu_verssement.id_rv='.$id_recu.') ');
$donne=$req_monant_verser_dernier->fetch();
$versement1=$donne['versement'];
$req_monant_verser_dernier->closeCursor();
         

/********* recupere le rest a payer du bon de command */////////////// 
$req_monant=$bdd->query('select rest_a_payer from command where(id_command='.$id_command.') ');
$donne1=$req_monant->fetch();
$rest_a_payer_aqdim= $donne1['rest_a_payer'];
$req_monant->closeCursor();   



/*********** mis a joure de rest a payer de la command *//////////////

 $rest_a_payer_ajded=$rest_a_payer_aqdim+$versement1;

$req_updat_rest_a_payer=$bdd->prepare('UPDATE command SET  rest_a_payer = :rest WHERE (command.id_command = :id_command)');
$req_updat_rest_a_payer->execute(array('rest'=>$rest_a_payer_ajded,'id_command'=>$id_command));
$req_updat_rest_a_payer->closeCursor();


/********** suppression de dernier vresement */////////////////
$req_supression_recu=$bdd->query('delete from recu_verssement where (id_rv=\''.$id_recu.'\')  ');


 header('location:versement.php?message=5');

}
?>





                    