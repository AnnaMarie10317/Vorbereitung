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

if(isset($_GET["data"]) && isset($_GET["data1"]))
    {
        $databaseName = $_GET["data"];
        $tableName = $_GET["data1"];
        $servername = "localhost";
        $username = "root";
        $password = "root";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $databaseName);

        $sql = "SELECT * FROM " . $tableName;
        $result = $conn->query($sql);
        $fieldinfo = $result -> fetch_fields();

        if ($result->num_rows > 0) {

            $html = '<table class="table table-bordered">';
            $html = $html . '<tr>';
            foreach ($fieldinfo as $val) {
                $html = $html . '<th>' . $val -> name . '</th>';
            }
            $html = $html . '</tr>';

            $index = 0;
            while($row = mysqli_fetch_row($result)) {
                $html = $html . '<tr>';
                foreach ($fieldinfo as $val) {
                    $html = $html . '<td>' . $row[$index] . '</td>';
                    $index++;
                }
                $index = 0;
                $html = $html . '</tr>';             
            }

            $html = $html . '</table>';
            echo $html; 

            } else
            {
                echo "0 results";
            }
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