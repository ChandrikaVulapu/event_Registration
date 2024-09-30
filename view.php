<?php
$servername = "localhost";
$username = "root";
$password = "1914";
$dbname = "event_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, event_choice FROM registrations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
</head>
<body>
    <h2>Registered Users</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Event</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["event_choice"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No registrations found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
