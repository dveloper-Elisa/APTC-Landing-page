<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['email'])){
    header('Location: ../');
}

include "../connection/bd_connection.php";

// Check for edit request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user details to prefill the form
    $stmt = $connection->prepare("SELECT * FROM team WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $editData = $result->fetch_assoc();
}

// Handle form submission for updating or adding team members
if (isset($_POST["changeTeam"])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $imagePath = null;

    // Check if an image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/";
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    if (isset($_POST['id'])) {
        // Update existing team member
        $id = $_POST['id'];
        if ($imagePath) {
            $stmt = $connection->prepare("UPDATE team SET names = ?, title = ?, email = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $name, $title, $email, $imagePath, $id);
        } else {
            $stmt = $connection->prepare("UPDATE team SET names = ?, title = ?, email = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $title, $email, $id);
        }
    } else {
        // Add a new team member
        $stmt = $connection->prepare("INSERT INTO team (userId, image, names, title, email, `date`) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("issss", $_SESSION['userId'], $imagePath, $name, $title, $email);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Operation successful'); window.location='';</script>";
    } else {
        echo "<script>alert('Failed to process request');</script>";
    }
}

// Handle delete request
if (isset($_GET['idd'])) {
    $id = $_GET['idd'];

    $stmt = $connection->prepare("DELETE FROM team WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Team member deleted successfully'); window.location='./team.php';</script>";
    } else {
        echo "<script>alert('Failed to delete team member');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Team</title>
</head>
<body>

<?php include "./header.php"; ?>

<!-- Team Member Form -->
<form action="" method="POST" enctype="multipart/form-data">
    <h3><?php echo isset($editData) ? "Edit Team Member" : "Add Team Member"; ?></h3>
    <input type="hidden" name="id" value="<?php echo isset($editData) ? $editData['id'] : ''; ?>">
    <input type="text" name="name" required placeholder="Member name here" value="<?php echo isset($editData) ? $editData['names'] : ''; ?>">
    <input type="text" name="title" required placeholder="Post Here" value="<?php echo isset($editData) ? $editData['title'] : ''; ?>">
    <input type="email" name="email" required placeholder="Email Here" value="<?php echo isset($editData) ? $editData['email'] : ''; ?>">
    <input type="file" name="image">
    <button type="submit" name="changeTeam"><?php echo isset($editData) ? "Update Team Member" : "Add Team Member"; ?></button>
</form>

<!-- Team Members Table -->
<table>
    <thead>
        <th>Names</th>
        <th>Title</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM team";
        $result = mysqli_query($connection, $sql);
        if (!$result) {
            die("Query failed:" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['names']}</td>
                <td>{$row['title']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='?id={$row['id']}'>Edit</a>
                    <a href='?idd={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this team member?\")'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
