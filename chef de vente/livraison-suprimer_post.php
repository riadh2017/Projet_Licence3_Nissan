<?php if(isset($_GET['id_liv'])){

	try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}
	
  
$id_command= $_GET['id_c'].''.'<br>';
$id_livraison=$_GET['id_liv'];
 

$p=0;
$l=0;
$req=$bdd->query('select *  from  item  where   (item.id_command=\''.$id_command.'\') ');
      while(  $donne=$req->fetch()){
$j=1;

while ( $j<=$donne['quantite'] ) {
	$tab_item[$p]=$donne['id_item'];
	$p=$p+1;
	$l=$l+1;
 $j=$j+1;
}


}



$t=0;


while ($t<$l) {
$requet_matricul_chassis = $bdd->prepare('delete from matricul_chassis where (matricul_chassis.id_item = :id_item) ');
$requet_matricul_chassis->execute(array('id_item'=>$tab_item[$t]));
$t=$t+1;
}
$requet_matricul_chassis->closeCursor();

$requet_suppression_bon = $bdd->query('delete  from bon_livraison  WHERE (bon_livraison.id_bon_livraison = \''.$id_livraison.'\')');
$requet_suppression_bon->closeCursor();
header('Location:livraison.php?message=3');

}?>