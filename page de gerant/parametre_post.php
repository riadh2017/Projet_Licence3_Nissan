<?php
if(isset($_POST['user']) and isset($_POST['old']) and isset($_POST['new']) and isset($_POST['new1']) and isset($_POST['valider'])){
	
	         try {

                $bdd1 = new pdo('mysql:host=localhost;dbname=nissan', 'root', '');	

                 } 
           catch (Exception $e) {

           die('Erreur : '.$e->getMessage());	
 
                 }

$parts = explode(' ', $_POST['user']);
$nom=$parts[0];
$prenom=$parts[1];
$req1=$bdd1->query('select * from user where user.nom=\'' . $nom . '\' and user.prenom=\'' . $prenom . '\' ');
if ($donnee=$req1->fetch()) 
  {
if($_POST['old']==$donnee['mot_de_passe']){

if ($_POST['new']==$_POST['new1']) {

$req2=$bdd1->prepare('UPDATE user SET mot_de_passe= : nvmot where nom:= nom and prenom:=prenom ');

$req2->execute(array( 
	'nvmot'=> $_POST['new1'],
	'nom' => $nom,
	'prenom'=>$prenom
));
}else{

echo "<script>alert('le mot de pas deferent');</script>";

}

}else{


 echo "<script>alert('mot de pass incorect ');</script>";

}

}


}else{


  echo "<script>alert('remplissr les champs');</script>";


}






































?>