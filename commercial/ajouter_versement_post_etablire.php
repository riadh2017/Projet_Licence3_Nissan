<?php
if (isset($_POST['verser'])) {


 
          if($_POST['rest_a_payer_command'] >= $_POST['versement1'])
                  {



try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }
$versement2=$_POST['versement1'];
 $id_command=$_POST['id_command'];

$rest_a_payer_new=$_POST['rest_a_payer_command']-$versement2;
   
	
	$date_recue=$_POST['date_recue'];



/***** update command avec new rest a payer *//////////

$request =$bdd->prepare('UPDATE command SET  rest_a_payer = :rest WHERE (command.id_command = :id_command)');
$request->execute(array('rest'=>$rest_a_payer_new,'id_command' => $id_command));
$request->closeCursor();

 $req_insert_versemnt=$bdd->prepare('INSERT INTO recu_verssement (date_de_verssement,rest_payer,id_command,versement) VALUES (?, ?, ?, ?)');
 $req_insert_versemnt->execute(array($date_recue,$rest_a_payer_new,$id_command, $versement2));
$req_insert_versemnt->closeCursor();
header('location:ajouter_versement_post.php?message=2&id_command='.$id_command.'');



}
else{
  echo "riadddddddd";
  header('location:versement-ajouter.php?riad=1');


}

}

?>