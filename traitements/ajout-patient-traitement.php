<?php require_once('./connexion.php');

if (
    isset($_POST['lastname']) && !empty($_POST['lastname'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
    && isset($_POST['phone']) && !empty($_POST['phone'])
    && isset($_POST['mail']) && !empty($_POST['mail'])
) {

    $sqlQuery = "INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";
    $insertPatient = $db->prepare($sqlQuery);
    $insertPatient->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'birthdate' => $_POST['birthdate'],
        'phone' => $_POST['phone'],
        'mail' => $_POST['mail'],
    ]);

    header("Location: ../liste-patients.php");

} else {
    header("Location: ../ajout-patient.php");
}
