<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include 'includes/header.php';

echo "<h1>Kelola User</h1>";

include '../includes/db.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<br><a href='create.php'>Tambah User</a>";

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>Username</th><th>Aksi</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["username"]."</td><td><a href='edit.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

include 'includes/footer.php';
?>