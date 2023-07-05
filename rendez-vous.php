<?php require_once('./traitements/connexion.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

$request = $db->query("SELECT * FROM appointments WHERE id = $id");
$tempAppointment = $request->fetchAll();
$appointment = $tempAppointment[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Détail du rendez-vous</h2>

    <form action="./traitements/update-appointment-traitement.php" method="post">
        <label for="dateHour">Date du rendez-vous :</label>
        <input type="text" name="dateHour" value="<?php echo $appointment['dateHour']?>">
        <br>

        <input type="hidden" name="id" value="<?php echo $appointment['id']?>">

        <button type="submit">Modifier le rendez-vous</button>
        
    </form>

</body>

<?php
echo 'Patient id: '.htmlspecialchars($appointment['id']).'<br>';
$request2 = $db->prepare("SELECT * FROM patients WHERE id = :id");
$request2->execute([
    'id' => $appointment['idPatients'],
]);
$tempPatient = $request2->fetchAll();
$patient = $tempPatient[0];
    echo "<br><br>";
    echo "Avec le patient :<br><br>";
    echo 'Nom: '.htmlspecialchars($patient['lastname']).'<br>';
    echo 'Prénom: '.htmlspecialchars($patient['firstname']).'<br>';
    echo 'Date de naissance: '.htmlspecialchars($patient['birthdate']).'<br>';
    echo 'Téléphone: '.htmlspecialchars($patient['phone']).'<br>';
    echo 'Email: '.htmlspecialchars($patient['mail']).'<br>';
?>

</html>