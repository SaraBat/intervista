<?php
require_once 'config.php';

if (isset($_POST['searchVal'])) {
    $query = "SELECT * FROM filmsquali WHERE titolo LIKE '%{$_POST['searchVal']}%' LIMIT 5";
    $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) > 0) {
     $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch rows as an associative array
     echo json_encode($rows);
} else {
    echo "Movie not found";
  }
}
?>