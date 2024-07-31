<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact_id = $_POST['id'];
    $contact_name = $_POST['name'];
    $contact_phone = $_POST['phone'];
    $contact_email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE contact_list SET contact_name = ?, contact_phone = ?, contact_email = ? WHERE contact_id = ?");
    $stmt->execute([$contact_name, $contact_phone, $contact_email, $contact_id]);

    header("Location: index.php");
    exit;
}

$contact_id = $_GET['id'] ?? null;
if (!$contact_id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM contact_list WHERE contact_id = ?");
$stmt->execute([$contact_id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$contact) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link rel="icon" href="x-icon/editing.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1><i class="fas fa-address-book"></i> Contact Manager</h1>
    </header>
    <main class="container mt-4">
        <h2 class="mb-4"><i class="fas fa-edit"></i> Edit Contact</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($contact['contact_id']) ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($contact['contact_name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($contact['contact_phone']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($contact['contact_email']) ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Contact</button>
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
