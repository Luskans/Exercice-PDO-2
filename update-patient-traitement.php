<?php require_once('connexion.php');

if (
    isset($_POST['lastname']) && !empty($_POST['lastname'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
    && isset($_POST['phone']) && !empty($_POST['phone'])
    && isset($_POST['mail']) && !empty($_POST['mail'])
    && isset($_POST['id']) && !empty($_POST['id'])
) {
    $sqlQuery = "UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail WHERE id = :id";
    $updatePatient = $db->prepare($sqlQuery);
    $updatePatient->execute([
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'birthdate' => $_POST['birthdate'],
        'phone' => $_POST['phone'],
        'mail' => $_POST['mail'],
        'id' => $_POST['id']
    ]);
}
header("Location: liste-patients.php");