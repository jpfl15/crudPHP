<?php
  include ("./inc/settings.php");

    $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);

    if (isset($_POST['userN']) && isset($_POST['pws'])){
      $usern = $_POST['userN'];
      $passwd = $_POST['pws'];
      $query = "SELECT * FROM usuarios WHERE userN = :usern AND pass = md5(:passwd)";

      $stmt = $pdo->prepare($query);
      $stmt->bindParam(":usern", $usern);
      $stmt->bindParam(":passwd", $passwd);
      $stmt->execute();

    }
    
    if ($stmt->rowCount() == 1) {
      

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      session_start();
      $_SESSION['user'] = $row['empleado_nombre'];
      $_SESSION['apellido1'] = $row['empleado_apellido1'];
      $_SESSION['apellido2'] = $row['empleado_apellido2'];
      
      header("location: crud.php");

    } else {
        echo "Se detecto un acceso ilegal al sistema, su ip esta siendo monitoreada y sera enviada a la policia";
        ?>
        <a href="http://localhost/crud/index.php">Sitio de login</a>
        <?php
      }
      $conn->close();
?>