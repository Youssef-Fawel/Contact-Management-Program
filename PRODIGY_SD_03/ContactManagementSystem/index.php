<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT * FROM contact_list");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <link rel="icon" href="x-icon/home.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1 class="mb-0"><i class="fas fa-address-book"></i> Contact Manager</h1>
        <div id="currentTime" class="h5 mt-2"></div>
    </header>
    <main class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="fas fa-address-card"></i> Contacts</h2>
            <a href="add.php" class="btn btn-success"><i class="fas fa-plus"></i> Add New Contact</a>
        </div>
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search contacts...">
        </div>
        <div id="noResultsMessage" class="alert alert-warning d-none">No contacts found.</div>
        <div class="row" id="contactsContainer">
            <?php foreach ($contacts as $contact): ?>
                <div class="col-md-4 mb-3 contact-card">
                    <div class="card">
                        <div class="card-header text-white">
                            <h5 class="card-title mb-0"><?= htmlspecialchars($contact['contact_name']) ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><i class="fas fa-phone icon-phone"></i> <?= htmlspecialchars($contact['contact_phone']) ?></p>
                            <p class="card-text"><i class="fas fa-envelope icon-email"></i> <?= htmlspecialchars($contact['contact_email']) ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="edit.php?id=<?= $contact['contact_id'] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="delete.php?id=<?= $contact['contact_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="text-center py-4 mt-5 bg-light">
        <p>&copy; 2024 Contact Manager</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
