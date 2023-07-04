<?php require_once('connexion.php'); ?>

<h2>Liste des patients</h2>

<form action="./liste-patients.php" method="post">
    <input type="search" name="search" placeholder="nom, prénom, ...">
    <button type="submit">Rechercher</button>
</form>
<br><br>

<?php


if (isset($_POST['search']) && !empty($_POST['search'])) {
    $input = $_POST['search'];
    $patientsStatement = $db->query("SELECT * FROM patients WHERE lastname LIKE '$input%' OR firstname LIKE '$input%'");
    $patients = $patientsStatement->fetchAll();
} else {
    $patientsStatement = $db->query('SELECT * FROM patients');
    $patients = $patientsStatement->fetchAll();
}

foreach($patients as $patient) {
    echo 'Nom: '.htmlspecialchars($patient['lastname']).'<br>';
    echo 'Prénom: '.htmlspecialchars($patient['firstname']).'<br>';
    // echo 'Date de naissance: '.htmlspecialchars($patient['birthdate']).'<br>';
    // echo 'Téléphone: '.htmlspecialchars($patient['phone']).'<br>';
    // echo 'Email: '.htmlspecialchars($patient['mail']).'<br>';
    echo '<a href="profil-patient.php?id='.$patient['id'].'">Consultez ce profil</a><br>';
    echo '<a href="delete-patient-traitement.php?id='.$patient['id'].'">Supprimer ce patient et ses rendez-vous</a><br><br><br>';
}
?>

<p><a href="./ajout-patient.php">Formulaire de création de patient</a></p>