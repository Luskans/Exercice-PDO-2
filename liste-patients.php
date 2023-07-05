<?php require_once('./traitements/connexion.php'); ?>
<a href="index.php">Accueil</a>

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
    $totalPatients = $patientsStatement->rowCount(); // on récupère tous les patients pour savoir leur nombre
    $patientsPerPage = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // pas compris ce if
    $totalPages = ceil($totalPatients / $patientsPerPage);
    $startIndex = ($page - 1) * $patientsPerPage;
    $endIndex = $startIndex + $patientsPerPage - 1;
    
    $patientsStatement = $db->query('SELECT * FROM patients LIMIT '.$startIndex.', '.$patientsPerPage);
    $patients = $patientsStatement->fetchAll();
}

foreach($patients as $patient) {
    echo 'Nom: '.htmlspecialchars($patient['lastname']).'<br>';
    echo 'Prénom: '.htmlspecialchars($patient['firstname']).'<br>';
    echo '<a href="profil-patient.php?id='.$patient['id'].'">Consultez ce profil</a><br>';
    echo '<a href="./traitements/delete-patient-traitement.php?id='.$patient['id'].'">Supprimer ce patient et ses rendez-vous</a><br><br><br>';
}

for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a> '; // complet ?
}

?>

<p><a href="./ajout-patient.php">Formulaire de création de patient</a></p>