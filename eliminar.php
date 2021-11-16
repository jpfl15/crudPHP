<?php
  include ("./inc/settings.php");
  validar();
?>

<?php
$id = $_POST['column1'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if ($conn->query("DELETE FROM table1 WHERE column1 =$id;")){
    header("location:crud.php");
}
else{
    echo "Alguio salió mal <a href='crud.php'> click aqui para volver a crud</a>";
}

?>