<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #333;
        }
    </style>
</head>
<body>

<h2>Student Records</h2>

<?php
$mysqli = new mysqli("localhost", "root", "", "student");

if (mysqli_connect_errno()) {
    printf("Connection failed: %s", mysqli_connect_error());
    exit();
} else {
    $sql = "SELECT * FROM BE";
    $res = mysqli_query($mysqli, $sql);
    if ($res) {
        echo '<table>';
        echo '<tr><th>Roll No</th><th>Name</th></tr>';
        while ($newarray = mysqli_fetch_array($res)) {
            $r = htmlspecialchars($newarray['rollno']);
            $n = htmlspecialchars($newarray['name']);
            echo "<tr><td>$r</td><td>$n</td></tr>";
        }
        echo '</table>';
    } else {
        echo "<p style='text-align:center; color:red;'>Query failed: " . mysqli_error($mysqli) . "</p>";
    }
}
?>

</body>
</html>
