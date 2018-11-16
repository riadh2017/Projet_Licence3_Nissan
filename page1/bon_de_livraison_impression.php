<?php
	session_start();
   ob_start(); 
   

$id_command=$_GET['id_command'];
?>
<?php 
try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage());}  
$i=0;
$c=0;
$req_code_facteur=$bdd->query('select * from bon_livraison,command,client where(bon_livraison.id_command='.$id_command.'  and command.id_client=client.id_client)');
$donne=$req_code_facteur->fetch();
$req_code_facteur->closeCursor();


  $req=$bdd->query('select * from item where(item.id_command='.$id_command.' ) ');
  while($donne1=$req->fetch())
{
  
 $c=$c+1;

  /***** variable utiliser cas une seul item *////////
  /*
  $id_item=$donne1['id_item'];
  $tab_designation=$donne1['designation'];
$tab_couleur=$donne1['couleur'];
*/
/***** variable utiliser cas pluseurs item  donc un tableau *////////
$tab_id_item[$i]=$donne1['id_item'];
$tab_designation[$i]=$donne1['designation'];
$tab_couleur[$i]=$donne1['couleur'];
$i=$i+1;
}
$req->closeCursor();

?>

<page backtop="5mm" backleft="10mm" backright="10mm" backbottom="8mm" >
<div id="header">
         <div id="logo">
            <img src="images/nissan.png" id="logo_nissan" />
         </div>
         <div id="slogo">
        <p id="titre1">DJURDJURA MOTORS, Akbou</p>
        <p id="titre2">AGENT AGREE NISSAN ALGERIE</p>
        <p id="text1">
          siège social:La RN 26,Azaghar,Akbou,bejaia<br>
          Mob:0552 27 45 95<br>
          Email:djurdjuramotors@hotmail.com<br>
          www.nissan.dz
        </p>
            </div>
            <h3 id="bon">BON DE LIVRAISON</h3>
</div>
<p id="indication">Le client ci-dessous mentionné déclare et atteste avoir récu un véhicule conforme au véhicule <br>
  objet du bon de commande ( <?php echo $donne['code_facteur'];  ?> ) et repondant aux caractéristrique  ci-dessous</p>
<br>

<h4>1-CLIENT</h4>
<table id="client">
        <tr>
          <td class="col1">
            NOM-PRENOM/RAISON SOCIALE:
          </td>
          <td class="col2">
            <?php echo$donne['nom'];?>
          </td>
        </tr>

        <tr>
           <td class="col1">ADRESSE/SIEGE SOCIAL:
          </td>
          <td class="col2">
             <?php echo$donne['adresse'];?>
          </td>
        </tr>
        <tr>
           <td class="col1">
            TEL/FAX:
          </td>
          <td class="col2">
             <?php echo$donne['tele'];?>
          </td>

        </tr>
        <tr>
           <td class="col1">
            CODE CLIENT:
          </td>
          <td class="col2">
             <?php echo $donne['code_client'] ; ?>
          </td>
        </tr>
</table><!--fin de tableau client -->

<br>
<h4>2-VEHICULES</h4>
<table id="veh">
<?php 



if($c == 1)  

{

$req_matricul=$bdd->query('select * from  matricul_chassis where ( matricul_chassis.id_item='.$tab_id_item[0].')');
$donne3=$req_matricul->fetch();
$tab_chassis[0]=$donne3['chassis'];
$tab_matricul[0]=$donne3['matricul'];
$req_matricul->closeCursor();

?>

  <tr>
    <td class="col1">
      MODEL:
    </td>
    <td class="col2">
     <?php echo $tab_designation[0]; ?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      COULEUR:
    </td>
    <td class="col2">
    <?php echo $tab_couleur[0] ;?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      N° CHASSIS :
    </td>
    <td class="col2">
 <?php echo $tab_chassis[0];?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      MATRICULE N°:
    </td>
    <td class="col2">
     <?php echo $tab_matricul[0]; ?>

    </td>
  </tr>
  <tr>
    <td class="ligne5" colspan="2">
SANS DOSSIER DEFFINITIF
    </td>
  </tr>
    </table>
  <?php    }
  else 
  {

$m=0;
while($m < $c)
{
$req_matricul1=$bdd->query('select * from  matricul_chassis where ( matricul_chassis.id_item='.$tab_id_item[$m].')');
$donne4=$req_matricul1->fetch();
$tab_chassis[$m]=$donne4['chassis'];
$tab_matricul[$m]=$donne4['matricul'];

$m=$m+1;
}
$req_matricul1->closeCursor();

?>  <tr>
     <b> <td>Model </td>   <td>Couleur</td>    <td>Chassis</td> <td>Matricul</td>  <?php echo'<br>';?>  </b></tr> 
      <?php
      $r=0;
   for($r=0;$r<$c;$r++)
   {

echo' <tr>
      <td >'.$tab_designation[$r].'</td >  <td>'. $tab_couleur[$r] .'</td> <td> '.$tab_chassis[$r].'</td> <td>'.$tab_matricul[$r].' </td> </tr>   ';

}  
  

  echo '  <tr>
    <td class="ligne5" colspan="2">
SANS DOSSIER DEFFINITIF
    </td>
  </tr>
    </table>';
    } 
?>

  <br>
  <h4>3-VISA</h4>

  <div id="gauche">
    <p><h5><u>Pour DJURDJURA  MOTORS SARL</u></h5></p>
    <p>Nom:  <?php echo $_SESSION['nom'];?></p>
    <p>Date:  <?php   $anne= date('Y');$anne1= date('m');$anne11= date('d');echo $date=$anne.'-'.$anne1.'-'.$anne11;?></p>
  </div>

  <div id="droite">
    <p><h5><u>Pour Le Client </u></h5></p>
    <p>Nom:  <?php echo $donne['nom'];?></p>
    <p>N° C.I.N/PC :<?php echo$donne['ccp'];?></p>
      <p>Delivré :<?php echo$donne['delivrais_adrese'];?></p>
  </div>

</page>
<style type="text/css">
#droite
{
  position: absolute;
  left: 380px;
  top: 765px;
}


p h5
{
  text-align: center;
  font-size: 14;
}
#gauche,#droite
{
  width: 300px;
  border: 1px solid black;
  height: 210px;
  padding-left: 8px;

}
p{


  text-decoration: red;
}
.ligne5
{
  text-align: right;
  height: 98px;
  padding-bottom: 5px;
  width: 565px;

}
#veh .col1
{
  width: 200px;
  height: 25px;
}
#veh .col2
{
  width: 460px;
  
}
td{

  margin-left: 50px;
}


#client .col1
{
  width: 240px;
  height: 25px;
}
#client .col2
{
  width: 420px;
  text-transform: uppercase;
}
h4
{
  text-align: center;
  text-decoration: underline;
}
#client,#veh
{
  border: 1px solid black;
}
#bon
{
  position: relative;
  top:70px;
  text-align: center;
  text-decoration: underline;
}
#text1
{
  font-size: 10;
}
#titre1
{
  font-weight: bold;
  font-size: 13;
}
#titre2
{
  margin-bottom: -10px;
  font-size: 13;

}
#logo_nissan
{
  width: 85px;
  height: 75px;
}
#slogo,
{position: absolute;
  left: 490px;
  top: 8mm; 
}
#info
{
  font-family: Times ,sans-serif;
}


</style>

<?php	

    $content = ob_get_clean();

    // convert to PDF
     require('../../html2pdf/html2pdf_v4.03/html2pdf.class.php'); // cette commande est pour préciser le chemin où il se trouve "html2pdf.class.php"
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('certificat1pdf.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>



