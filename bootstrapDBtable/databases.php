<?php
        include 'config.php';

        $db_list = mysqli_query($conn, "SHOW DATABASES");
    
        $html = '<table class="table table-bordered">';
        $html = $html . '<tr>';
        $html = $html . '<th>Databases</th>';
        $html = $html . '</tr>';
        while ($row = mysqli_fetch_row( $db_list )) {
        $html = $html . '<tr>';
        $html = $html . '<td><a href="table.php?data=' . $row['0'] . '">' .  $row['0'] . '</a></td>';
        $html = $html . '</tr>';
        }
    
        $html = $html . '</table>';
    
        echo $html;  
        $conn->close();           
?>