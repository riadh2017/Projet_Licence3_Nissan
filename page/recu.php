<html>
<head>
	<link href="css.css" rel="stylesheet" type="text/css"  media="print"/>

</head>
<style>

h2
{
	text-align: center;
}
#date
{
	text-align: right;
}
#mark1,#mark2
{
	display: inline-block;
}
a 
{
	display: block;
}
#mark2
{
	text-align: right;
}
.btn
{
	width:200px;
	height: 35px;
}
#retour
{
	width: 200px;
	height: 30px;
	padding-top: 7px;
	background: red;
	border: 1px solid black;

}
.lien
{
	text-decoration: none;
	color: white;
	text-align: center;


}
*
{
	color: red;
}
</style>
<body>


<h2>RECU DE VERSMENT</h2>


<p id="date">AKBOU le </p>

<P id="text1">
Nous soussignons <strong>SARL DJUDJURA MOTORS</strong> agent agree <strong>NISSAN ALGERIE</strong><br>
Avoir recu de :<br><br>
Mr: <br>
Adresse: <br>
Tel: 
</p>
<div id="apres">
<table>
<tr>
  <td id="case1">LA SOMME :
  </td>
  <td  class="montant">
    
  </td>
</tr>
<tr>
  <td class="somme">Versement :
  </td>
  <td  class="montant">
   
  </td>
</tr><tr>
  <td class="somme">Reste a payer:
  </td>
  <td  class="montant">
  
  </td>
</tr>
</table>
<u>repésentant</u><br><br>
<table>
      <tr>
  <td class="veh">type  de vehicule
  </td>
<b>  <td  class="veh" height="45">
    
  </td></b>
</tr>
  <tr>
  <td class="veh" height="45" width="12">couleur:
  </td>
<b>  <td  class="veh">
 
  </td></b>
</tr>


</table>
  <br><br><br>
<p id="mark1">
	CLIENT
         </p>

          <p id="mark2">
 SERVICE COMMERCIAL
          </p>
          
  

<a href="" class="lien"><p id="retour">retour</p></a>
<input  type="button" onclick="window.print();" class="btn" value="imprime"/>
</div>
</body>
</html>
