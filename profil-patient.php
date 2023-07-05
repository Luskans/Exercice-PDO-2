<?php require_once('./traitements/connexion.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

$patientStatement = $db->query("SELECT * FROM patients WHERE id = $id");
$tempPatient = $patientStatement->fetchAll();
$patient = $tempPatient[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Profil du patient</h2>

    <form action="./traitements/update-patient-traitement.php" method="post">
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" value="<?php echo $patient['lastname']?>">
        <br>

        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" value="<?php echo $patient['firstname']?>">
        <br>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" name="birthdate" value="<?php echo $patient['birthdate']?>">
        <br>

        <label for="phone">Téléphone :</label>
        <input type="tel" name="phone" value="<?php echo $patient['phone']?>">
        <br>

        <label for="mail">Email :</label>
        <input type="email" name="mail" value="<?php echo $patient['mail']?>">
        <br>

        <input type="hidden" name="id" value="<?php echo $patient['id']?>">

        <button type="submit">Modifier le profil</button>
    </form>

</body>

</html>

<?php
echo "<br><br><br>";
echo "Liste des rendez-vous :<br><br>";
$request = $db->prepare("SELECT * FROM appointments WHERE idPatients = :id");
$request->execute([
    'id' => $patient['id']
]);
$appointments = $request->fetchAll();

foreach($appointments as $appointment) {
    echo 'Date: '.htmlspecialchars($appointment['dateHour']).'<br>';
    echo 'Patient id: '.htmlspecialchars($appointment['idPatients']).'<br><br>';
}
?>