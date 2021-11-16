<?php
    include ("./inc/settings.php");
    validar();

    $query = "SELECT column1, column2, column3, column4, column5 FROM table1 WHERE column1 = ".$_POST['column1'].";";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query($query);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    if ($conn->query($query)){
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            ?>
            <form action='actualizar2.php' method='POST'>
                <fieldset>
                    <legend>Cambie la informacion del registro</legend>
                    ID <input type="number" name="id" id="" value = "<?= $row['column1'] ?>" readonly>
                    <br>
                    Nombre <input type="text" name="name" id="" value = "<?= $row['column2'] ?>">
                    <br>
                    Fecha <input type="date" name="fecha" id="" value = "<?= $row['column3'] ?>">
                    <br>
                    Numero Double <input type="number" name="numeroD" id="" value = "<?= $row['column4'] ?>">
                    <br>
                    Numero Float <input type="number" name="numeroF" id="" value = "<?= $row['column5'] ?>">
                    <br>
                    <input type="submit" value="Modificar">
                </fieldset>
            </form>
            <?php
        }
    }
    else{
        echo "<br>";
        echo "Alguio salió mal <a href='crud.php'> click aqui para volver a crud</a>";
    }
    
?>