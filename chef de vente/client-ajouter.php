<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:./../Login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Author: Reality Software
Website: http://www.realitysoftware.ca
Note: This is a free template released under the Creative Commons Attribution 3.0 license, 
which means you can use it in any way you want provided you keep the link to the author intact.
-->
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />

<link rel="icon" type="type/ico" href="images/parametre_icon.jpg">

</head>
<style type="text/css">
.tel
{
	width: 200px;
	height: 30px;
	border-radius: 5px;
	margin:3px;
}
</style>
<body id="page_client">
	

<div id="container">
	<!-- header -->
    <div id="header">
	<div id="titre">
 <p id="title" >Nissan Djurdjura motors</p>	
	</div>
    	<div >
		<img id="logo" src="images\nissan.png" title="nissan" ></div>
		
		<div id="menu">
        	<ul>
            <li><a  href="../accuil-chef.php">accueil</a></li>
           <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">recu de versemet</a></li>
			<li><a   href="suiver_des_client.php">suivi des client</a></li>
			<li><a   id="proformat" href="client.php">client</a></li>
			<li><a   href="vehicule.php">M.vehicule</a></li>
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div>  
    </div>
	<div id="section">
			<div id="left">
	<ul id="liste_option">
			<div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="client-ajouter.php" >ajouter</a> </li></div>
			<div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="client-modifier.php">modifier</a></li></div>
			<div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="client-supprimer.php"> supprimer</a></li></div>
			</ul>
		<p id="information">  
				SARL DJURDJURA MOTORS 
				Agent Agrée NISSAN ALGERIE 
				  Service Commercial<br>
				Tel/fax: 034 34 72 16<br>
				Mob:05 52 27 45 95</p>
		
		
		
		
			
		</div>
		<div id="right">
			<div id="section_saisie-client">
				<form  method="post" action="client-ajouter-post.php">
			   <div id="client-att">
                                                     <h1>client</h1>
						   <label class="text-att">Nom et prenom  </label> <input type="text" name="nom" class="tel"/> 
							<label class="text-att">Tel</label><input type="text" name="tel" class="tel" />
							<label class="text-att">Adresse</label><input type="text" name="adresse" class="tel" />
							<label class="text-att">N° de registre</label><input type="text" name="registre" class="tel" />
							<label class="text-att">Matricule fiscale</label><input type="text" name="mat_fisc" class="tel" />
							<p id="affiche"><p>
							
		       </div>

							
						 <div id="btn-att">
                        <input type="submit" value="envoyer" name="valider" id="btn-save-att">
                        <input type="reset" value="Annuler" name="annuler" id="btn-del-att" >
						
						</div>

						<?php
					
						if (isset($_GET['message']) and !empty($_GET['message'])) {
						
						
							$error=$_GET['message'];
							switch ($error) {
									
									case '2':
										echo "<script>alert('le client existe deja dans votre base de données')</script>";

									break;	
									case '3':
										echo "<script>alert('Numero de telephone incorrect')</script>";
                                     
										break;
									default:
										echo "<script>alert('données incomplettes')</script>";
										break;
								}	




}
						?>
			
		</form>
			</div>
		</div>
			
			
			
			
	</div>
	<div id="footer">
		<p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> 
	</div>

     
</div>
</body>
 
</html>
