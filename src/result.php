<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['quiz_id'])) {
    header("Location: index.php");
    exit();
}
$total_correct = 0;
$quiz_id = $_GET['quiz_id'];
$stmt = $conn->prepare("SELECT question_id, correct_option FROM questions WHERE quiz_id = ?");
$stmt->bind_param("i", $quiz_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    if (isset($_POST["question{$row['question_id']}"]) && $_POST["question{$row['question_id']}"] == $row['correct_option']) {
        $total_correct++;
    }
}
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("INSERT INTO results (user_id, quiz_id, score) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $user_id, $quiz_id, $total_correct);
$stmt->execute();
echo "Puntuación final: $total_correct";
?>
