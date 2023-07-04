<?php require_once('connexion.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $request = $db->prepare("DELETE FROM appointments WHERE id = :id");
    $request->execute([
        'id' => $id
    ]);
};

header("Location: liste-rendezvous.php");
