<?php
	
   ob_start(); 
   

$mode=$_GET['mode'];
?>
<page backtop="35mm" backleft="20mm" backright="20mm" backbottom="20mm" >



<?php           

try {$bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');  } catch (Exception $e) {die('Erreur : '.$e->getMessage()); }
$req=$bdd->query('select * from mode_de_vente where mode_de_vente.mode=\''.$mode.'\' ');
$donne=$req->fetch();

$mode=$donne['mode'];

if($mode=='TTC'){$mode=$mode.' PARTICULIER';}
if($mode=='CNAC'){$mode='ANSEJ '.$mode;}
if($mode=='ANSEJ'){$mode=$mode.' CNAC';}
$i=0;
 $mode_de_paiement = explode("\n", $donne['mode_de_paiement']);
$obligatoir=explode("\n", $donne['documents_obligatoires']);

?>
<div id="vente"><h2 >VENTE <?php   echo $mode;?></h2></div>




<b>Montant Minimum </b><br> 
<div id="a"><?php echo $donne['montant_min']; ?></div>
<br>
<b>Mode de payement Autorise</b><br> 
<div id="b"><?php foreach ($mode_de_paiement as $key) {
 
 echo $key.'<br>';

}?></div><br>

<b>Documents obligatoire</b> <br><div id="c"> <?php foreach ($obligatoir as $key1) {
 
 echo $key1.'<br>';

}?></div>

<style type="text/css">
#vente{
    margin-left: 150px;
text-decoration: underline;
}
#a{margin-bottom: 10px;margin-top: 5px;}
#b{margin-bottom: 10px;margin-top: 5px;}
#c{margin-top: 15px; margin-top: 5px}



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




