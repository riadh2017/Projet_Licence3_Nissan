
var val = document.getElementById('ajt');
var r=1;
val.addEventListener('click', function() {
var span = document.getElementById('div');
var span2 = span.cloneNode(true);
r++;

span.parentNode.appendChild(span2);},false);


var val = document.getElementById('sup');
val.addEventListener('click',function(){


var queryAll8 = document.querySelectorAll('#top #div  #val1');
var l8=queryAll8.length;
if(l8!=1){
 if(r >= 0){
var element = document.getElementById('top');

element.removeChild(element.firstChild);
r=r-1;

} } },false);


var element1 = document.getElementById('btn-save-com');
element1.addEventListener('click',function(){
var queryAll = document.querySelectorAll('#top #div  #val1');
var queryAll1 = document.querySelectorAll('#top #div  #couleur-com');
var queryAll2 = document.querySelectorAll('#top #div  #qauntite-com');
var l = queryAll.length;
var k=1;
while(k<l){
queryAll[k].name = "designe"+k+"";
k++;
}
var l1 = queryAll1.length;
var k1=1;
while(k1<l1){
queryAll1[k1].name = "couleur"+k1+"";
k1++;
}
var l2 = queryAll2.length;
var k2=1;
while(k2<l2){
queryAll2[k2].name = "quantite"+k2+"";
k2++;
}




},true);

