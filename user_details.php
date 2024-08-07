<?php
include 'db.php';

// Insert a new user
if (isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    $conn->query($sql);
}

// Update an existing user
if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    $conn->query($sql);
}

// Delete a user
if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

// Retrieve users
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            color: #555;
        }
        form {
            margin-bottom: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>User Management</h1>

    <h2>Add User</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" name="add_user" value="Add User">
    </form>

    <h2>Update User</h2>
    <form method="post" action="">
        <label for="id">User ID:</label>
        <input type="number" name="id" required>
        <br>
        <label for="name">New Name:</label>
        <input type="text" name="name">
        <br>
        <label for="email">New Email:</label>
        <input type="email" name="email">
        <br>
        <input type="submit" name="update_user" value="Update User">
    </form>

    <h2>Delete User</h2>
    <form method="post" action="">
        <label for="id">User ID:</label>
        <input type="number" name="id" required>
        <br>
        <input type="submit" name="delete_user" value="Delete User">
    </form>

    <h2>User List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
