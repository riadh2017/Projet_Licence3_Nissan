<?php
session_start();
?>
<html>
<head>
  <link href="brahim1.css" rel="stylesheet" type="text/css"  media="print"/> 
  <link href="stl1.css" rel="stylesheet" type="text/css" />
</head>
<?PHP
$id=$_GET['id'];

 try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage()); }   
$req=$bdd->query('select * from facture_pro,iteme_facture,modele_veh,client where (facture_pro.id_facture='.$id.' and iteme_facture.id_facture=facture_pro.id_facture and iteme_facture.id_modele_veh=modele_veh.id_modele_veh and modele_veh.designation=iteme_facture.designation and client.id_client=facture_pro.id_client)');
  $i=0; 
  $somme_Qte=0; 
  $total_timbre=0;                                                                                     /*sasisr id facture proformamt*/
   while ($donnee2=$req->fetch()) {

     $des[$i]=$donnee2['designation'];
     $Qte[$i]=$donnee2['quantite'];
     $couleur[$i]=$donnee2['couleur'];
     $prix[$i]=$donnee2['TTC'];
     $prix_selon[$i]=$donnee2['prix_selon_facture']; 
     $num=$donnee2['numero_fact'];
     $nom=$donnee2['nom'];
     $somme_Qte=$somme_Qte+$donnee2['quantite'];
     $total_timbre=$total_timbre+($donnee2['TIMBRE']* $somme_Qte);
     $date=$donnee2['date_facture'];
     $val=$donnee2['validete_de_loffre'];
     $adresse=$donnee2['adresse'];
     $tel=$donnee2['tele'];
     $total=$donnee2['montant'];
     $i=$i+1;   
   }
   
$cont=$i;
$req->closeCursor();


?>
<body>
<div id="body">
  <div id="header">
        <table id="fact">
<tr>
  <td class="col">
    facture proforma:<?php  echo $num ?>
  </td>

  
  
</tr>
<tr>
  <td class="col">
    Date:<?php  echo $date; ?>
  </td>
  
</tr>

<tr>
  <td class="col">
  validite de l'offre:<?php  echo'Au'.$val; ?>
  </td>
</tr>
</table>
<div class="rien">
 <table id="droite">
<tr>
  <td class="loc">
    Client:<?php  echo $nom; ?><br>
    Adresse:<?php  echo $adresse; ?><br>
      Tel:<?php  echo $tel; ?>
  </td>

  
  
</tr>
<tr>
  <td class="loc1">
    CONDITION DE VENTE:<?php  echo'TTC'; ?>
  </td>
</tr>
</table> 

</div>
<div id="body">
</div>
 
<br>
<!-- ******************************************************************************************** -->
<!-- ******************************************************************************************** -->
<!-- ******************************************************************************************** -->
<table width="676" height="300" id="item">
  <tr>
    <td width="57" class="titi">Item</td>
    <td width="350" class="titi">Designation</td>
    <td width="55" class="titi">Qté</td>
    <td width="120" class="titi">Prix unitaire HD/DA</td>
    <td width="120" class="titi">Montant HD/DA</td>
  </tr>

  <tr class="itembloc">

    <td class="itemtr">

    <?php 
     for ($j=1; $j <$cont+1 ; $j++) { 
       echo $j.'<br>';
     }
     ?>
    </td>
    <td class="itemdes">
<?php
for ($a=0; $a <$cont; $a++) { 


      echo'<p class="vehicule">'.$des[$a].'</p>
    <p class="couleur">couleur : '.$couleur[$a].'</p><br>';
    }
?>
  </td>
    <td class="itemtr">
     <?php 
     for ($e=0; $e <$cont ; $e++) { 
       echo $Qte[$e].'<br>';
     }
     ?>

     </td><!-- la quantite de l'item -->
    <td class="itemtr">
   <?php 
     for ($r=0; $r <$cont ; $r++) { 
       echo  $prix[$r].'<br>';
     }
     ?>
    </td>
    <td class="itemtr">
       <?php 
     for ($r=0; $r <1 ; $r++) { 
       echo $prix_selon[$r].'<br>';
     }
     ?>
     </td>
  </tr>
  <tr class="montant">
    <td rowspan="3">&nbsp;</td>
    <td rowspan="3"><p id="montantenchiffre"><U>ARREIER LE BON DE COMMANDE A LA SOMME:</U></p> </td>
    <td colspan="2" class="prix">TOTAL HT</td>
    <td>&nbsp;<?php echo $total;?></td>
  </tr>
  <tr>
    <td colspan="2" class="prix">TVA 17%</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="prix" >TOTAL TTC</td>
    <td>&nbsp;<?php echo $total;?></td>
  </tr>
  <tr>
    <td rowspan="5">&nbsp;</td>
    <td rowspan="5">
        <P id="condition">Nos prix sont calculés sur la base des taxes  
          acteullement vigeur<br> ,en cas de variation en plus ou en moins
           de ces taux nos prixseront<br> revues en baisse ou en hausse le 
           jour de dedouannement 

        </p>

    </td>
    <td colspan="2" class="prix">TIMBRE</td>
    <td>&nbsp;<?php echo $total_timbre; ?></td>
  </tr>
  <tr>
    <td colspan="2" class="prix">NET A PAYER TTC</td>
    <td>&nbsp;<?php echo '';?></td>
  </tr>
  <tr>
    <td colspan="2" class="">VERSEMENT</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="prix">RESTE A PAYER</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" >&nbsp;</td>
  </tr>
</table> 
</div>
<div id="footer">
    <table width="600">
      <tr>
        <td id="fingauche">R.C N°99-B-0010908
        </td>
        <td id="findroite"> ID N° 099216019484509
        </td>
      </tr>
      
    </table>
  </div>

 




<a href="../commercial/proformat.php" class="btn" ><p id="retour">retour</p></a>
</div>
<script type="text/javascript">window.print();</script>
</body>
</html>
