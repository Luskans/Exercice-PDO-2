<?php require_once('connexion.php');

if (
    isset($_POST['lastname']) && !empty($_POST['lastname'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
    && isset($_POST['phone']) && !empty($_POST['phone'])
    && isset($_POST['mail']) && !empty($_POST['mail'])
    && isset($_POST['dateHour']) && !empty($_POST['dateHour'])
) {

    $request = "INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
    $insertPatient = $db->prepare($request);
    $insertPatient->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'birthdate' => $_POST['birthdate'],
        'phone' => $_POST['phone'],
        'mail' => $_POST['mail'],
    ]);

    $request2 = "SELECT id FROM patients WHERE lastname = :lastname AND firstname = :firstname AND phone = :phone";
    $selectPatient = $db->prepare($request2);
    $selectPatient->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'phone' => $_POST['phone']
    ]);
    $tempPatient = $selectPatient->fetchAll();
    $patient = $tempPatient[0]['id'];
    // var_dump($patient);

    $request3 = "INSERT INTO appointments(dateHour, idPatients) VALUES (:dateHour, :idPatients)";
    $insertAppointment = $db->prepare($request3);
    $insertAppointment->execute([
        'dateHour' => $_POST['dateHour'],
        'idPatients' => $patient,
    ]);

    header("Location: ../liste-patients.php");

} else {
    header("Location: ../ajout-patient-rendezvous.php");
}
