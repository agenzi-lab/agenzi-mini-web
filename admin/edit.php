<?php
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];

    $sql = "UPDATE users SET name=?, username=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $username, $id);

    if ($stmt->execute()) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>