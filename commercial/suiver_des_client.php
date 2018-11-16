<?php
/*session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:Login.php');
}
*/
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
.vvv
{
  width: 50px;
  min-width: 25px;
  overflow: hidden;
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
    <img id="logo" src="images\nissan.png" title="nissan" ></div>
    
     <div id="menu">
          <ul>
            <li><a  href="../accuil-commercial.php">accueil</a></li>
           <li><a  href="proformat.php">F.proformat</a></li>
            <li><a   href="commande.php">bon de commande</a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versement</a></li>
      <li><a   id="suivie_des_client" href="suiver_des_client.php">suivie des clients</a></li>
      <li><a  href="mode_de_vente.php">mode de vente</a></li>

      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>
  <div id="section">
  <div id="left1">
    
      <h2 id="titre_de_recherche">recherche</h2><img id="loupe" src="images/loupe.png">
      <form action="suiver_des_client.php" method="POST">
        
        <div class="choix"><label  for="nom_de_client" > le nom de client</label><input  type="text" name="nom" id="nom_de_client" ></div>
        <div class="choix"><label  for="nom_de_tel" > le num de telephone</label><input  type="text" name="telephone" id="nom_de_tel" ></div>
        <div class="choix"><label  for="date_de_bon" >Adresse</label><input name="adresse" id="date_de_bon" ></div>
     
        <div class="choix"><label for="num_de_bon" >Date-debut_recherche</label><input type="date"name="date_debut" id="num_de_bon" placeholder="example:2015/001" ></div>
<div class="choix"><label for="mod_de_client" >Date_fin_de_recherche</label><input type="date" name="date_fin" id="mod_de_client" ></div>
        <input  id="boton_recherche"type="submit" name="recherche" value="recherche" />
      
      
      </form>
    </div>
    
    <div id="right1">
      
        <table id="tab_de_resultat">
      
        <tr id="titre_de_tab" id="test">
           <td>N°client</td>
          <td class="nom">nom</td>
          <td class="tel">telephone</td>
          <td class="modele">adresse</td>
          <td class="vendeur">matricul_fiscal</td>
          <td class="mode">registre</td>
        </tr>
      
        
            <?php
    

$i=0;
$j=0;

                 if ((isset($_POST['nom']) and $_POST['nom'] != NULL)
                  or 
                 (isset($_POST['num_du_tel']) and ($_POST['num_du_tel'] != NULL)) 
                  or 
                 (isset($_POST['adresse']) and ($_POST['adresse'] != NULL))
                )
{
 
            try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); 

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage()); 
 
                 }

   $req1=$bdd->query('SELECT * from client ');
 


                       while(($donnee=$req1->fetch()))
                       {
                         if(((preg_match("#$_POST[nom]#i","$donnee[nom]"))and($_POST['nom']!= NULL))
                         or
                         ((preg_match("#$_POST[telephone]#i","$donnee[tele]"))and($_POST['telephone']!= NULL)) 
                         or 
                         ((preg_match("#$_POST[adresse]#i","$donnee[adresse]"))and($_POST['adresse']!= NULL)) 
                            )
                       {
                        

    

      echo '<tr   onclick="client('.$donnee['id_client'].');" class="resultat"> 

          <td ><p>'.$donnee['id_client'].'</td>
          <td  class="nom"><p>'.$donnee['nom'].'</p></td>
          <td  class="tele"><p>'.$donnee['tele'].'</p></td>
          <td class="modele"><p> '.$donnee['adresse'].'</p></td>
          <td class="vendeur"><p>'.$donnee['matricul_fiscal'].'</p></td>
          <td class="mode"><p>'.$donnee['n_registre'].'</p></td>
       
      
      </tr>';   
                  $j=1;       
                  }
              }


          }
          
if( 
                  (isset($_POST['date_debut']) and ($_POST['date_debut'] != NULL)) 
                  or
                  (isset($_POST['date_fin']) and ($_POST['date_fin'] != NULL)) 
               ){



try {

                $bdd1 = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage()); 
 
                 }

   $req3=$bdd1->query('select  * from client');
 

$i=0;
                       while(($donnee=$req3->fetch()))
                       {

  if( ($_POST['date_debut'] <= $donnee['date_enregistre']) and  ($donnee['date_enregistre'] <=  $_POST['date_fin'])){      


      echo '<tr   onclick="client('.$donnee['id_client'].');" class="resultat"> <div id="resultat" ></div>
          <td ><p>'.$donnee['id_client'].'</td>
          <td  class="nom"><p>'.$donnee['nom'].'</p></td>
          <td  class="tele"><p>'.$donnee['tele'].'</p></td>
          <td class="modele"><p> '.$donnee['adresse'].'</p></td>
          <td class="vendeur"><p>'.$donnee['matricul_fiscal'].'</p></td>
          <td class="mode1"><p>'.$donnee['n_registre'].'</p></td>
       
      </tr>'; 

            $i=1;
                        }
                  
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
  <div id="resultat"></div>


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
               document.getElementById("container").style.opacity="0.7";

            }
        
        }

        xmlhttp.open("POST","suivie_client_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }

}



     </script>
    
      
</body>
 
</html>
