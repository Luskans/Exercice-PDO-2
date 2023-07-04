<?php require_once('connexion.php');

if (
    isset($_POST['dateHour']) && !empty($_POST['dateHour'])
    // && isset($_POST['idPatients']) && !empty($_POST['idPatients'])
    && isset($_POST['id']) && !empty($_POST['id'])
) {
    echo "test";
    echo $_POST['id'];
    $sqlQuery = "UPDATE appointments SET dateHour = :dateHour WHERE id = :id";
    $updateAppointment = $db->prepare($sqlQuery);
    $updateAppointment->execute([
        'dateHour' => $_POST['dateHour'],
        // 'idPatients' => $_POST['idPatients'],
        'id' => $_POST['id']
    ]);
}
header("Location: liste-rendezvous.php");