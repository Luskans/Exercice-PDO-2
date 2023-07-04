<?php require_once('connexion.php'); ?>

<h2>Liste des rendez-vous</h2>

<?php
$request = $db->query('SELECT * FROM appointments');
$appointments = $request->fetchAll();

foreach($appointments as $appointment) {
    echo 'Date: '.htmlspecialchars($appointment['dateHour']).'<br>';
    echo 'Patient id: '.htmlspecialchars($appointment['idPatients']).'<br>';
    $request2 = $db->prepare("SELECT * FROM patients WHERE id = :id");
    $request2->execute([
        'id' => $appointment['idPatients'],
    ]);
    $tempPatient = $request2->fetchAll();
    $patient = $tempPatient[0];
    echo 'Nom: '.htmlspecialchars($patient['lastname']).'<br>';
    echo 'Prénom: '.htmlspecialchars($patient['firstname']).'<br>';
    echo '<a href="rendez-vous.php?id='.$appointment['id'].'">Consultez ce rendez-vous</a><br>';
    echo '<a href="delete-rendezvous-traitement.php?id='.$appointment['id'].'">Supprimer ce rendez-vous</a><br><br><br>';
}
?>

<p><a href="./ajout-rendezvous.php">Formulaire de prise de rendez-vous</a></p>