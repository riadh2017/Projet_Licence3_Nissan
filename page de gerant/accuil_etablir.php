
<?php
if(isset($_POST['expiditeur']))
{
 try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }

 

 $nom =$_POST['destinataire'];
 $exp =$_POST['expiditeur'];echo '<br>';



 $numero = explode(' ', $nom);
 $nom=$numero[0];echo '<br>';
 $prenom=$numero[1];


/******* recupere id recepteur */////////////

 $recuprer_id = $bdd->query('select  id_user from  user where( (nom=\''.$nom.'\') and (prenom=\''.$prenom.'\') )  ');
 $donnee1 = $recuprer_id->fetch();
 $id_desti = utf8_decode($donnee1['id_user']);
 $message=$_POST['text'];
$recuprer_id->closeCursor();


$date_message=date('Y,m,d');

if($_POST['text']!=null){
$req_insert_messge=$bdd->prepare('INSERT into messagerie (message,date_message,id_lexpiditeur,id_destinataire) VALUES (? ,? ,? ,? )');
$req_insert_messge->execute(array($message,$date_message,$exp,$id_desti,)); 
$req_insert_messge->closeCursor();

header('Location:accuil-commercial.php?message=1');

}else
{
header('Location:nouveau_messge.php?message=2');

}
}

?>
