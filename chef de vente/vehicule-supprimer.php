<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:../Login.php');
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
<link rel="icon" type="type/ico" href="images/parametre_icon.jpg">
<link href="style-bloc_de_recherche.css" rel="stylesheet" type="text/css" />
<link href="style-tabbloc.css" rel="stylesheet" type="text/css" />

</head>
<body id="page_vehicule">

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
			<li><a   href="client.php">client</a></li>
			<li><a  id="vehicule" href="vehicule.php">M.vehicule</a></li>
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div>
        </form>  
    </div>
	<div id="section">
			<div id="left1">
	
		<h2 id="titre_de_recherche">recherche</h2><img id="loupe" src="images/loupe.png">
			<form action="vehicule-supprimer.php" method="POST">
				
				<div class="choix"><label for="mod_de_client" class="text-recherche">le modele de vehicule</label><input type="text" name="modele" id="mod_de_client" ></div>
				<input  id="boton_recherche"type="submit" name="recherche" value="recherche"/>
			</form>	
		</div>
	 
		<div id="right1">
			<div id="section_saisie-modele1">
<div id="tableau-de-resultat">
	   		<table id="tab_de_resultat">
			
				<tr id="titre_de_tab">
					 <td class="numero">N°</td>
					<td class="nom">designation</td>
					<td class="tel">remise</td>
					<td class="modele">hdd</td>
					<td class="vendeur">ttc</td>
					<td class="mode">dmm</td>
					<td class="date">timbre</td>
					<td class="action">action</td>
				</tr>
				  
<?php
						if(isset($_POST['recherche']))
						{
							if ((isset($_POST['modele']) and $_POST['modele'] != NULL))
							{
								 
try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	} catch (Exception $e) {die('Erreur : '.$e->getMessage()); } 
								 	$req1=$bdd->query('select * from modele_veh');

                       while(($donnee=$req1->fetch()))
                       {
								 	if (preg_match("#$_POST[modele]#i","$donnee[designation]"))
								 	 {
								 		echo"<form action='vehicule-supprimer-post.php' method='POST'>";
      
			echo '<tr class="resultat" ondblclick="takfa1('.$donnee['id_modele_veh'].')" onclick="client('.$donnee['id_modele_veh'].');">
												    <td>'.$donnee['id_modele_veh'].'<input  type="hidden" name="numero" value='.$donnee['id_modele_veh'].' id="nomero1"/></td>
													<td class="nom"><p>'.$donnee['TTC'].'</td>
													<td  class="tel" "><p>'.$donnee['REMISE'].'</p></td>
													<td class="modele"><p> '.$donnee['designation'].'</p></td>
													<td class="vendeur"><p>'.$donnee['HT_HDD'].'</p></td>
													<td class="mode"><p>'.$donnee['HT_DDM'].'</p></td>
													<td class="date"><p> '.$donnee['TIMBRE'].'</td>
													<td><input type="hidden"  name="id" value="'.$donnee['id_modele_veh'].'"  /></form></td>
											</tr>';
								 	
								 	}
                       }
                       $req1->closeCursor();
                   }
}
?>
				</table>

			</div>
		</div>

		</div>		
	</div>
	<div id="footer">
		<p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> 
	</div>
	
<div id="resultat"></div>     
</div>
<div>


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

        xmlhttp.open("POST","vehicule_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }

}



     </script>



<script>
function takfa1(ta){

if(confirm('vouler vous suuprimer ')){
window.location.href=("vehicule-supprimer-post.php?id="+ta);
}}
	

</script>

</body>
 
</html>
