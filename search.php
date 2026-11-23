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
    $result = $stmt->search_students();

    if($results != null)
        {
            echo "<div class="message">"
            echo "<table class='fullborder'><tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr><tr>";
            echo "<td>".$results['id']."</td>";
            echo "<td>".$results['first_name']."</td>";
            echo "<td>".$results['last_name']."</td>";
            echo "<td>".$results['email']."</td>";
            echo "</tr></table>";
            echo "</div>"
        }
        else
        {
            echo "<p>No students found</p>";
        }
    ?>
    <h3>Search Results</h3>
    <table>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <a href="index.php">Return to the home page, index.php</a>

</body>
</html>
