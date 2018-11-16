<?php
if(isset($_POST['verser_modifier']))
{


try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage());}



 $date_du_nouveau_versement=$_POST['date_recue'];
  $id_recu = $_POST['$id_recu']; 
 $id_command=$_POST['id_command'];
 $rest_aqdim_command=$_POST['rest_a_payer_du_command'];

 $la_somme_verser=$_POST['la_somme_verser'];
  $la_nouvel_somme_verser=$_POST['la_nouvel_somme_verser'];



 $rest_a_payer_nouveau_command = $rest_aqdim_command + $la_somme_verser;



                            /*** effecture modification**/////////////
                            
if($rest_a_payer_nouveau_command < $la_nouvel_somme_verser)
{

header('location:versement.php?message=4');

}else{

 /*********** mis a joure de rest a payer de la command *//////////////
$req_updat_rest_a_payer=$bdd->prepare('UPDATE command SET  rest_a_payer = :rest WHERE (command.id_command = :id_command)');
$req_updat_rest_a_payer->execute(array('rest'=>$rest_a_payer_nouveau_command,'id_command'=>$id_command));
$req_updat_rest_a_payer->closeCursor();

$rest_a_payer_nouveau_command1 =$rest_a_payer_nouveau_command- $la_nouvel_somme_verser;

/*********** mis a joure de rest a payer de la command *//////////////

$req_updat_rest_a_payer=$bdd->prepare('UPDATE command SET  rest_a_payer = :rest WHERE (command.id_command = :id_command)');
$req_updat_rest_a_payer->execute(array('rest'=>$rest_a_payer_nouveau_command1,'id_command'=>$id_command));
$req_updat_rest_a_payer->closeCursor();

echo $date_du_nouveau_versement; echo'<br>';
echo $rest_a_payer_nouveau_command1;echo'<br>';
echo $la_nouvel_somme_verser;


$req_updat_recu=$bdd->prepare('update recu_verssement set date_de_verssement = :date_ver, rest_payer = :rest, versement = :ver  where (id_rv = :rec and id_command =:id_command)');
$req_updat_recu->execute(array(
'date_ver'=>$date_du_nouveau_versement,
'rest'=> $rest_a_payer_nouveau_command1,
'ver'=>$la_nouvel_somme_verser,
'rec'=>$id_recu,
'id_command'=>$id_command
));
$req_updat_recu->closeCursor();
header('location:versement_modifier_post.php?message=3&id_command='.$id_command.'');

}
 

}





	?>