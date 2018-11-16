<?php if(isset($_GET['takfa'])){

	try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());	}

$requet_suppression_bon = $bdd->query('delete  from command  WHERE (command.id_command = \''.$_GET['takfa'].'\')');
$requet_suppression_bon->closeCursor();

header('Location:commande.php?message=2');
}


?>