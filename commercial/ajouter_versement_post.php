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
<title></title>
<link href="style1.css" rel="stylesheet" type="text/css"/>
<link href="style-menu.css" rel="stylesheet" type="text/css" />


</head>
<style>

#select-client-recu
{
  width: 200px;
  border: 1px solid red;
}
#right

{
  padding-top: 30px;
}
a{

text-decoration: none;


  }
#salim{

width: 180px;
font-size: 1.1em;
height: 16px;
color: white;
padding-bottom: 15px;
background: rgb(183,15,23);
border-radius: 3px;
text-align: center;
padding-top: 10px;
margin-left: 10px;
font-weight: lighter;
}
#salim:hover
{

background-color: rgb(238,34,45);

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
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  id="versement"href="versement.php">recu de versemet</a></li>
			<li><a  href="suiver_des_client.php">suiver des client</a></li>
      <li><a  href="mode_de_vente.php">mode de vente </a></li>
      
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>
	<div id="section">
	<div id="left">
	 <ul id="liste_option">
      <div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="versement-ajouter.php" >ajouter</a> </li></div>
      <div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="versement-modifier.php">modifier</a></li></div>
      <div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="versement-supprimer.php"> supprimer</a></li></div>
      </ul>
    <p id="information">  
        SARL DJURDJURA MOTORS 
        Agent Agrée NISSAN ALGERIE 
          Service Commercial<br>
        Tel/fax: 034 34 72 16<br>
        Mob:05 52 27 45 95</p>
    
			</div>
			<div id="right">
			
	
			 	<form action="ajouter_versement_post_etablire.php" method="POST">
    <div id="client-recu">
                          <?php


if(isset($_POST['etablire']))
{
if($_POST['rest_a_payer']==0)
{

header('location:versement.php?erreur=1');

}else
{

?>                           
                           
                       <label for="client-recu" class="text-recu">client</label>  
                       <?php $nom=$_POST['nom'];
                        $id_command=$_POST['id_command'];
                        $rest_a_payer_command=$_POST['rest_a_payer'];
                      
              
                       ?>
                        <input class="select-client-recu" name="clien" value="<?php echo $nom;?>" disabled/>
                           <input type="hidden" name="id_command" value="<?php echo$id_command?>"/>
                           <input type="hidden" name="rest_a_payer_command" value="<?php echo$rest_a_payer_command; ?>" />
                          

                              <label for="adresse-recu" class="text-recu">date de recu</label><input type="date" class="select-client-recu" name="date_recue"  required/>
                                
                      <label for="versement-recu" class="text-recu">Versement</label><input type="number" class="select-client-recu" name="versement1" value="" required/>
                               
              
                           <input type="submit"  name="verser" value="Envoyer" id="btn-save-recu">
                                	<input type="reset" value="Annuler" id="btn-del-recu">
                                   
                        <?php    }} ?> 

                         <?php 





                    if(isset($_GET['id_command'])and (isset($_GET['message'])))
                    {

                 

echo"<script>alert('versement effectuer avec succe');</script>";
                          
                        
            $id_command=$_GET['id_command'];
           

                  

                     echo'<a href="../page/recu_de_versement.php?&id_command='.$id_command.'" id="btn-del-com"><p id="salim">imprimer</p></a>';
                        } 
                        ?> 

              </form>
                                </div>    
     
            
			</div>
		</div>
	<div id="footer">
		<p id="right_footer">@copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p>
	</div>
	
     
</div>


 




</body>
 
</html>







