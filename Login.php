<?php
session_start();

			if(!isset($_SESSION['nom']) and !isset($_SESSION['id']))
			{

echo '<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />
<link rel="icon" type="type/ico" href="icon_login.jpg" />

  <title>Login</title> 


</head>

<body>
		<div class="login">
						<h1 id="tak">Login</h1>
					    <form action="Login.php" method="post">
					    	<input type="text"  name="u" id="tak1" placeholder="Username"  autofocus autocomplete="off"/>
					        <input type="password" name="p" placeholder="Password"  />
					        <input type="submit" class="btn btn-primary btn-block btn-large"  value="connecter" name="connecter"/>
					    </form>
					    <p id="msg"></p>
    	</div>';
    	if(isset($_POST['connecter']))
					{

						try{$bdd=new pdo('mysql:host=localhost;dbname=nissan','root','');}catch(exception $e){	die('erreur:'.$e->gestMessge());}

						if(isset($_POST['u']) && $_POST['u']!=null && isset($_POST['p']) && $_POST['p']!=null) {
							$bool=0;
							$req= $bdd->query('SELECT * FROM user ');
								while ($donne=$req->fetch())
									{ 
										if($_POST['u']==$donne['login'] and $_POST['p']==$donne['mot_de_passe'])
											{
											$_SESSION['id']= $donne['id_user'];
											$_SESSION['nom']=$donne['nom'].$donne['prenom'];
											$_SESSION['role']= $donne['role'];
											$bool=1;
										}
									}
									if ($bool==1) {
                                  switch ($_SESSION['role']) {
                                  	case 'gerant':
                                  		header('location:page de gerant/accuil.php');

                                  		break;
                                  	case 'commercial':
                                  		header('location:accuil-commercial.php?');

                                  		break;
                                  	case 'chef de vente':

                                  		header('location:accuil-chef.php?');
                                  		break;
                                  }



									
										
									}else
									{
										echo '<script>
                                    alert("login ou mot de passe incorrect");

                                       </script>';
									}


							}else
							{
							echo '<script>
                                      alert("donnes incomplete");

                                       </script>';/*donnes incomplete*/
						}
						}
					}else{
switch ($_SESSION['role']) {
                                  	case 'gerant':
                                  		
                                  		header('location:page-de-gerant/accuil.php');
                                  		break;
                                  	case 'commercial':
                                  		header('location:accuil-commercial.php');

                                  		break;
                                  	case 'chef de vente':

                                  		header('location:accuil-chef.php');
                                  		break;
                                  }


					}









echo '</body></html>';
?>

<style type="text/css">
body
{
	color :white;
}
#msg
{
	text-align: center;
	color: rgb(238,34,45);
}
#msg:hover
{
	text-decoration: underline;
}
</style>