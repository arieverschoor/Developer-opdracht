<html>   
    <head> 
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Overzocht - De Pitloze Duif</title>  
    </head>
    <body>
<?php
    /* Get access to the database */
    include "db.php";
    /* Define Pigeon- & PigeonList-class */
    include "pigeon.php";

    /* Getting all stored pigeons */
    $all_pigeons = new PigeonList();
    $sql = "SELECT * FROM `pigeon`";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        /* Building output data of each row (pigeon) */
        while($row = $result->fetch_assoc()) {
          $all_pigeons->addPigeon(new Pigeon($row['owner'], $row['name'], $row['weight'], $row['age'] ));
        }
    }
    ?>

    <h1>Overzicht duiven</h1>

    <table border="0">
        <th>
            <tr>
                <td>Eigenaar</td>
                <td>Naam duif</td>
                <td>Gewicht duif (gram)</td>
                <td>Leeftijd duif (maanden)</td>
            </tr>
        </th>
        <?php
        // {TODO: Put the #all_pigeon data to template}
        //var_dump($all_pigeons);
           // foreach ($all_pigeons as $single_pigeon) {
                //echo '<tr>';
                //echo '<td>' . $single_pigeon->getOwner() . '</td>';
                //echo '<td>' . $single_pigeon->getName() . '</td>';
                //echo '<td>' . $single_pigeon->Weight() . '</td>';
                //echo '<td>' . $single_pigeon->Age() . '</td>';
                //echo '</tr>';
           // }
        ?>
    </table>
<?php
    /* Action completed, so close the database */
    $db->close();
?>
    </body>
</html>
