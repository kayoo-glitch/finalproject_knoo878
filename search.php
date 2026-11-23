<!DOCTYPE html>
<html lang="en">
<!--
Name: Kay Nae Oo
Date: 11/22/2026
--> 
<head>
    <link rel="stylesheet" href="styles/main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <script src="scripts/main.js"></script>

    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "student_directory";

    $connection = new mysql($hostname, $username, $password, $databasename);

    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }

    $stmt = $connection->prepare("SELECT * FROM students WHERE last_name = ?");

    $stmt->blind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    
</body>
</html>
