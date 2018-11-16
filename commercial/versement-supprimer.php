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
<title></title><link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-bloc_de_recherche.css" rel="stylesheet" type="text/css" />
<link href="style-tabbloc.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/commande_icon.jpg">
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
            <li><a  href="../accuil-commercial.php">accueil</a></li>
           <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  id="versement"href="versement.php">reçu de versement</a></li>
      <li><a  href="suiver_des_client.php">suivie des clients</a></li>
      <li><a  href="mode_de_vente.php">mode de vente</a></li>
      
      <li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>
  <div id="section">
<div id="left1">
    <h2 id="titre_de_recherche">recherche</h2><img id="loupe" src="images/loupe.png">
      <form action="versement-supprimer.php" method="POST">
        
        <div class="choix"><label  for="nom_de_client" > le nom de client</label><input  type="text" name="nom_du_client" id="nom_de_client" ></div>
        <div class="choix"><label  for="nom_de_tel" > le num de telephone</label><input  type="tel" name="num_du_tel" id="nom_de_tel" ></div>
        <div class="choix"><label  for="date_de_bon" >la date de versement </label><input type="date"name="date_du_bon" id="date_de_bon" ></div>
        <div class="choix"><label for="num_de_bon" >le numero de bon</label><input type="text"name="num_du_bon" id="num_de_bon" placeholder="example:2015/001" ></div>
                <input  id="boton_recherche"type="submit" name="recherche_ver"value="recherche" />
      
      
      </form>
    
    
    
    
    </div>
    
    <div id="right1">
       
        <table id="tab_de_resultat">
      
        <tr id="titre_de_tab">
         <td class="numero1"  width="100">N° bon</td>
          <td class="nom1" width="100">Nom</td>
          <td class="tel1">Telephone</td>
          <td class="vendeur1"width="150">Date de versement</td>
          <td class="mode1" >versement</td>
          <td class="date1" width="100">rest a payer</td>
          <td></td>
        </tr>
  
  
<?php
if(isset($_POST['recherche_ver'])){
$model=0;
$form=0;

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

            
           
$i=0;
$vide="";
                
   $req1=$bdd->query('SELECT  * FROM command, client, recu_verssement WHERE (recu_verssement.id_command=command.id_command) and  (command.id_client=client.id_client) order by recu_verssement.id_rv ');  

                       while(($donnee=$req1->fetch()))

                       {
  $tab_id_command[$i]=$donnee['id_command'];

 

                         if(

                         ((preg_match("#$_POST[date_du_bon]#i","$donnee[date_de_verssement]"))and($_POST['date_du_bon']!= NULL))
                         or
                         ((preg_match("#$_POST[num_du_bon]#i","$donnee[numero_bon]"))and($_POST['num_du_bon']!= NULL)) 
                         or 
                         ((preg_match("#$_POST[nom_du_client]#i","$donnee[nom]"))and($_POST['nom_du_client']!= NULL)) 
                         or 
                        ((preg_match("#utf8_decode($_POST[num_du_tel])#i","utf8_decode($donnee[tele])"))and($_POST['num_du_tel']!= NULL)) 
                          )
                       {
     $req=$bdd->query('select * from recu_verssement where(recu_verssement.id_command=\''.$tab_id_command[$i].'\') order by recu_verssement.id_rv desc' );
     if($tab_id_command[$i]!=$vide  )
     {

      $donnee1=$req->fetch();
      $vide=$tab_id_command[$i];
         $id_a_modifier=$donnee1['id_rv'];
                           
        
        

      echo '<tr class="resultat" ondblclick="takfa1('.$donnee['id_rv'].','.$donnee['id_command'].')" onclick="client('.$donnee['id_rv'].');">
            <td>'.$donnee['numero_bon'].'<input  type="hidden" name="numero_bon" value="'.$donnee['numero_bon'].'" id="nomero1"/></td>
          <td class="nom"><p>'.$donnee['nom'].'</td>
          <td  class="tel" "><p>'.$donnee['tele'].'</p></td>
          <td class="vendeur"><p>'.$donnee1['date_de_verssement'].'</p></td>
          <td class="mode"><p>'.$donnee1['versement'].'</p></td>
          <td class="date"><p> '.$donnee1['rest_payer'].'</td>
          <input type="hidden" name="id_command"  value="'.$donnee['id_command'].'"/>
          <input type="hidden" name="id_a_supprimer"  value="'.$id_a_modifier.'"/>
          <input type="hidden" name="nom"  value="'.$donnee['nom'].'"/>
          
          <td> </td>
      </tr>';   
      echo'<div id="resultat"></div>';
                  $form=1; 

              }else
     {
      $vide=$tab_id_command[$i];
      $i=$i+1;
     }   

          }
 $i=$i+1;
}
 

        
echo'</table>';
                            if ($form==0) {


                echo "<script>alert('aucun resultat selectionner')</script>";
              
              }
          


           
          }
 }
?>
</table>
          
  
      
    </div>
      
  </div>
      </div>

  <div id="footer"><p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
  
     

<script >
      function takfa()
      {
    document.getElementById("resultat").innerHTML = ""; 
    document.getElementById("test").style.opacity="1";   
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
        document.getElementById("test").style.opacity="0.3";
      
            }
        
        }

        xmlhttp.open("POST","versement_ajax.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send('q1=' + str);
    }

}



     </script>

<script>
function takfa1(ta,ta1){

if(confirm('vouler vous suuprimer ')){
window.location.href=("supprimer_versement_post.php?id_a_supprimer="+ta+"&id_command="+ta1);
}
  
}
</script>


</body>
 
</html>
