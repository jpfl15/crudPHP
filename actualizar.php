<?php
    include ("./inc/settings.php");
    validar();

    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

    if (isset($_POST['column1'])){
      $id = $_POST['column1'];
      $query = "SELECT column1, column2, column3, column4, column5 FROM table1 WHERE column1 = :id;";

      $stmt = $pdo->prepare($query);
      $stmt->bindParam(":id", $id);
      $stmt->execute();

    }

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

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
    
    else{
        echo "<br>";
        echo "Alguio salió mal <a href='crud.php'> click aqui para volver a crud</a>";
    }
    
?>