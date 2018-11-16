var element4 = document.getElementById('btn-save-liv');
element4.addEventListener('click',function(){
var queryAll = document.querySelectorAll('#resultat  #model');
var l = queryAll.length;
var k=1;
while(k<l){
queryAll[k].name = "model"+k+"";
k++;

var m=0;
while(m<l){
alert(queryAll[m].name);
m++;
}}},false);
