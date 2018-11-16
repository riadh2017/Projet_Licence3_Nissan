
<?php
 try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
$expd=$_POST['expiditeur'];
$nom=$_POST['destinataire'];

echo $nom;echo '<br>';
echo $expd;echo '<br>';
 $numero = explode(' ', $nom);
 $nom=$numero[0];
 $prenom=$numero[1];


 echo $nom;echo '<br>';
 echo $prenom;echo '<br>';
 $message=$_POST['text'];
 echo $message;echo '<br>';
/******* recupere id recepteur *///////////
 $recuprer_id = $bdd->query('select  id_user from  user where( (nom=\''.$nom.'\') and (prenom=\''.$prenom.'\') )  ');
 $donnee1 = $recuprer_id->fetch();
 echo $id_recepteur = utf8_decode($donnee1['id_user']);

$recuprer_id->closeCursor();


$date_message=date('Y,m,d');
echo $date_message; 
if($_POST['text']!=null){
$req_insert_messge=$bdd->prepare('INSERT into messagerie (message,id_lexpiditeur,id_recepteur,date_message) VALUES (? ,? ,? ,? )');
$req_insert_messge->execute(array($message,$expd,$id_recepteur,$date_message)); 
$req_insert_messge->closeCursor();

header('Location:./../accuil-commercial.php?message=1');

}else
{
header('Location:./../accuil-commercial.php?message=2');

}



?>
