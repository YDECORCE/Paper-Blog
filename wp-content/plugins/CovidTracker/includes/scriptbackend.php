<?php
// liste_déroulante("'DEP%'");
?>
<script >

var menushortcode=document.getElementById("shortcode");
var result=document.getElementById("result");
function selectshortcode(){
var choix=menushortcode.value;
switch (choix){
    case '':
        result.innerHTML="<p>veuillez faire votre choix</p>";
        break;
    case 'departements':
        result.innerHTML="<p>[departements]</p>";
        break;    
    case 'regions':
        result.innerHTML="<p>[region]</p>";
        break;
    case 'onedepartement':
         result.innerHTML="<p>[zone s='nom du Département choisi']</p>";
        break;      
    case 'oneregion':
        result.innerHTML="<p>[zone s='nom de la Région choisie]</p>";
        break;
    case 'searchbydepartement':
        result.innerHTML="<p>[covidsearch s='departement']</p>";
        break;
    case 'searchbyregion':
        result.innerHTML="<p>[covidsearch s='region']</p>";
        break; 
    default:  
        result.innerHTML="";       
}
}
window.setInterval(selectshortcode,100);
</script> 

<style>
body{
    background-color:white;
}
</style>