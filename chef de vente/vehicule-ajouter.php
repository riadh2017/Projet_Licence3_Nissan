<?php
session_start();
if (!isset($_SESSION['role']) and $_SESSION['role']==null) {
 header('location:../Login.php');
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
<link href="style1.css" rel="stylesheet" type="text/css" />
<link href="style-menu.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/parametre_icon.jpg">

</head>
<body id="page_vehicule">
	

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
            <li><a  href="../accuil-chef.php">accueil</a></li>
           <li><a  href="proformat.php">F.proformat</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a  href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">recu de versemet</a></li>
			<li><a   href="suiver_des_client.php">suivi des client</a></li>
			<li><a   href="client.php">client</a></li>
			<li><a   id="proformat" href="vehicule.php">M.vehicule</a></li>
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div>  
    </div>
	<div id="section">

		
			<div id="left">
	
		<ul id="liste_option">
			<div class="lien"><img src="images/icon_add.png" id="icon_add"/><li id="ajouter"><a href="vehicule-ajouter.php" >ajouter</a> </li></div>
			<div class="lien"><img src="images/icon_edit.png" id="icon_edit"><li id="modifier"><a href="vehicule-modifier.php">modifier</a></li></div>
			<div class="lien"><img src="images/icon_del.png" id="icon_del"><li id="supprimer"><a href="vehicule-supprimer.php"> supprimer</a></li></div>
			</ul>
		<p id="information">  
				SARL DJURDJURA MOTORS 
				Agent Agrée NISSAN ALGERIE 
				  Service Commercial<br>
				Tel/fax: 034 34 72 16<br>
				Mob:05 52 27 45 95</p>




				<style type="text/css">
#section_saisie-model
{
	color: white;
}
				</style>	
		</div>
		<div id="right">
			<div id="section_saisie-model">
				<form method="post" action="vehicule-ajouter-post.php">
			   				<div id="modele">
                                                     <h1>modele de vehicule</h1>
						   <label class="text-att">designation</label> <input type="text" name="modele" class="des" required/>   
							<label class="text-att">montant  de la remise</label><input type="text" name="remise" class="des"  required/>
							<label class="text-att">HT HDD</label><input type="text" name="hdd" class="des"  required/>
							<label class="text-att">TCC</label><input type="text" name="tcc" class="des"  required/>
							<label class="text-att">HT DDM </label><input type="text" name="dmm" class="des"  required/>
							<label class="text-att">Timbre</label><input type="text" name="timbre" class="des"  required/>
							<p id="msg"><p>
						</div>
							<div id="color_qt">
								<h1>coulour et quatité</h1>
						 <div id="btn_color">
                        <input type="button" value="ajouter" id="ajt" class="color">
                        <input type="button" value="supprimer" id="sup" class="color" >
						
						</div>

                                
								<div id="top">
                                            <div id="div">
                                              	
                                               <label for="qauntite" class="text-commande-align">quantite</label> <input id="qauntite-com" type="number" name="quantite" min="1" required/>
                                               <label for="couleur" class="text-commande-align">couleur </label><input  id="couleur-com" name="couleur" type="text" required/>
																								   
                                            </div>
                                </div>
								
							</div>
		       
							
						 <div id="btn-modele">
                        <input type="submit" value="Enregistrer" name="valider" id="btn-save-com">
                        <input type="reset" value="annuler"  id="btn-del-att" >
						
						</div>
						<style type="text/css">
							#btn-modele,#color_qt,#modele
							{
								display: inline-block;
								vertical-align: top;
								color:black;
							}
							#btn-save-com
							{
								margin-left: 16px;
							}
							#modele input,#couleur-com
							{
								width: 200px;
								height: 30px;
								border-radius: 5px;

							}#btn-modele
							{
								margin-top: 15%;
								margin-left: 5%;

							}

						</style>

		</form>
		
			</div>

		</div>
		</div>


			<div id="footer">
		<p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> 
	</div>
<?php
			if(isset($_GET['message']))
				if($_GET['message']=='1') {
					
						echo"<script>alert('le modele de vehicule existe deja');</script>";
						
							}

			?>

<script >
var val = document.getElementById('ajt');
var r=1;
val.addEventListener('click', function() {
var span = document.getElementById('div');
var span2 = span.cloneNode(true);
r++;

span.parentNode.appendChild(span2);},false);

var val = document.getElementById('sup');
val.addEventListener('click',function(){
 if(r >= 0){
var element = document.getElementById('top');

element.removeChild(element.firstChild);
r=r-1;
} },false);

var element1 = document.getElementById('btn-save-com');
element1.addEventListener('click',function(){
var queryAll1 = document.querySelectorAll('#top #div  #couleur-com');
var queryAll2 = document.querySelectorAll('#top #div  #qauntite-com');
var l = queryAll1.length;
var l1 = queryAll2.length;
var k1=1;
while(k1<l){
queryAll1[k1].name = "couleur"+k1+"";
k1++;
}
var l2 = queryAll2.length;
var k2=1;
while(k2<l1){
queryAll2[k2].name = "quantite"+k2+"";
k2++;
}
var m=0;
while(m<l){

m++;
}},true);
</script>

</body>
 
 
</html>
