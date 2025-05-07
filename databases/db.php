<?php
$a = (int)$_POST['rno'];
$b = $_POST['nm'];

$mysqli = mysqli_connect("localhost", "root", "", "student");

if (mysqli_connect_errno()) {
    printf("Connection failed: %s", mysqli_connect_error());
    exit();
} else {
    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("INSERT INTO BE (rollno, name) VALUES (?, ?)");
    $stmt->bind_param("is", $a, $b); // 'i' for integer, 's' for string

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
