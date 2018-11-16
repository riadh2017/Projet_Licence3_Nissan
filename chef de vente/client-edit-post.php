 <?php
	     if (isset($_POST['valider']))
{
	if ((isset($_POST['tel']) and $_POST['tel']!=null) 
		or (isset($_POST['nom']) and ($_POST['nom']!=null) )
		or (isset($_POST['registre'])) 
		or(isset($_POST['adresse']) and $_POST['adresse']!=null)
		or (isset($_POST['mat'])) ) 
		{
			 
						  			try {
						  			$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');

						  		}   catch (Exception $e) {
						  									die('erreur:'.$e->gestMessge());
			  		                          }
 $req = $bdd->prepare('UPDATE client SET nom = :nom, tele = :tel, n_registre = :registre, adresse = :adresse, mat_fisc = :mat WHERE (id_client = :id)'); 
							 $req-> execute (array(
							 'nom' => $_POST['nom'],
							 'tel' => $_POST['tel'],
							 'registre' => $_POST['registre'],
							 'adresse' => $_POST['adresse'],
							 'mat' => $_POST['mat_fisc'],
							 'id' => $_POST['le_id']));
							 header('location:client.php?message=2');/*modification affectue*/
				}
			}

		


?>