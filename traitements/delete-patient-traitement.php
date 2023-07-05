<?php require_once('connexion.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $request = $db->prepare("DELETE FROM appointments WHERE idPatients = :id");
    $request->execute([
        'id' => $id
    ]);
    $request2 = $db->prepare("DELETE FROM patients WHERE id = :id");
    $request2->execute([
        'id' => $id
    ]);
};

header("Location: ../liste-patients.php");
