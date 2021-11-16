<?php
  include ("./inc/settings.php");
    $query = "SELECT * FROM usuarios WHERE userN = '$_POST[userN]' AND pass = md5('$_POST[pws]')";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      

      $row = $result->fetch_assoc();
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