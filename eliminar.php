<?php
  include ("./inc/settings.php");
  validar();

  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

  if (isset($_POST['column1'])){
    $id = $_POST['column1'];
    $query = "DELETE FROM table1 WHERE column1=:id;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header("location:crud.php");
  }else{
    echo "Alguio salió mal <a href='crud.php'> click aqui para volver a crud</a>";
  }
  

  
?>