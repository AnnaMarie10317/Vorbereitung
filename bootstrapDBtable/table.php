<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<!-- Grobüberschrift-->
    <title>Fixed top navbar example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  <nav>
    <?php
      include 'nav.html';
    ?>
  </nav>

  <main role="main" class="container">
      <?php

if(isset($_GET["data"]))
    {
        $databaseName = $_GET["data"];
        $servername = "localhost";
        $username = "root";
        $password = "root";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $databaseName);

        $db_list = mysqli_query($conn, "SHOW TABLES");

        $html = '<table class="table table-bordered">';
        $html = $html . '<tr>';
        $html = $html . '<th>Tables</th>';
        $html = $html . '</tr>';
        while ($row = mysqli_fetch_row( $db_list )) {
        $html = $html . '<tr>';
        $html = $html . '<td><a href="tabledata.php?data=' . $databaseName . '&data1=' . $row['0'] . '">' .  $row['0'] . '</a></td>';
        $html = $html . '</tr>';
        }

        $html = $html . '</table>';

        echo $html; 
        $conn->close();  
    }       
?>
    </main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
<script src="config.php"></script>
</body>
</html>