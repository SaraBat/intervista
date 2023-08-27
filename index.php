<?php 
	include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css" /> 
    <script src="jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function() {
          $("#movieList").hide();
          $('[data-search]').on('keyup', function() {
	          var searchVal = $(this).val();
	        if ( searchVal != '' ) {
            $.ajax({
                    url:'search.php',
                    method:'POST',
                    data:{
                      searchVal:searchVal
                    },
                   success:function(response){
                    try {
                    console.log(response);
                    var data = JSON.parse(response);
                    console.log(data);
                    $('#movieList').empty();
                    data.forEach(function(item) {
                                $('#movieList').append($('<li>', {
                                    value: item.titolo,
                                    text: item.titolo
                                }));
                            });
                      $("#movieList").show();
                          } catch (error) {
                            console.error('Error parsing JSON:', error);
                        }
                   }
                });
	        } else {
            $('#movieList').empty();
	}
});
        });
    </script>
</head>
<body>
<div id="bubbles"></div>
<div id="shark">
  <div class="shark-body"></div>
  <div class="shark-eye"></div>
  <div class="aleta"></div>
  <div class="tail"></div>
  <div class="fin"></div>
  <div class="gill gill-1"></div>
  <div class="gill gill-2"></div>
  <div class="gill gill-3"></div>
</div>
  <div class="container">
    <h1> Shark Film Wiki </h1>
    <form>
     <input id="input" data-search type="text" placeholder="trova film" />
    </form>
    <ul id="movieList">
      <li> </li>
    </ul>
  </div>
</body>
</html>

