https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js
$(document).ready(function(){
  $("#cercleUn").click(function(){
    $("#vinDegustation").slideToggle(1000);
  });

  $("#cercleDeux").click(function(){
    $("#vinCepage").slideToggle(1000);
  });

  $("#cercleTrois").click(function(){
    $("#vinVins").slideToggle(1000);
  });

  $("#cercleQuatre").click(function(){
    $("#vinAccords").slideToggle(1000);
  });
});