<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: green;
        }
        .go-back {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .go-back form {
            margin: 5px 0;
        }
        .go-back input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .go-back input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .go-back input[type="submit"].secondary {
            background-color: #6c757d;
        }
        .go-back input[type="submit"].secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentdb";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $course = $_POST['course'];

            $sql = "INSERT INTO studentdb (first_name, last_name, email, age, course)
                    VALUES ('$first_name', '$last_name', '$email', '$age', '$course')";

            if (mysqli_query($conn, $sql)) {
                echo "<h1>Success!</h1>";
                echo "<p>New record created successfully.</p>";
            } else {
                echo "<h1>Error!</h1>";
                echo "<p>There was an error creating the record: " . mysqli_error($conn) . "</p>";
            }
        }

        mysqli_close($conn);
        ?>
        <div class="go-back">
            <form action="students.php">
                <input type="submit" value="View Students">
            </form>
            <form action="register.php">
                <input type="submit" value="Register New Student" class="secondary">
            </form>
        </div>
    </div>
</body>
</html>
