 <?php
	     if (isset($_GET['client']))
{
	
						  			try {
						  			$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');

						  		}   catch (Exception $e) {
						  									die('erreur:'.$e->gestMessge());
			  		                          }




 $req = $bdd->prepare('DELETE FROM  client WHERE (id_client = :id)'); 
							 $req-> execute (array('id' => $_GET['client']));
				




header('location:client.php?message=3');





 }
?>