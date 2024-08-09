<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM studentdb";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .go-back {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .go-back input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: #6c757d;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .go-back input[type="submit"]:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h2>Registered Students</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Registration Date</th>
                    <th>Action</th>
                </tr>";
            $counter = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$counter."</td>
                    <td>".$row["first_name"]."</td>
                    <td>".$row["last_name"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["age"]."</td>
                    <td>".$row["course"]."</td>
                    <td>".$row["registration_date"]."</td>
                    <td> <a href='delete.php?id=".$row["id"]."'> Delete </a>
                    | <a href='update.php?id=".$row["id"]."'> Update </a></td>
                  </tr>";
                  $counter++;
        }
        echo "</table>";
    } else {
        echo "<p>No students found.</p>";
    }

    mysqli_close($conn);
    ?>
    <div class="go-back">
        <form action="register.php" method="get">
            <input type="submit" value="Go Back to Register New Students">
        </form>
    </div>
</body>
</html>
