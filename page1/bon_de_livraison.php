<?php
	session_start();
   ob_start(); 
   


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
  objet du bon de commande ( <?php echo'00000';  ?> ) et repondant aux caractéristrique  ci-dessous</p>
<br>

<h4>1-CLIENT</h4>
<table id="client">
        <tr>
          <td class="col1">
            NOM-PRENOM/RAISON SOCIALE:
          </td>
          <td class="col2">
            <?php echo'messaoudi brahim';?>
          </td>
        </tr>

        <tr>
           <td class="col1">ADRESSE/SIEGE SOCIAL:
          </td>
          <td class="col2">
             <?php echo'akbou w.bejaia';?>
          </td>
        </tr>
        <tr>
           <td class="col1">
            TEL/FAX:
          </td>
          <td class="col2">
             <?php echo'05 55 55 55';?>
          </td>

        </tr>
        <tr>
           <td class="col1">
            CODE CLIENT:
          </td>
          <td class="col2">
             <?php echo'ADC245';?>
          </td>
        </tr>
</table><!--fin de tableau client -->

<br>
<h4>2-VEHICULES</h4>

<table id="veh">
  <tr>
    <td class="col1">
      MODEL:
    </td>
    <td class="col2">
      <?php echo'pathfinder ';?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      COULEUR:
    </td>
    <td class="col2">
      <?php echo'gris argent ';?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      N° CHASSIS :
    </td>
    <td class="col2">
<?php echo'ergdsf6871681 98';?>
    </td>
  </tr>
  <tr>
    <td class="col1">
      MATRICULE N°:
    </td>
    <td class="col2">
     <?php echo'123456789-06';?>
    </td>
  </tr>
  <tr>
    <td class="ligne5" colspan="2">
SANS DOSSIER DEFFINITIF
    </td>
  </tr>
  </table>
  <br>
  <h4>3-VISA</h4>

  <div id="gauche">
    <p><h5><u>Pour DJURDJURA  MOTORS SARL</u></h5></p>
    <p>Nom:  <?php echo'brahim meessaoufdi';?></p>
    <p>Date:  <?php echo'44/44/44444';?></p>
  </div>

  <div id="droite">
    <p><h5><u>Pour Le Client </u></h5></p>
    <p>Nom:  <?php echo'brahim meessaoufdi';?></p>
    <p>N° C.I.N/PC :<?php echo'4444444';?></p>
      <p>Delivré :<?php echo'44/44/44444';?></p>
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



