/*
<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    $sql = "INSERT INTO cuestionarios (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    mysqli_query($conn, $sql);
    echo "Cuestionario agregado";
}
?>
<form method="POST">
    <input type="text" name="titulo" placeholder="Título" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button type="submit">Agregar Cuestionario</button>
</form>
*/