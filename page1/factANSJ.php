<?php
	session_start();
   ob_start(); 
   
$id=$_GET['id'];
 try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');} catch (Exception $e) {die('Erreur : '.$e->getMessage()); }
  $req=$bdd->query('select *  from  facture_pro where id_facture='.$id.' ');
  $donnee=$req->fetch();
  $client=$donnee['id_client'];
$req->closeCursor();


   $req1=$bdd->query('select *  from  client where id_client='.$client.' ');
   $donnee1=$req1->fetch();

$req1->closeCursor();

   $req1=$bdd->query('select * from facture_pro,iteme_facture,modele_veh where (facture_pro.id_facture='.$id.' and iteme_facture.id_facture=facture_pro.id_facture and iteme_facture.id_modele_veh=modele_veh.id_modele_veh and modele_veh.designation=iteme_facture.designation)');
   
   $i=0;
   while ($donnee2=$req1->fetch()) {
     $des[$i]=$donnee2['designation'];
     $Qte[$i]=$donnee2['quantite'];
     $couleur[$i]=$donnee2['couleur'];
     $prix[$i]=$donnee2['HT_HDD'];
     $montant[$i]=$donnee2['HT_HDD']*$donnee2['quantite'];
     $timbre=$donnee2['TIMBRE'].
     $i=$i+1;   
   }
   $req1->closeCursor();
$cont=$i;


 





?>


<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="8mm" >
<div id="header">
  
<table id="fact">
<tr>
  <td class="col">
    facture proforma:<?php  echo $donnee['numero_fact']; ?>
  </td>

  
  
</tr>
<tr>
  <td class="col">
    Date:<?php  echo $donnee['date_facture']; ?>
  </td>
  
</tr>

<tr>
  <td class="col">
  validite de l'offre:<?php echo 'AU '.$donnee['validete_de_loffre']; ?>
  </td>
</tr>
</table>
 <table id="droite">
<tr>
  <td class="loc">
    Client:<?php  echo $donnee1['nom']; ?><br>
    Adresse:<?php  echo $donnee1['adresse']; ?><br>
      Tel:<?php  echo $donnee1['tele']; ?>
  </td>

  
  
</tr>
<tr>
  <td class="loc1">
    CONDITION DE VENTE  :   ANSEJ
  </td>
</tr>
</table>


</div>
<div id="body">
<br>
<!-- ******************************************************************************************** -->
<!-- ******************************************************************************************** -->
<!-- ******************************************************************************************** -->
<table width="680" height="476" id="item">
  <tr>
    <td width="57">Item</td>
    <td width="325">Designation</td>
    <td width="55">Qté</td>
    <td width="120">Prix unitaire HD/DA</td>
    <td width="120">Montant HD/DA</td>
  </tr>

  <tr class="itembloc">

    <td class="itemtr">

     <?php 
    
for ($a=1; $a <$cont+1 ; $a++) { 
 echo $a;echo '<br>';
}
    
     ?>
    </td>
    <td class="itemdes">
<?php
for ($b=0; $b <$cont ; $b++) { 


      echo'<p class="vehicule">'.$des[$b].'</p>
    <p class="couleur">couleur : '.$couleur[$b].'</p><br>';
    }

?>
  </td>
    <td class="itemtr"><?php 

     for ($c=0; $c <$cont ; $c++) { 
       echo $Qte[$c].'<br>';
     }
     ?></td><!-- la quantite de l'item -->
    <td class="itemtr"><?php 
     for ($z=0; $z <$cont ; $z++) { 
       echo $prix[$z].'<br>';
     }
     ?></td>
    <td class="itemtr"><?php 
     for ($h=0; $h <$cont ; $h++) { 
       echo $montant[$h].'<br>';
     }
     ?></td>
  </tr>
  <tr class="montant">
    <td rowspan="3">&nbsp;</td>
    <td rowspan="3"><p id="montantenchiffre"><U>ARREIER LE BON DE COMMANDE A LA SOMME:</U></p> </td>
    <td colspan="2" class="prix">TOTAL HT</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="prix">TVA 17% non incluse</td>
    <td>&nbsp;</td> 
  </tr>
  <tr>
    <td colspan="2" class="prix" >TOTAL   ANSEJ/CNAC</td>
    <td>&nbsp;<?php echo $donnee['montant'];  ?></td>
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
    <td>&nbsp;<?php echo $timbre;  ?></td>
  </tr>
  <tr>
    <td colspan="2" class="prix">NET A PAYER ANSEJ/CNAC</td>
    <td><?php echo $donnee['montant'];  ?></td>
  </tr>
  <tr>
    <td colspan="2" class="prix">VERSEMENT</td>
    <td>&nbsp;0</td>
  </tr>
  <tr>
    <td colspan="2" class="prix">RESTE A PAYER</td>
    <td>&nbsp;0</td>
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



</page>
<style type="text/css">
#header
{
margin-bottom: -50px;
}
#droite
{
  position: absolute;
  left: 300px;
  top: 95px;
}

.loc
{
  border: 3px solid black;
  border-radius: 6px;
  width:380;
  height: 40px;

}
#fact td
{
  border: 3px solid black;
  border-radius: 6px;
  width:200;
}
.col
{
  height: 20px;
}


#fingauche
{
  margin-top: 0px;
  padding-left: 180px;
  font-size: 12;
}
#findroite
{
  padding-left: 150px;
  font-size: 12;
}
#condition
{
  font-size: 10;
  line-height: 20px;
  margin-left: 3px;
}
#montantenchiffre
{
  margin:0px;
  font-size: 9;

}
.prix
{
  font-size: 12;
  font-weight: bold;

}
.itemdes
{
  text-align: center;
  font-size: 1.5em;
  line-height: 0px;
}
.montant
{
  border-top: 1px solid black;
}
.itemtr
{
  text-align: center;
  font-size: 1.3em;
  line-height: 45px;
}
.itemdes .couleur
{
  text-align: left;
  margin-left: 65px;
  margin-bottom: 28px;

}
.itemdes .vehicule
{
  text-decoration: underline;
  font-size: 15px;
  font-weight: bold;
  line-height: 0px;
  margin-bottom: 4px;
  margin-top: 0px;
  

}

#item
{
  border-collapse: collapse;
}
#item td
{
  border: 1px solid black;
  font-family: Times ,sans-serif;
  padding: 0px;
}

}
.ligne3 p
{font-size: 13px;

  line-height: 0px;
  margin-bottom: 6px;
  margin-top: 6px;
  font-weight: bold;

}
.ligne3,.ligne31
{
  border: 1px solid solid;
  border-radius: 15px;
  padding:4px; 
  padding-top: 0px;
}
.ligne31
{
  text-align: center;
  padding-top: 15px;
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



