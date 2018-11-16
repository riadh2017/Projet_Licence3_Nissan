

<?php
if (isset($_POST['valider']))
{
	if ((isset($_POST['tel']) and $_POST['tel']!=null )
		and (isset($_POST['nom']) and $_POST['nom']!=null) 
		and (isset($_POST['registre'])) 
		and(isset($_POST['adresse']) and $_POST['adresse']!=null) 
		and(isset($_POST['mat_fisc'])))/* sont des chmp facultatif*/ 
		{
			  if (preg_match('#^0[1-78][0-9]+$#',$_POST['tel']))
			  		{
			  			try {
			  			$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');

			  		}   catch (Exception $e) {
			  									die('erreur:'.$e->gestMessge());
			  		                          }
			  		          $reponse = $bdd->query('SELECT * FROM client');
			  		          $bool=0;
			  		          while ($donnees = $reponse->fetch())
			  		          	{
			  		          		if (($_POST['tel'] == $donnees['tele']) and ($_POST['nom'] == $donnees['nom'])and
			  		          		($_POST['registre']==$donnees['n_registre']) and($_POST['adresse']==$donnees['adresse'])  and
			  		          		($_POST['mat_fisc']==$donnees['matricul_fiscal']) )
			  		          		{
			  		          			$bool=1;/*les client existe*/

			  		          		}
			  		          	}
			  		          	

			  		          	if ($bool == 0) 
			  		          	{
			  		         $req=$bdd->prepare('INSERT INTO client (nom,tele,n_registre,matricul_fiscal,adresse) VALUES (?, ?, ?, ?, ?)');

$req->execute(

array($_POST['nom'],$_POST['tel'],$_POST['registre'],$_POST['mat_fisc'],$_POST['adresse']));
									
									$req->closeCursor();
									header('location:client.php?message=1');/*confirmation d'ajout*/
									
									}
								else
								{

									header('location:client-ajouter.php?message=2');/*le client existe deja dans la base de donnes*/
								
							}


		}else 
		{
			header('location:client-ajouter.php?message=3');/*nu de telephone incorrrect*/
		}
		}else
		{
			header('location:client-ajouter.php?message=4');/*donnes incompletes*/
		}

		$reponse->closeCursor();	
}
?>