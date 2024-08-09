<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            margin-top: 20px;
            text-align: center;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="container"></div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $sql = "UPDATE studentdb SET first_name = '$first_name', last_name = '$last_name', email = '$email', age = $age, course = '$course' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Data updated successfully!</p>";
        echo "<button onclick=\"window.location.href='students.php'\">Go Back to Students List</button>";
        echo "<button onclick=\"window.location.href='register.php'\">Register New Student</button>";
    } else {
        echo "<p>There was an error updating the data.</p>";
    }
}
?>
</div>