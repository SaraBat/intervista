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

                   }
                });
	        } else {
	}
});
        });
    </script>
</head>
<body>
  <div class="container">
    <form>
     <input data-search type="text" placeholder="type here" />
    </form>
    <ul id="movieList">
      <li> </li>
    </ul>
  </div>
</body>
</html>

