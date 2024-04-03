<!-- Formulaire
	GitHub : JESSIM-lua
	Date : 13/12/2023
	Description :Page admin -->
    
<!DOCTYPE html>
<html>
<head>
    <title>Affichage et modification de données</title>
    <script>
        function showEditForm(id) {
            var editForm = document.getElementById('editForm' + id);
            editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php

// Config BDD
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


// Vérifier si une action de suppression est demandée
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];


    // Ensuite, supprimer l'enregistrement dans 'form'
    $stmt = $conn->prepare("DELETE FROM form WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Enregistrement supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    $stmt->close();
}


// Récupérer toutes les valeurs de la table 'form'
$sql = "SELECT * FROM form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<div class='table-responsive'>
    <table class='table'>
    <tr>
    <th>ID</th>
    <th>Date</th>
    <th>Var</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Autre</th>
    <th>Autre2</th>
    <th>Autre3</th>
    <th>DébutAcc</th>
    <th>Partenaire</th>
    <th>ContribPart</th>
    <th>Profit</th>
    <th>Actions</th>
    </tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row["id"]."</td>
    <td>".$row["date"]."</td>
    <td>".$row["var"]."</td>
    <td>".$row["nom"]."</td>
    <td>".$row["prenom"]."</td>
    <td>".$row["autre"]."</td>
    <td>".$row["autre2"]."</td>
    <td>".$row["autre3"]."</td>
    <td>".$row["DebutAcc"]."</td>
    <td>".$row["nouvelInput"]."</td>
    <td>".$row["contribPart"]."</td>
    <td>".$row["profit"]."</td>
    <td><a href='?action=delete&id=".$row["id"]."'>Supprimer</a> | <a href='#' onclick='showEditForm(".$row["id"].")'>Modifier</a></td>
    </tr>";

    echo "<tr id='editForm".$row["id"]."' style='display: none;'>
        <td colspan='10'>
            <form action='modifier.php' method='post'>
                <input type='hidden' name='id' value='".$row["id"]."'>
                <input type='text' name='var' value='".$row["var"]."'>
                <input type='text' name='nom' value='".$row["nom"]."'>
                <input type='text' name='prenom' value='".$row["prenom"]."'>
                <input type='text' name='autre' value='".$row["autre"]."'>
                <input type='text' name='autre2' value='".$row["autre2"]."'>
                <input type='text' name='autre3' value='".$row["autre3"]."'>
                <input type='text' name='DebutAcc' value='".$row["DebutAcc"]."'>
                <input type='text' name='nouvelInput' value='".$row["nouvelInput"]."'>
                <input type='text' name='contribPart' value='".$row["contribPart"]."'>
                <input type='text' name='profit' value='".$row["profit"]."'>
                <input type='submit' value='Enregistrer'>
            </form>
        </td>
    </tr>";
}
echo "</table>
</div>";
} else {
    echo "0 résultats";
}


$conn->close();
?>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
