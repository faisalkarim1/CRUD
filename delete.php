<h1>User Data Deleted</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentdb";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_GET['id']) && $_GET['id'] > 0){
   $id = $_GET['id'];
   $f = mysqli_query($conn,'DELETE FROM studentdb WHERE id = '.$id);
    if ( $f ){
        ?>
        <<script>
            window.location = 'students.php?deleted=1';
        </script>
        <?php

    } else{
        echo 'Error! Cannot Delete';
    }
}

?>