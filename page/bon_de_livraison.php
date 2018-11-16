<html>
<head>
	<link href="bonliv.css" rel="stylesheet" type="text/css"  media="print"/>

</head>
<style>

.btn
{
	width:200px;
	height: 35px;
}
#retour
{
	width: 200px;
	height: 30px;
	padding-top: 7px;
	background: red;
  color: white;
  font-size: 1.1em;
	border: 1px solid black;
  position: absolute;
  left: 60%;
  top:40%;

}
.lien
{
	text-decoration: none;
	color: white;
	text-align: center;


}
#droite
{
  margin-left: 5%;
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
  height: 160px;
  padding-left: 8px;
  display: inline-block;
  vertical-align: top;

}

#col21
{
  text-align: right;
}
.col11
{
  border-bottom: 1px solid black;

}
#dess
{
  width: 200px;
}
.ligne5
{
  text-align: right;
  height: 30px;
  padding-bottom: 15px;
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

#client .col1
{
  width: 260px;
  height: 25px;
  font-size: 13px;

}
#client .col2
{
  width: 420px;
  text-transform: uppercase;
  font-size: 15px;
}
h4
{
 
  text-decoration: underline;

}
#client,#veh
{
  border: 1px solid black;
}
#bon
{
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

#info
{
  font-family: Times ,sans-serif;
}


</style>

<body>
<?php
session_start();
try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage()); }  
$req=$bdd->query('SELECT * FROM bon_livraison, command, client, item , matricul_chassis WHERE (command.id_command = bon_livraison.id_command  AND command.id_command ='.$_GET['id_command'].' AND command.id_client = client.id_client AND item.id_command = command.id_command AND matricul_chassis.id_item = item.id_item)');

$i=0;

while($donnee2=$req->fetch()){
$nom=$donnee2['nom'];
 $adresse=$donnee2['adresse'];
 $tel=$donnee2['tele'];
 $code=$donnee2['code_client'];
 $des[$i]=$donnee2['designation'];
 $couleur[$i]=$donnee2['couleur'];
 $chassis[$i]=$donnee2['chassis'];
 $mat[$i]=$donnee2['matricul'];
 $pc=$donnee2['ccp'];
 $del=$donnee2['delivrais_adrese'];
 $num=$donnee2['numero_bon'];
$i=$i+1;
 }
$cont=$i;
$jour=date('d');
$moin=date('m');
$annee=date('y');
$date=$jour.'/'.$moin.'/'.$annee;



?> 



<h3 id="bon">BON DE LIVRAISON</h3>
<p id="indication">Le client ci-dessous mentionné déclare et atteste avoir récu un véhicule conforme au véhicule <br>
  objet du bon de commande ( <?php echo $num;  ?> ) et repondant aux caractéristrique  ci-dessous</p>
<br>

<h4>1-CLIENT</h4>
<table id="client">
        <tr>
          <td class="col1" >
            NOM-PRENOM/RAISON SOCIALE:
          </td>
          <td class="col2">
            <?php echo $nom;?>
          </td>
        </tr>

        <tr>
           <td class="col1">ADRESSE/SIEGE SOCIAL:
          </td>
          <td class="col2">
             <?php echo $adresse ;?>
          </td>
        </tr>
        <tr>
           <td class="col1">
            TEL/FAX:
          </td>
          <td class="col2">
             <?php echo $tel;?>
          </td>

        </tr>
        <tr>
           <td class="col1">
            CODE CLIENT:
          </td>
          <td class="col2">
             <?php echo $code.$cont ?>

          </td>
        </tr>
</table><!--fin de tableau client -->

<br>
<h4>2-VEHICULES</h4>

<?php 
if ($cont<=1) { 
  /*pour 1 seul chassis et 1 seul matricule*/

?>
 <table id="veh" width="690">
  <tr>
    <td class="col1">
      MODEL:
    </td>
    <td class="col2">
      <?php  echo $des[0]; ?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      COULEUR:
    </td>
    <td class="col2">
     <?php echo $couleur[0];?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      N° CHASSIS :
    </td>
    <td class="col2">
   <?php echo $chassis[0];?>
  </tr>
  <tr>
    <td class="col1">
      MATRICULE N°:
    </td>
    <td class="col2">
   <?php echo $mat[0]; ?>
    </td>
  </tr>
  <tr>
    <td class="ligne5" colspan="2">
SANS DOSSIER DEFFINITIF
    </td>
  </tr>
  </table>

<?php
}else 
{
  ?>
  <table id="veh" width="650">
  <tr>
    <td class="col11">
      MODEL:
    </td>
    <td class="col11">
       COULEUR:
    </td>
    <td class="col11">
      N° CHASSIS :
    </td>
    <td class="col11">
      MATRICULE N°:
    </td>
  </tr>
  <tr>
  <td id="dess" class="pp">
<?php 
for ($i=0; $i <5 ; $i++) { 
  echo 'sdfd<br>';
}

?>
  </td>
  <td class="pp">

<?php  for ($i=0; $i <5 ; $i++) { 
  echo 'sdfd<br>';
}?>
  </td>
  <td class="pp">
<?php  for ($i=0; $i <5 ; $i++) { 
  echo 'sdfd<br>';
}?>
  </td>
<td class="pp">
<?php  for ($i=0; $i <5 ; $i++) { 
  echo 'sdfd<br>';
}

}
?>
</td>
   </tr>
   
     <tr>
      <br>


    <td class="ligne5" colspan="5">
SANS DOSSIER DEFFINITIF
    </td>
  </tr>
  </table>

  <br>

  <h4>3-VISA</h4>

  <div id="gauche">
    <p><h5><u>Pour DJURDJURA  MOTORS SARL</u></h5></p>
    <p>Nom:  <?php ?></p>
    <p>Date:  <?php echo $date;?></p>
  </div>

  <div id="droite">
    <p><h5><u>Pour Le Client </u></h5></p>
    <p>Nom:  <?php echo  $nom;?></p>
    <p>N° C.I.N/PC :<?php echo $pc;?></p>
      <p>Delivré :<?php  ?></p>
  </div>

<a href="../commercial/livraison.php" class="lien"><p id="retour">retour</p></a>

</div>
<script> window.print();</script>
</body>
</html>
