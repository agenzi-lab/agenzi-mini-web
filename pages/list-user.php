<?php
include 'includes/db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<h1>Daftar User</h1>";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>Username</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["username"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>