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
<link href="style-passwordbloc.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="type/ico" href="images/parametre_icon.jpg">
<style type="text/css">
   select
   {

min-height: 30px;
min-width: 200px;
border-radius: 6px;
   }
   input
   {

min-height: 30px;
min-width: 200px;
border-radius: 9px;
   }
#save,#annuler
{
	background-color: rgb(183,15,23);
	color: white;
	border: 0px solid white;

}
#annuler
{
	margin-left: 80px;
}
#save
{
	margin-left: 150px;
}
#save:hover,#annuler:hover
{
	background-color: rgb(238,34,45);
}
#utilisateur
{
margin-left: 50px;
}

 	</style>


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
            <li><a  href="accuil.php">accueil</a></li>
            <li><a  href="commande.php">bon de commande </a></li>
            <li><a href="livraison.php">bon de livraison</a></li>
            <li><a  href="versement.php">reçu de versement</a></li>
			<li><a id="parametre" href="parametre.php">parametre</a></li>
			<li><a href="deconnexion.php">deconnexion</a></li>
                      </ul>
        </div> 
    </div>
	<div id="section">
			<div id="password">
			<p id="titrebloc"> <h1>Changer le mot de passe</h1></p>
			<form action="parametre.php" method="post">

				<?php   try {

                $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
  $req=$bdd->query('select *  from user where 1');



				            echo'    <p id="utilisateur">        Choisir l\'utilisateur   <select id="user" name="user">';

while(($donnee=$req->fetch()))
                       {
?>
  <option> <?php echo  $donnee['nom'].' '.$donnee['prenom'];?> </option>
 <?php }
$req->closeCursor();

 ?>
				</select></p>
			<div id="now"><label for="old">Actuel</label><input type="password" name="old" id="old"></div>
			<div id="saisir1"><label for="new<">Nouveau</label><input type="password" name="new" id="new"></div>
			<div id="saisir2"><label for="new1">Saisir à nouveau</label><input type="password" name="new1" id="new1"></div><br>
				<div ="annuler_confirmer"><input type="submit" name="valider" value="Enregister la modification" id="save"><input type="reset" value ="Annuler" name="old" id="annuler"></div>
</form>


 			</div>
	</div>
	<div id="footer"><p id="right_footer">@ copy right Equipe de soutenance  </p> <p id="left_footer">Nissan Djurdjura motors akbou   </p> </div>
	
     
</div>
<?php

if(isset($_POST['valider'])and ($_POST['valider']!= null)){
if((isset($_POST['user'])and ($_POST['user']!= null)) and (isset($_POST['old'])and ($_POST['old']!= null)) and (isset($_POST['new'])and ($_POST['new']!= null))
 and (isset($_POST['new1'])and ($_POST['new1']!= null) ) ){
	
	         try {

                $bdd1 = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }
                 
$parts = explode(' ', $_POST['user']);
$nom=$parts[0];
$prenom=$parts[1];
$req1=$bdd1->query('select * from user where ((user.nom=\'' . $nom . '\') and (user.prenom=\'' . $prenom . '\')) ');
if ($donnee=$req1->fetch()) 
  {
if($_POST['old']==$donnee['mot_de_passe']){

if ($_POST['new']==$_POST['new1']) {


$req2 = $bdd->prepare('UPDATE user SET mot_de_passe = :nvmode WHERE (user.nom = :nom1 AND user.prenom = :prenom1)');
$req2->execute(array(
'nvmode' => $_POST['new'],
'nom1' => $nom,
'prenom1' => $prenom
));
echo "<script>alert('mot de pass modifier avec succe');</script>";

$req2->closeCursor();
$req1->closeCursor();
}else{

echo "<script>alert('le mot de pas deferent');</script>";

}

}else{


 echo "<script>alert('le mot de pas incorect');</script> ";

}

}


}else{


  echo "<script>alert('rempliser les champs');</script>";


}}
?>
</body>
 
</html>
