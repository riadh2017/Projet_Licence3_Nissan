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
<link href="style-bloc_de_recherche.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link href="style-tabbloc.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/parametre_icon.jpg">

</head>
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
			<li><a  href="suiver_des_client.php">suivi des client</a></li>
			<li><a  id="client" href="client.php">client</a></li>
			<li><a  href="vehicule.php">M.vehicule</a></li>
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div>  
    </div>
	<div id="section">
			<div id="left1">
				<h2 id="titre_de_recherche">recherche</h2><img id="loupe" src="images/loupe.png">
			<form action="client-supprimer.php" method="POST">
				
				<div class="choix" ><label  for="nom_de_client" class="text-recherche" > le nom de client</label><input  type="text" name="nom" id="nom_de_client" ></div>
				<div class="choix" ><label  for="nom_de_tel" class="text-recherche"> le num de telephone</label><input  type="text" name="tel" id="nom_de_tel" ></div>
				<div class="choix" ><label  for="adresse" class="text-recherche"> adresse</label><input  type="text" name="adresse" id="nom_de_tel" ></div>
				<div class="choix" ><label  for="nom_de_tel" class="text-recherche">N° registre de commerce</label><input  type="text" name="registre" id="nom_de_tel" ></div>
				<input  id="boton_recherche"type="submit" name="valider" value="recherche" />
			</form>	
		</div>
		<div id="right1">
			<div id="section_saisie-client1">
				<div id="tableau-de-resultat">
	   		<table id="tab_de_resultat">
			
				<tr id="titre_de_tab">
					 <td class="numero">N°c</td>
					<td class="nom">nom</td>
					<td class="tel">tel</td>
					<td class="modele">adresse</td>
					<td class="vendeur">N°registre</td>
					<td class="mode">fisc</td>
					<td class="action">action</td>
				</tr>
				<?php
				$b=0;
				if (isset($_POST['valider'])) {
					
								try {
			  			$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');

			  		}   catch (Exception $e) {
			  									die('erreur:'.$e->gestMessge());
			  		                          }
				if (
					   (isset($_POST['tel']) AND $_POST['tel'] != NULL) 

					or (isset($_POST['nom']) and $_POST['nom'] != NULL) 

					or (isset($_POST['registre']) and $_POST['registre'] != NULL) 

					or (isset($_POST['adresse']) and $_POST['adresse'] != NULL)
					) 
				{
					 $reponse = $bdd->query('SELECT * FROM client');
					  while ($donnees = $reponse->fetch())
					  {
					  	if(
					  	(preg_match("#$_POST[nom]#i","$donnees[nom]") AND $_POST['nom'] != NULL)
                         or
                         (preg_match("#$_POST[tel]#i","$donnees[tele]")  AND $_POST['tel'] != NULL) 
                         or 
                         (preg_match("#$_POST[adresse]#i","$donnees[adresse]") AND $_POST['adresse'] != NULL) 
                         or 
                         (preg_match("#$_POST[registre]#i","$donnees[n_registre]") AND $_POST['registre'] != NULL) 
                          )
					{
				
		     	    echo '<tr class="resultat" ondblclick="takfa1('.$donnees['id_client'].')" onclick="client('.$donnees['id_client'].');">
		     	    <form method="POST" action="client-supprimer-post.php">
				    <td>'.$donnees['id_client'].'<input  type ="hidden" name="didi" value="'.$donnees['id_client'].'" id="nomero1"/></td>
					<td class="nom"><p>'.$donnees['nom'].'</p></td>
					<td  class="tel"><p>'.$donnees['tele'].'</p></td>
					<td class="modele"><p>'.$donnees['adresse'].'</p></td>
					<td class="vendeur"><p>'.$donnees['n_registre'].'</p></td>
					<td class="mode"><p>'.$donnees['matricul_fiscal'].'</p></td>
					<td class="numero"></td>
					<input  type ="hidden" name="le_id" value="'.$donnees['id_client'].'" />
					</form>
					</tr>';
					
				
					$b=1;
			}/* fin condition */
				      }/* fin boucle*/
			}
			if ($b==0) {
				/*en cas d une aucun resultat */ 

			}
		}/*fin isset de btn*/
				?>
			</table>
			</div>
		</div>
			
	<?php
			if(isset($_GET['message']) and $_GET['message']=='1'){
				echo "<script>alert('le client a ete supprimer')</script>";
			}


	?>


			
			
	</div>
</div>
	<div id="footer">
		<p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> 
	</div>
	
     
</div>
<div id="resultat"></div>
	<style type="text/css"> 
.mode,.modele
{
	width: 180px;
}
#msg
{
	color: white;
}
	</style>

	<script >
      function takfa()
      {
    document.getElementById("resultat").innerHTML = ""; 

      }

function client(str) {
    if (str == "") {
    
        document.getElementById("resultat").innerHTML = "";
        return;
    } else { 
      
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
       
        
        document.getElementById("resultat").innerHTML = xmlhttp.responseText;
        
      
            }
        
        }

        xmlhttp.open("POST","client_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }

}



     </script>



<script>
function takfa1(ta){

if(confirm('vouler vous suuprimer ')){
window.location.href=("client-supprimer-post.php?client="+ta);
}}
	

</script>

</body>
 
</html>
