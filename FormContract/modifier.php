<!-- Formulaire
	GitHub : JESSIM-lua
	Date : 13/12/2023
	Description : modification du $sql -->

<?php
$servername = "localhost"; // Nom d'hôte
$username = "root"; // Nom d'utilisateur
$password = ""; // Mot de passe
$dbname = "formulaire"; // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $var = $_POST['var'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $autre = $_POST['autre'];
    $autre2 = $_POST['autre2'];
    $autre3 = $_POST['autre3'];
    $debutAcc = $_POST['DebutAcc'];

    // Préparer et exécuter la requête de mise à jour
    $stmt = $conn->prepare("UPDATE form SET var = ?, nom = ?, prenom = ?, autre = ?, autre2 = ?, autre3 = ?, DebutAcc = ? WHERE id = ?");
    $stmt->bind_param("sssssssi", $var, $nom, $prenom, $autre, $autre2, $autre3, $debutAcc, $id);

    if ($stmt->execute()) {
        echo "Enregistrement mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

echo "<a href='admin.php'>Retour</a>";
?>
