<h1>Filmsuche</h1>

<form class="inputbox input-field">
    <?php
    echo "Suche Film nach Produktionsfirma: "
    ?>
    <input class="inputbox input-field" type="text" name="searchfield" placeholder="Texteingabe" >
</form>

<form class="form-inline mt-2 mt-md-0">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Suchen</button>
    <form class="form-inline mt-2 mt-md-0">
    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Abbrechen</button>
</form>

<?php
    if(isset($_POST['searchfield']))
    {
    $suchfeld = $_POST['suchfeld'];
    echo '<h2>Suchergebnis</h2>';
    echo 'Gesuchte Produktionsfirma: $suchfeld';
    $query6 = 'select Genre, Filmtitel,  Jahr, Regie from tblpremiere where genre like ? or filmtitel like ? or jahr like ? or regie like ?';

    $stmt6 = $con->prepare($query6);
    $suche = '%'.$suchfeld.'%';
    $stmt6->execute([$suche, $suche, $suche, $suche]);
    echo '<div class="table"><div class="row">';
            for($i = 0; $i < $stmt6->columnCount(); $i++)
            {
            echo '<div class="col font-weight-bold">'.$stmt6->getColumnMeta($i)['name'].'</div>';
            }
            echo '</div>
        <div class="row">';
            while($row = $stmt6->fetch(PDO::FETCH_NUM))
            {
            foreach($row as $r)
            {
            echo '<div class="col">'.$r.'</div>';
            }
            echo '<br>';
            }
            echo '</div>
    </div>';
    }
