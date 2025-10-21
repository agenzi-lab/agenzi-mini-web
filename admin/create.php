<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];

    $sql = "INSERT INTO users (name, username) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $username);

    if ($stmt->execute()) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form action="create.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>