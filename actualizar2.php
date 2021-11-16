<?php 
    include ("./inc/settings.php");
    validar();

    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

    if (isset($_POST['name']) && isset($_POST['fecha']) && isset($_POST['numeroD']) && isset($_POST['numeroF']) && isset($_POST['id'])){
        $name = $_POST['name'];
        $fecha = $_POST['fecha'];
        $numeroD = $_POST['numeroD'];
        $numeroF = $_POST['numeroF'];
        $id = $_POST['id'];

        $query = "UPDATE table1 SET column2 = :name, column3 = :fecha, column4 = :numeroD, column5 = :numeroF WHERE column1 = :id;";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":fecha", $fecha);
        $stmt->bindParam(":numeroD", $numeroD);
        $stmt->bindParam(":numeroF", $numeroF);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header("location:crud.php");
    }else{
        echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>" ;

    }
?>