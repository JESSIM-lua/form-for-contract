<!-- Formulaire
	GitHub : JESSIM-lua
	Date : 13/12/2023
	Description : Update des Informations -->

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "formulaire";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $var = $_POST['var'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $autre = $_POST['autre'];
    $autre2 = $_POST['autre2'];
    $autre3 = $_POST['autre3'];
    $DebutAcc = $_POST['DebutAcc'];
    
    // Requête pour mettre à jour les données
    $update_sql = "UPDATE form SET date='$date', var='$var', nom='$nom', prenom='$prenom', autre='$autre', autre2='$autre2', autre3='$autre3', DebutAcc='$DebutAcc' WHERE id=$id";
    
    if ($conn->query($update_sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
    
}

// Fermer la connexion à la base de données
$conn->close();
?>
