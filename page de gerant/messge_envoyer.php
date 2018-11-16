<?php
session_start();
$id_exp=$_SESSION['id'];
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:./../Login.php');
}
try {   $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } 
           catch (Exception $e) {die('Erreur : '.$e->getMessage());}

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
  <style type="text/css">body{background: url('images/back.png') repeat;}
</style>


 <style type="text/css">#left4{
  margin-top: 6px;
 border-radius:6px;
 display:inline-block;
 width:230px;
 height:495px;
 background:url('left.png') repeat;
 padding:2px 2px 2px 2px;
font-size: 0.8em;
}

 </style>

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
            <li><a id="commande" href="accuil.php">accueil</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versement</a></li>
      <li><a  href="parametre.php">parametre</a></li>
      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
     </div>
	<div id="section">


    <div id="left4">
    <ul id="liste_option">
      <div class="lien"><img src="images/nouveau.png" id="icon_add"/><li id="ajouter"><a href="nouveau_messge.php">Nouveau message</a> </li></div>
      <div class="lien"><img src="images/reception.png" id="icon_edit"><li id="modifier"><a href="messge_new.php">Boite de réception</a></li></div>
      <div class="lien"><img src="images/envoyer.png" id="icon_del"><li id="supprimer"><a href="messge_envoyer.php"> Message envoyer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>
    
    </div>


</div>
		
		<div id="right1">
			
	   		<table id="tab_de_resultat1">
			
				<tr id="titre_de_tab" >
					
					<td class="nom1">nom destinataire</td>
		            <td class="date1">date</td>
		            <td class="tel1">message</td>
					
				</tr>
			
				
						<?php
                 $num=1;
                 $da=date('Y,m,d');
               
$req=$bdd->query('SELECT * from messagerie where id_lexpiditeur = '. $id_exp.' Limit 0, 10 ');
while($donne=$req->fetch())
{

 $donne['date_message'];
 $donne['message'];
 $id=$donne['id_destinataire'];
echo'<input type="hidden" value="'.$id_exp.'" id="afficher"/>  ' ; 
$req1=$bdd->query('SELECT * from user where id_user= '.$id.'');
$donne1=$req1->fetch();
 $donne1['nom'];
$donne1['prenom'];
		
			echo '<tr  class="resultat" onclick="client('.$donne['id_messagerie'].');" >
			
					<td class="nom1"><p>'.$donne1['nom'].' '.$donne1['prenom'].'</p></td>
					<td  class="date1" ><p>'.$donne['date_message'].'</p></td>
					<td ><p class="mess"> '.$donne['message'].'</p></td>
					
			</tr>';		

                   
              }

         
          echo"</table>";
          
?>		
</form>

			</table>
		
        </div>
			



	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance</p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div> 
</div>
<div id="resultat"></div>
<style>
/*le tableau recherche*/

#right1{

position : center ;
margin-left: 3%;
margin-top: 15px;
vertical-align: top;
width: 75%;


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
width:100%;
height:auto;
margin :auto;

font-size:1.0em;
border-collapse: collapse;
}
.mess{max-width: 500px;max-height: 18px; overflow: hidden;}
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
background:;
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

<script >
      function takfa()
      {
    document.getElementById("resultat").innerHTML = ""; 
    document.getElementById("container").style.opacity="1";   

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
        document.getElementById("container").style.opacity="0.4";

      


            }
        
        }

        xmlhttp.open("POST","message_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }

}

</script>
</body>
 
</html>
