<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="print.css" type="text/css" media="print" />
<title>Document sans titre</title>

<body>


<script>
function takfa(ta){
	
if(confirm("voulez vous imprimer   "+ta+"  ")){	


window.location.href=("supprimer.php?takfa="+ta);
imprimer_page(ta);


}else{
		
			window.location.href=("test.php");
			}
}
	

</script>


<form>
<?php

 echo' <input id="impression" name="impression" type="button" onmouseover="imprimer_page()" value="Imprimer cette page" />
';?>
</form>


<script type="text/javascript">
function imprimer_page(k){
	window.location.href=("print.php?id="+k);
 
}
</script>
<?php
$id=10;
$i=0;
echo'<form action="#" method="post">';
if(isset($_GET['message2'])){
echo'<input value="'.$_GET['message2'].'" id="takfa1"/>';
echo'<br>';}

while($i<$id){
echo'<input type="submit" href="#" value="'.$i.'"  id="kenza" onmouseover="takfa('.$i.');"/>';

echo'<br>';
$i=$i+1;
}
 if(isset($_GET['message']))
{
	if($_GET['message']==1)
	{
		if(isset($_GET['message2'])){
		$sup=$_GET['message2'];
		echo'<script>
	    var l=document.getElementById("takfa1");
		l.className = "blue";
		</script>';
		
		}}
	}

echo'</form>';
?>

<style>
.blue{
	text-align:center;
	padding:inherit;
	position:absolute;
	margin-top:150px;
	margin-left:150px;
	margin-bottom:60px;
	width:50px;
	height:30px;
	font-size:24px;
	display:inline-block;
	vertical-align:top;
	margin-bottom:10px;
	color:red;
	animation:cubic-bezier(100,20,80,00);
	background-color:white;
	border-radius:9px;
	border:outset #606;
	background-color:#606;
	color:white;}
.blue:hover{
	background-color: white;
	color:#606;}

</style>

</body>
</html>