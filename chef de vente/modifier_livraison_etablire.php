<?php 
try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}
if (isset($_POST['etablire'])) {




$c=0;
$m=0;
$liste_item_test=1;
/***************** rassembler les matricul ****************/


             echo  $tab_matricule [$m]= $_POST['matricule'];echo '<br>';
             echo   $tab_chassis[$m]  = $_POST['chassis'];echo '<br>';
           
              while (isset($_POST['matricule'.$liste_item_test])){
              
                $m=$m+1;  
             echo   $tab_chassis[$m]=$_POST['chassis'.$liste_item_test];echo '<br>';
              echo $tab_matricule [$m]= $_POST['matricule'.$liste_item_test];echo '<br>';
               $liste_item_test = $liste_item_test+1;
                  }

                $liste_item=1;
                $it=0;
               $tab_id_item[$it]=$_POST['id_item'];

              $tab_quantite[$it]=$_POST['quantite'];
              
              while (isset($_POST['id_item'.$liste_item])){
               $it=$it+1;
               $tab_id_item[$it]=$_POST['id_item'.$liste_item];
               $liste_item=$liste_item+1;
              }    



$id_command=$_POST['id_command_livraison'];
$lieu=$_POST['lieu-liv'];
$deli=$_POST['pc-liv'];
$numero_bon=$_POST['numero_bon'];
$code_facture=$_POST['code_facture'];
$code_client=$_POST['code_client'];


echo $m ; echo '<br>';
echo $liste_item;
$t=0;

while ($t<$liste_item) {
$requet_matricul_chassis = $bdd->prepare('UPDATE matricul_chassis SET matricul = :mat, chassis= :chassis where (matricul_chassis.id = :id_item) ');
$requet_matricul_chassis->execute(array('mat'=> $tab_matricule[$t],'chassis'=>$tab_chassis[$t],'id_item'=>$tab_id_item[$t]));
$t=$t+1;
}
$requet_matricul_chassis->closeCursor();



$modifier_bon_livraison=$bdd->prepare('UPDATE  bon_livraison SET delivrais_adrese = :lieu, ccp = :deli, code_facteur = :code, code_client= :code1 where(bon_livraison.id_command = :id_command)');
$modifier_bon_livraison->execute(array('lieu'=>$lieu,'deli'=>$deli,'id_command'=>$id_command,'code'=>$code_facture,'code1'=>$code_client));

$modifier_bon_livraison->closeCursor();

header('Location:livraison_modifier_post.php?message=2&id_command='.$id_command.'');

}
 
?>