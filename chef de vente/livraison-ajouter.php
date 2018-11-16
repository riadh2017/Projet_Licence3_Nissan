<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('Location:./../Login.php');
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
<link href="style-tabbloc.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">

</head>
<style type="text/css">
body
{
}
</style>
<body>

<div id="container">
	<!-- header -->
    <div id="header">
	<div id="titre">
 <p id="title" >Nissan Djurdjura motors</p>	
	</div>
    	<div >
	<img id="logo" src="images/nissan.png" title="nissan" ></div>
		
		<div id="menu">
        	<ul>
        
            <li><a  href="../accuil-chef.php">accueil</a></li>
            <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  id="livraison" href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versemet</a></li>
      <li><a  href="suiver_des_client.php">suivie des client</a></li>
      <li><a    href="client.php">client</a></li>
      <li><a  href="vehicule.php">M.vehicule</a></li>
      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div>  
    </div>

	<div id="section">
	<div id="left1">
		
			<h2 id="titre_de_recherche">recherche</h2><img id="loupe" src="images/loupe.png">
			<form action="livraison-ajouter.php" method="POST">
				
				<div class="choix"><label  for="nom_de_client" > le nom de client</label><input  type="text" name="nom_du_client" id="nom_de_client" ></div>
				<div class="choix"><label  for="nom_de_tel" > le num de telephone</label><input  type="text" name="num_du_tel" id="nom_de_tel" ></div>
				<div class="choix"><label  for="date_de_bon" >la date de bon </label><input type="date"name="date_du_bon" id="date_de_bon" ></div>
				<div class="choix"><label for="num_de_bon" >le numero de bon</label><input type="text"name="num_du_bon" id="num_de_bon" placeholder="example:2015/001" ></div>
				<div class="choix"><label for="mod_de_client" >le modele de vehicule</label><input type="text" name="model_du_vehicul" id="mod_de_client" ></div>
				<input  id="boton_recherche"type="submit" name="recherche" value="recherche" />
			
			
			</form>
		</div>
		
		<div id="right1">
			
	   		<table id="tab_de_resultat">
			
				<tr id="titre_de_tab">
					 <td class="numero">N°c</td>
					<td class="nom">nom</td>
					<td class="tel">telephone</td>
					<td class="modele">vehicule</td>
					<td class="vendeur">vendeur</td>
					<td class="mode">vente</td>
					<td class="date">date</td>
					<td class="action">Etablire</td>
				</tr>
			
				
						<?php
		

$i=0;
$j=0;

                 if ((isset($_POST['nom_du_client']) and $_POST['nom_du_client'] != NULL)
                  or 
                 (isset($_POST['num_du_tel']) and ($_POST['num_du_tel'] != NULL)) 
                  or 
                 (isset($_POST['date_du_bon']) and ($_POST['date_du_bon'] != NULL))
                  or
                  (isset($_POST['num_du_bon']) and ($_POST['num_du_bon'] != NULL)) 
               )
{
 
            try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }

   $req1=$bdd->query('SELECT  command.id_client, command.id_command, client.nom, command.id_user, command.mode_de_vente, command.date_command ,client.tele,command.numero_bon FROM command, client WHERE (command.id_client=client.id_client);');
 


                       while(($donnee=$req1->fetch()))
                       {

                       	$req2=$bdd->query('select * from item , command where item.id_command=\'' . $donnee['id_command'] . '\' ');
                         $donnee1=$req2->fetch();
                         if(((preg_match("#$_POST[date_du_bon]#i","$donnee[date_command]"))and($_POST['date_du_bon']!= NULL))
                         or
                         ((preg_match("#$_POST[num_du_bon]#i","$donnee[numero_bon]"))and($_POST['num_du_bon']!= NULL)) 
                         or 
                         ((preg_match("#$_POST[nom_du_client]#i","$donnee[nom]"))and($_POST['nom_du_client']!= NULL)) 
                         or 
                         ((preg_match("#$_POST[num_du_tel]#i","$donnee[tele]"))and($_POST['num_du_tel']!= NULL)) 
                          )
                       {
                       	

				echo"<form action='ajouter_livraison_post.php' method='POST'>";

			echo '<tr class="resultat">
				    <td>'.$donnee['numero_bon'].'</td>

				    <input  type="hidden" name="numero" value="'.$donnee['numero_bon'].'" id="nomero1"/>
					<td class="nom"><p>'.$donnee['nom'].'</td>
					<td  class="tel" "><p>'.$donnee['tele'].'</p></td>
					<td class="modele"><p> '.$donnee1['designation'].'</p></td>
					<td class="vendeur"><p>'.$donnee['id_user'].'</p></td>
					<td class="nom"><p>'.$donnee['mode_de_vente'].'</p></td>
					<td class="nom"><p> '.$donnee['date_command'].'</td>
					<input type="hidden" name="id_command"  value="'.$donnee['id_command'].'"/>

					<input type="hidden" name="numero_bon"  value="'.$donnee['numero_bon'].'"/>
					
					<input type="hidden" name="id_client"  value="'.$donnee['id_client'].'"/>
					<td> <input type="submit" value="E" name="etablire" id="input_modif"/></form></td>
			</tr>';		
	                $j=1;       
	                }
	            }


	        }
	        else{
if((isset($_POST['model_du_vehicul']) and $_POST['model_du_vehicul'] != NULL)){



try {

                $bdd1 = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }

   $req3=$bdd1->query('select  * from command ,client ,item where (item.id_command = command.id_command) and (command.id_client=client.id_client)');
 

$j=0;
                       while(($donnee3=$req3->fetch()))
                       {

                       	if (((preg_match("#$_POST[model_du_vehicul]#i","$donnee3[designation]"))and($_POST['model_du_vehicul']!= NULL)) ) {
                       	
                       	

				echo"<form action='ajouter_livraison_post.php' method='POST'>";


            $i=1;
			echo '<tr class="resultat">

				    <td><input  type="" name="numero" value="'.$donnee3['numero_bon'].'" id="nomero1"/></td>
					<td class="nom"><input  type="hidden" name="nom" value="'.$donnee3['nom'].'"/><p>'.$donnee3['nom'].'</td>
					<td  class="tel" "><input  type="hidden" name="tel" value="'.$donnee3['tele'].'"/><p>'.$donnee3['tele'].'</p></td>
					<td class="modele"><p> '.$donnee3['designation'].'</p></td>
					<td class="vendeur"><p>'.$donnee3['id_user'].'</p></td>
					<td class="nom"><p>'.$donnee3['mode_de_vente'].'</p></td>
					<td class="nom"><p> '.$donnee3['date_command'].'</td>
					<input type="hidden" name="id_command"  value="'.$donnee3['id_command'].'"/>
					<input type="hidden" name="id_client"  value="'.$donnee3['id_client'].'"/>
					<td> <input type="submit"value="E" name="etablire" id="input_modif"/></form></td>
			</tr>';		
	                      
	                
                      }   }
                   
              }
}
         
          echo"</table>";
?>		
        </table>
		</div>
        </div>
</div>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
     
</div>
<?php
if ((isset($_POST['nom_du_client']) and $_POST['nom_du_client'] != NULL)
                  or 
                 (isset($_POST['num_du_tel']) and ($_POST['num_du_tel'] != NULL)) 
                  or 
                 (isset($_POST['date_du_bon']) and ($_POST['date_du_bon'] != NULL))
                  or
                  (isset($_POST['num_du_bon']) and ($_POST['num_du_bon'] != NULL)) 
               ){ 
	            if ($j==0) {


	            	echo "<script>alert('aucun resultat selectionner')</script>";
	            
	            }}



if((isset($_POST['model_du_vehicul']) and $_POST['model_du_vehicul'] != NULL)){

 if($j==0){

                      	echo"<script>alert('aucun resultat')</script>";
    }

}

/******************** alert a supprimer a raid ***************/
	       if( isset($_POST['recherche'])and ($_POST['recherche']==NULL)){
	       	echo"<script>alert('Rechercher d \'abord un bon de commande ')</script>";     
       
          }

	

          ?>
</body>
 
</html>
