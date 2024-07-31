<?php
require_once 'config.php';

$contact_id = $_GET['id'] ?? null;

if (!$contact_id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM contact_list WHERE contact_id = ?");
$stmt->execute([$contact_id]);

header("Location: index.php");
exit;
?>
