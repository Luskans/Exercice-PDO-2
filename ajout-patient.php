<?php require_once('./traitements/connexion.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Accueil</a>

    <h2>Ajouter un patient</h2>

    <form action="./traitements/ajout-patient-traitement.php" method="post">
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname">
        <br>

        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname">
        <br>

        <label for="birthdate">Date de naissance :</label>
        <input type="date" name="birthdate">
        <br>

        <label for="phone">Téléphone :</label>
        <input type="tel" name="phone">
        <br>

        <label for="mail">Email :</label>
        <input type="email" name="mail">
        <br>

        <button type="submit">Envoyer</button>
    </form>

</body>

</html>