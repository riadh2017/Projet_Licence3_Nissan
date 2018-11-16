<?php 

echo $_GET['takfa'];
$takfa=$_GET['takfa'];
header('Location:test.php?message=1&message2='.$takfa.'');


?>