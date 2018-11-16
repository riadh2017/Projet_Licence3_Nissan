<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html >
<head>
<style type="text/css">
#resultat_item
{
  margin-top: 120px;
  margin-left: 130px;
 width: auto;
  height: auto;
  color: black;

  }
  #matri_chasis,#couleur123
  {
display: inline-block;
  }
  #matri_chasis
  {
    margin-top: 50px;
width:auto;
  }
#couleur123
{
vertical-align: top;
  margin-left: 200px;
  margin-top: 50px;
}
#chassis123
{
  vertical-align: top;
}

#chassis123,#matricule123
{
  display: inline-block;
 
}
#matricule123
{
  
}
a
{
  text-decoration: none;
}
#input1
{
  border-radius: 6px;
  width: 100px;
  background:url('header_bckg2.jpg') repeat;
  border: 2px solid transparent;
  color: white;
  text-align: center;
  font-size: 1.5em;
  margin-top: 150px;
  margin-left: 600px;
}
#input1:hover
{
  
   border: 2px solid transparent;
  color: red;
  text-align: center;
}
input
{
border-radius: 9px;
width: auto;
text-align: center;
font-weight: bold;

}

#body
{
  background: url('back.png') repeat;
}
span
{ 
  width: auto;
  font-size: 30px;
  border-radius: 6px;background:url('header_bckg2.jpg') repeat;
  border: 2px solid transparent;
  color: white;
  font-weight: bold;
  margin-left: 30px;
  margin-bottom: 2px;
}
strong{
font-size: 15px;
width: auto;
border-radius: 6px;
background:url('header_bckg2.jpg') repeat;
border: 2px solid transparent;
color: white;
margin-left:100px;
}

h1
{
   width: auto;
   background:url('header_bckg2.jpg') repeat;
   border: 2px solid transparent;
   color: white;
   border-radius: 12px;
  
   text-align: center;
   box-shadow: 2px 2px 2px 2px black;
}
  </style>

</head>

<body id="body">
<h1>La liste des matricules et chassis des items demander </h1>
<div id="resultat_item">

<div id="couleur123">
<?php
$id_command=$_GET['id_command'];

echo'<span>Model</span>'; echo'<strong>couleur</strong>';
  echo'<br>';

  try { $bdd = new pdo('mysql:host=localhost;dbname=nissan', 'root', ''); } catch (Exception $e) {die('Erreur : '.$e->getMessage());  }

$req=$bdd->query('select *  from  item  where   (item.id_command=\''.$id_command.'\') ');
      while(  $donne=$req->fetch()){

$i=1;       $designe=$donne['designation']; 
           $couleur=$donne['couleur'];
  $id_item=$donne['id_item'];
 while($i<=$donne['quantite']){

$req1=$bdd->query('select *  from  matricul_chassis  where   (matricul_chassis.id_item=\''.$id_item.'\') ');

$donnee=$req1->fetch();
      
      $chassis=$donnee['chassis'];

                  echo'<label for="modele-liv" class="text-eliv"></label>  
               <input type="text" id="model" name="model" value="'.$designe.'" disabled/>';

        echo'<label for="modele-liv" class="text-eliv"> </label> <input type="text" id="couleur" name="couleur" value="'.$couleur.'" disabled/>';
echo"<br>";
               echo'';
       $req1->closeCursor();

$i=$i+1;  }


}
$req->closeCursor();

 ?>
  </div>

   <?php
$i=0;

/*******************recuperer les id_item **********************/
$req1212=$bdd->query('select *  from  item  where   (item.id_command=\''.$id_command.'\') ');
      while(  $donne=$req1212->fetch()){

$tabl[$i]=$donne['id_item'];
$i=$i+1;
                           }


$l2=0;
$t=0;
while($t<$i){
$req=$bdd->query('select *  from  matricul_chassis  where   (matricul_chassis.id_item=\''.$tabl[$t].'\') ');
     
 while($dooo=$req->fetch()){

   $table_chassis[$l2]=$dooo['chassis'];
   $table_matricule[$l2]=$dooo['matricul'];
 $table_id[$l2]=$dooo['id'];
$l2=$l2+1;

     }
     $t=$t+1;
}?>
<div id="matri_chasis">
<div id="chassis123">
  <?php 
$m=0;echo"<span>chassis</span>";
echo"<br>";

while($m<$l2){
echo'  <label for="chassis-li1v" class="text-eliv" > </label><input type="text" value="'.$table_chassis[$m].'" id="chassis" name="chassis" disabled/>
';
$m=$m+1;
echo'<br>';
}?>
</div>
<div id="matricule123">

<?php

$m1=0;echo"<span>Matricule</span>";
echo"<br>";
while($m1<$l2){
echo'<label for="chassis-li1v" class="text-eliv" > </label><input type="text"  id="matricule" name="matricule" value="'.$table_matricule[$m1].'" disabled/>
';echo'<br>';
$m1=$m1+1;
}
?>
</div>

</div>
</div>
<a href="suiver_des_client.php"> <p id="input1"> RETOUR </p></a>
 

</body>
 
</html>
