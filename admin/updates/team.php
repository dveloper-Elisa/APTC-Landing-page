<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: ../');
    exit();
}

include "../connection/bd_connection.php";

// Check for edit request
$editData = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $connection->prepare("SELECT * FROM team WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $editData = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["changeTeam"])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $email = $_POST['email'];
    $imagePath = null;

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/";
        $imagePath = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update existing team member
        $id = intval($_POST['id']);
        if ($imagePath) {
            $stmt = $connection->prepare("UPDATE team SET names = ?, title = ?, email = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $name, $title, $email, $imagePath, $id);
        } else {
            $stmt = $connection->prepare("UPDATE team SET names = ?, title = ?, email = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $title, $email, $id);
        }
    } else {
        // Insert new team member
        $loggedInEmail = $_SESSION['email'];
        $stmt = $connection->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $loggedInEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if (!$row) {
            echo "<script>alert('User not found. Please log in again.');</script>";
            exit();
        }

        $userId = $row['id'];

        if (!$imagePath) {
            $imagePath = "../uploads/default.jpg";
        }

        $stmt = $connection->prepare("INSERT INTO team (userId, image, names, title, email, `date`) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("issss", $userId, $imagePath, $name, $title, $email);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Operation successful'); window.location='./team.php';</script>";
    } else {
        echo "<script>alert('Operation failed: " . $connection->error . "');</script>";
    }

    $stmt->close();
}

// Handle delete request
if (isset($_GET['idd'])) {
    $id = intval($_GET['idd']);

    $stmt = $connection->prepare("DELETE FROM team WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Team member deleted successfully'); window.location='./team.php';</script>";
    } else {
        echo "<script>alert('Failed to delete team member');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php include "./header.php"; ?>

<div class="max-w-4xl mx-auto p-4">
    <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <h3 class="text-2xl font-bold mb-4 text-lime-700">
            <?php echo isset($editData) ? "Edit Team Member" : "Add Team Member"; ?>
        </h3>
        <input type="hidden" name="id" value="<?php echo isset($editData) ? $editData['id'] : ''; ?>">
        <input type="text" name="name" required placeholder="Member name here" class="w-full border border-black mb-4 p-2 rounded" value="<?php echo isset($editData) ? $editData['names'] : ''; ?>">
        <input type="text" name="title" required placeholder="Post Here" class="w-full border border-black mb-4 p-2 rounded" value="<?php echo isset($editData) ? $editData['title'] : ''; ?>">
        <input type="email" name="email" required placeholder="Email Here" class="w-full border border-black mb-4 p-2 rounded" value="<?php echo isset($editData) ? $editData['email'] : ''; ?>">
        <input type="file" name="image" class="w-full border border-black mb-4">
        <button type="submit" name="changeTeam" class="bg-lime-700 text-white px-4 py-2 rounded">
            <?php echo isset($editData) ? "Update Team Member" : "Add Team Member"; ?>
        </button>
    </form>

    <div class="mt-8 bg-white p-6 rounded shadow-md overflow-x-auto">
        <h3 class="text-center text-lime-800 font-bold p-3 text-[20px] underline">Manage Team</h3>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-lime-700 text-white">
                    <th class="p-2 border">Names</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM team";
                $result = $connection->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-100'>
                            <td class='p-2 border'>{$row['names']}</td>
                            <td class='p-2 border'>{$row['title']}</td>
                            <td class='p-2 border'>{$row['email']}</td>
                            <td class='p-2 border flex flex-row gap-2'>
                                <a href='?id={$row['id']}' class='text-lime-700 hover:underline'>Edit</a>
                                <a href='?idd={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this team member?\")' class='text-red-500 hover:underline ml-4'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center p-4'>No team members found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
