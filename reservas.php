<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $personas = $_POST['personas'];

    $sql = "INSERT INTO Reservas (nombre, email, fecha, hora, personas) VALUES ('$nombre', '$email', '$fecha', '$hora', '$personas')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>