
<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$result = $conn->query("SELECT * FROM quizzes");
while ($row = $result->fetch_assoc()) {
    echo "<a href='quiz.php?quiz_id=".$row['quiz_id']."'>".$row['title']."</a><br>";
}
?>
