<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>


<body>

<h2 id='title-h2'>The XMLHttpRequest Object Test </h2>

<p id="test">AJAX will change this text.</p>

<button class="panel-button" text-id='text1' id="but1" type="button">Button 1</button>
<button class="panel-button" text-id='text2' id="but2" type="button">Button 2</button>
<button class="panel-button" text-id='text3' id="but3" type="button">Button 3</button>
<button class="panel-button" text-id='text4' id="but4" type="button">Button 4</button>

<p id="text1">1 TEXT 1 </p>
<p id="text2">2 TEXT 2 </p>
<p id="text3">3 TEXT 3 </p>
<p id="text4">4 TEXT 4 </p>


</br>

<ul>
  <li> First </li>
  <li> second </li>
  <li> third </li>
  <li> 
    <ul>
      <li> 4.1 </li>
      <li> 4.2 </li>
      <li> 4.3 </li>
    </ul>
  </li>
</ul>
<!-- <script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "https://www.w3.org/TR/PNG/iso_8859-1.txt", true);
  xhttp.send();
}
</script> -->

<script>

  $(function() {

    
    $('li').on('click', function() {
      $(this).siblings().toggle();
    });







    var content = "My new Content";
    $('.panel-button').on('click', function(){

      var panelId = $(this).attr('text-id');

        $(document).ready(function(){
        $('#'+panelId).text(content);
        });
    
    });
  });

  </script>

</body>
</html>
