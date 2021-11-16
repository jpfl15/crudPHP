<?php
    include ("./inc/settings.php");
    validar();

    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

    if (isset($_POST['name']) && isset($_POST['fecha']) && isset($_POST['numeroD']) && isset($_POST['numeroF']) && isset($_POST['id'])){
        $id = $_POST ['id'];
        $nombre = $_POST ['name'];
        $fecha = $_POST ['fecha'];
        $numeroD = $_POST ['numeroD'];
        $numeroF = $_POST ['numeroF'];

        $query = "INSERT INTO table1 (column1,column2,column3,column4,column5) VALUES (:id, :nombre, :fecha, :numeroD, :numeroF);";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":ombre", $nombre);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":numeroD", $numeroD);
        $stmt->bindParam(":numeroF", $numeroF);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location:crud.php");
    }
    else{
        echo "Alguio salió mal <a href='crud.php'> click aqui para volver a crud</a>";
    }
?>