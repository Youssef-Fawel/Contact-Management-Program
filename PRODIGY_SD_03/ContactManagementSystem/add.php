<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact_name = $_POST['contact_name'];
    $contact_phone = $_POST['contact_phone'];
    $contact_email = $_POST['contact_email'];

    $stmt = $pdo->prepare("INSERT INTO contact_list (contact_name, contact_phone, contact_email) VALUES (?, ?, ?)");
    $stmt->execute([$contact_name, $contact_phone, $contact_email]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
    <link rel="icon" href="x-icon/add-user.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1><i class="fas fa-address-book"></i> Contact Manager</h1>
    </header>
    <main class="container mt-4">
        <h2 class="mb-4"><i class="fas fa-user-plus"></i> Add New Contact</h2>
        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="contact_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" required>
            </div>
            <div class="mb-3">
                <label for="contact_phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="contact_phone" name="contact_phone" required>
            </div>
            <div class="mb-3">
                <label for="contact_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Add Contact</button>
                <a href="index.php" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
            </div>
        </form>
    </main>

    <footer class="text-center py-4 mt-5 bg-light">
        <p>&copy; 2024 Contact Manager</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
