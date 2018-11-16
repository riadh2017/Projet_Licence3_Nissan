<?php 
try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}
if (isset($_POST['etablire'])) {




$c=0;
$m=0;
$liste_item_test=1;
/***************** rassembler les matricul ****************/

   $tab_matricule [$m]= $_POST['matricule'];           
              while (isset($_POST['matricule'.$liste_item_test])){
              
            $m=$m+1;
               
             $tab_matricule [$m]= $_POST['matricule'.$liste_item_test];
               $liste_item_test = $liste_item_test+1;
                  }



$ch=0;
$list_chassis=1;
$tab_chassis[$ch]=$_POST['chassis'];
while(isset($_POST['chassis'.$list_chassis]))
{
  $ch=$ch+1;
$tab_chassis[$ch]=$_POST['chassis'.$list_chassis];
$list_chassis=$list_chassis+1;
}







for ($i=0; $i < $liste_item_test; $i++) { 
  echo$tab_matricule[$i];echo"<br>";
}

                $liste_item=1;
                $it=0;
             echo   $tab_id_item[$it]=$_POST['id_item'] ;echo"<br>";

              $tab_quantite[$it]=$_POST['quantite'];
              
              while (isset($_POST['id_item'.$liste_item])){
               $it=$it+1;
               echo $tab_id_item[$it]=$_POST['id_item'.$liste_item]; echo"<br>";
               $liste_item=$liste_item+1;
              }    



 $id_command=$_POST['id_command_livraison'];


$numero_bon=$_POST['numero_bon'];

$t=0;

while ($t<$liste_item) {
/**********************ce nest pas id_item mais id des matricul a modifier *******************/
$requet_matricul_chassis = $bdd->prepare('insert into matricul_chassis (matricul,chassis,id_item) values (?,?,?) ');
$requet_matricul_chassis->execute(array( $tab_matricule[$t],$tab_chassis[$t],$tab_id_item[$t]));
$t=$t+1;
}
$requet_matricul_chassis->closeCursor();




$annee =date('Y,m,d');

$lieu=$_POST['lieu-liv'];
$deli=$_POST['pc-liv'];
$code=$_POST['code_client'];
$ajouter_bon_livraison=$bdd->prepare('INSERT INTO  bon_livraison (date_livraison,id_command,delivrais_adrese,ccp,numero_bon,code_facteur,code_client) VALUES (?, ?, ?, ?, ?, ?, ?)');
$ajouter_bon_livraison->execute(array($annee,$id_command,$lieu,$deli,$numero_bon,$_POST['code_facture'],$code));
$ajouter_bon_livraison->closeCursor();
header('Location:ajouter_livraison_post.php?message=1&&id_command='.$id_command.'');

}
 
?>