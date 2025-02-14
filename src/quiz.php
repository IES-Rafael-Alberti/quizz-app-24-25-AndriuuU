<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['quiz_id'])) {
    header("Location: index.php");
    exit();
}
$quiz_id = $_GET['quiz_id'];
$stmt = $conn->prepare("SELECT * FROM questions WHERE quiz_id = ?");
$stmt->bind_param("i", $quiz_id);
$stmt->execute();
$result = $stmt->get_result();
echo "<form method='POST' action='result.php?quiz_id=$quiz_id'>";
while ($row = $result->fetch_assoc()) {
    echo "<p>{$row['question_text']}</p>";
    foreach (['A', 'B', 'C', 'D'] as $opt) {
        echo "<input type='radio' name='question{$row['question_id']}' value='$opt'> {$row['option_' . strtolower($opt)]}<br>";
    }
}
echo "<button type='submit'>Enviar</button></form>";
?>
