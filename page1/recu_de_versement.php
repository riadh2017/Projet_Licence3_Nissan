<?php
	
   ob_start(); 
   

$id_command=$_GET['id_command'];
?>
<page backtop="35mm" backleft="20mm" backright="20mm" backbottom="20mm" >

<h2>RECU DE VERSMENT</h2>

<?php           

try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }
$req=$bdd->query('select * from command,client,item,recu_verssement where(command.id_command='.$id_command.' and command.id_client=client.id_client and item.id_command='.$id_command.' and recu_verssement.id_command='.$id_command.')');
$donne=$req->fetch();



?>
<p id="date">AKBOU le <?php   echo $donne['date_de_verssement'];?></p>

<P id="text1">
Nous soussignons <strong>SARL DJUDJURA MOTORS</strong> agent agreé <strong>NISSAN ALGERIE</strong><br>
Avoir recu de :<br><br>
<?php           


?>

Mr: <?php echo $donne['nom'];; ?><br>
Adresse: <?php echo $donne['adresse'];;?><br>
Tel: <?php echo$donne['tele'];;?>
</p>
<table>
<tr>
  <td id="case1">LA SOMME :
  </td>
  <td  class="montant">
    <?php echo $donne['montat'];;?>
  </td>
</tr>
<tr>
  <td class="somme">Versement :
  </td>
  <td  class="montant">
    <?php echo $donne['versement'];;?>
  </td>
</tr><tr>
  <td class="somme">Reste a payer:
  </td>
  <td  class="montant">
    <?php echo $donne['rest_payer'];;?>
  </td>
</tr>
</table>
<u>Repésentant</u><br><br>
<table>
      <tr>
  <td class="veh">Type de véhicule:
  </td>
<b>  <td  class="veh" height="45">
    <?php echo $donne['designation'];;?>
  </td></b>
</tr>
  <tr>
  <td class="veh" height="45" width="12">couleur:
  </td>
<b>  <td  class="veh">
    <?php echo $donne['couleur'];;?>
  </td></b>
</tr>


</table>
  <br><br><br>
<table id="footer" >
          <tr>
    <td id="client" width="450">CLIENT
      </td>
        <td id="service">
          SERVICE COMMERCIAL
          </td>
  </tr>

</table>
<style type="text/css">
#impression
{
  display: none;
}
#client
{
  margin-left: 8px;
}
#footer
{
  width: 100%;
}
u
{
  font-size: 13;
}
.somme
{
  height:45px;
  padding-left: 10px;
}
.montant
{
  font-size: 14;
  font-weight: bold;
}

#case1
{
  font-size: 16;
  text-decoration: underline;
  height: 45px;
}
#text1
{
  font-size: 15;
  line-height: 20px;

}
h2
{
  font-size: 18px;
  text-decoration: underline;
  text-align: center;
}
#date
{
  text-align: right;
  font-size: 14;
}

</style>





</page>
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




