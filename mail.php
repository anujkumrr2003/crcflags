<?php
// Include database configuration
include 'config.php';
// frjubpqvvdwgmnmb
// Insert record (email and password)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $email12 = $conn->real_escape_string($_POST['email12']);
    $password = $conn->real_escape_string($_POST['password']);

   

    // Prepare the SQL query to insert data into the 'emails' table
    $sql = "INSERT INTO emails (email12, password) VALUES ('$email12', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting record: " . $conn->error . "');</script>";
    }
}

// Update record (email and password)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $email12 = $conn->real_escape_string($_POST['email12']);
    $password = $conn->real_escape_string($_POST['password']);

   

    // Prepare the SQL query to update the record
    $sqlUpdate = "UPDATE emails SET email12='$email12', password='$password' WHERE id='$id'";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $id = $conn->real_escape_string($_GET['delete']);

    // Delete query
    $sqlDelete = "DELETE FROM emails WHERE id='$id'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

// Fetch all records from the 'emails' table
$sqlFetch = "SELECT * FROM emails";
$result = $conn->query($sqlFetch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
</head>
<body>
    <h2>Insert New User</h2>
    <form method="POST" action="">
        <input type="email" name="email12" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <button type="submit" name="save">Submit</button>
    </form>

    <h2>Users List</h2>
    <?php
    if ($result->num_rows > 0) {
        // Output each row
        while ($row = $result->fetch_assoc()) {
            echo "<p>Email: " . $row['email12'] . " | Password: " . $row['password'] . "
            <a href='?delete=" . $row['id'] . "'>Delete</a>
            <form method='POST' action='' style='display:inline;'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <input type='email' name='email12' value='" . $row['email12'] . "' required>
                <input type='password' name='password' value='" . $row['password'] . "' required>
                <button type='submit' name='update'>Update</button>
            </form>
            </p>";
        }
    } else {
        echo "No records found.";
    }
    ?>
</body>
</html>
