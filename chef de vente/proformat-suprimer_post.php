<?php if(isset($_GET['facture'])){

	try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}

$requet_suppression_bon = $bdd->query('delete  from facture_pro  WHERE (facture_pro.id_facture = \''.$_GET['facture'].'\')');
$requet_suppression_bon->closeCursor();

header('Location:proformat.php?message=2');
}


?>