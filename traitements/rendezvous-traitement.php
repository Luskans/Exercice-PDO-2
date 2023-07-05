<?php require_once('connexion.php');

if (
    isset($_POST['lastname']) && !empty($_POST['lastname'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
    && isset($_POST['dateHour']) && !empty($_POST['dateHour'])
) {
    $request = $db->prepare("SELECT id FROM patients WHERE lastname = :lastname AND firstname = :firstname AND birthdate = :birthdate");
    // $requestId = $db->prepare($request);
    $request->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'birthdate' => $_POST['birthdate']
    ]);
    $tempPatientId = $request->fetch();
    var_dump($tempPatientId);
    $patientId = $tempPatientId[0]['id'];
    echo $patientId;

    $sqlQuery = "INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)";
    $insertAppointment = $db->prepare($sqlQuery);
    $insertAppointment->execute([
        'dateHour' => $_POST['dateHour'],
        'idPatients' => $patientId
    ]);

    // header("Location: ../liste-rendezvous.php");

} else {
    // header("Location: ../ajout-rendezvous.php");
}

?>