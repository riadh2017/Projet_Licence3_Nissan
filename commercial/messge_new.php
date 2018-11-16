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
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-tabbloc.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">
<link href="style-menu.css" rel="stylesheet" type="text/css" />

  <!-- End SlidesJS Required -->

  <!-- CSS for slidesjs.com example -->
  <link rel="stylesheet" href="css/example.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>

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
            <li><a id="accuil" href="../accuil-commercial.php">accueil</a></li>
           <li><a  href="proformat.php">F.proformat</a></li>
            <li><a   href="commande.php">bon de commande</a></li>
            <li><a   href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">recu de versemet</a></li>
			<li><a  href="suiver_des_client.php">suivie des client</a></li>
			<li><a  href="mode_de_vente.php">mode de vente</a></li>

			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>
	<div id="section">
<div id="left">
		
			<ul id="liste_option">
			<li id="ajouter"><a href="../accuil-commercial.php">ajouter message </a> </li>
			</ul>
		<p id="information">  <br> 
			<br>
			 <br>
			  </br> </br>
			   </br><br>
			  </br><br>
			  </br><br>
			  </br>
				SARL DJURDJURA MOTORS 
				Agent Agrée NISSAN ALGERIE 
				  Service Commercial<br>
				Tel/fax: 034 34 72 16<br>
				Mob:05 52 27 45 95</p>
		
		
		
		
		</div>
			
		</div>
		
		<div id="right1">
			<div id="tableau-de-resultat">
	   		<table id="tab_de_resultat1">
			
				<tr id="titre_de_tab">
					
					<td class="nom1">nom expedeteur</td>
		            <td class="date1">date</td>
		            <td class="tel1">message</td>
					
				</tr>
			
				
						<?php
		

 try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
                 $num=1;
                 $da=date('Y,m,d');
               
$req=$bdd->query('SELECT * from messagerie where id_recepteur = \''.$num.'\' ');
while($donne=$req->fetch())
{

 $donne['date_message'];
 $donne['message'];
 $id=$donne['id_lexpiditeur'];

$req1=$bdd->query('SELECT * from user where(id_user= \''.$id.'\')');
$donne1=$req1->fetch();
 $donne1['nom'];



                       	

				

			echo '<tr class="resultat">
			
					<td class="nom1"><p>'.$donne1['nom'].'</p></td>
					<td  class="date1" ><p>'.$donne['date_message'].'</p></td>
					<td class="tel1"><p> '.$donne['message'].'</p></td>
					
			</tr>';		

                   
              }

         
          echo"</table>";
?>		

			</table>
		</div>
        </div>
			

</form>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div> 
</div>

<style>
/*le tableau recherche*/
#right1{

position : center ;


}
#right1,#section
{


	 	display: inline-block;
}

td
{
padding:9px;
border-bottom: 2px solid white;
}

#tab_de_resultat1
{
width:800px;
height:auto;
margin :auto;
margin-left:25px;
font-size:1.0em;
border-collapse: collapse;
}
#titre_de_tab1
{
text-align :left;
background:  url('images/0.jpg') repeat-x;
text-transform:uppercase;
font-size:.9em;
font-weight:bold;
padding:5px;
}


.resultat:hover
{
background:url('images/00c.jpg') repeat-x;
color :black;
}

.nom1 
{
width:150px;
max-width:150px;
overflow:hidden;
}

.tel1 
{
max-width:250px;
width:250px;
overflow:hidden;
}

.date1
{
max-width:90px;
width:90px;
overflow:hidden;
}





</style>


</body>
 
</html>
