<!-- Formulaire
	GitHub : JESSIM-lua
	Date : 13/12/2023
	Description : Page de validation du formulaire -->
    
    <?php
	Session_start();
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="formulaire.css">
    <title>Site PHP</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $var = $_POST['var'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $autre = $_POST['autre'];
    $autre2 = $_POST['autre2'];
    $autre3 = $_POST['autre3'];
    $DebutAcc = $_POST['DebutAcc'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulaire";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }


    $sql = "INSERT INTO form (date, var, nom, prenom, autre, autre2, autre3, DebutAcc)
    VALUES ('$date', '$var', '$nom', '$prenom', '$autre', '$autre2', '$autre3', '$DebutAcc')";

    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été ajoutées avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Insérer les données des partenaires ici
    $valeursPartenaires = $_POST['partenaire'];

foreach ($valeursPartenaires as $partenaire) {
    $nouvelInput = $partenaire['nouvelInputZ'];
    $contribPart = $partenaire['contribPartZ'];
    $profit = $partenaire['profitZ'];

    $sqlPartenaire = "INSERT INTO form (nouvelInput, contribPart, profit)
    VALUES ('$nouvelInput', '$contribPart', '$profit')";

    if ($conn->query($sqlPartenaire) !== TRUE) {
        echo "Erreur lors de l'insertion du partenaire : " . $conn->error;
    }
}


    $conn->close();
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérification si la clé 'partenaires' existe dans les données POST
    if (isset($_POST['partenaires'])) {
        // Récupération des données envoyées
        $valeursPartenaires = $_POST['partenaires'];

        // Parcours des données reçues
        foreach ($valeursPartenaires as $partenaire) {
            // Parcours des valeurs de chaque partenaire
            foreach ($partenaire as $key => $value) {
                echo ucfirst($key) . " : $value<br>";
            }
            echo "<br>";
        }
    } else {
        echo "Aucune donnée de partenaires reçue.";
    }
} else {
    echo "La méthode de requête n'est pas valide.";
}
?>

<?php
function sanitizeInput($input) {
    return htmlspecialchars($input);
}

define('COMPT_INPUTS', 'compteurInputs');
define('PREFIX_INPUT', 'nouvelInput');

// Vérifie la méthode de la requête et la présence des données requises
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST[COMPT_INPUTS])) {
    $numInputs = filter_input(INPUT_POST, COMPT_INPUTS, FILTER_VALIDATE_INT);

    if ($numInputs !== false && $numInputs > 0) {
        $dataToPass = '';

        // Récupère les valeurs des champs du formulaire
        for ($i = 1; $i <= $numInputs; $i++) {
            $inputName = PREFIX_INPUT . $i;
            if (isset($_POST[$inputName])) {
                $fieldValue = sanitizeInput($_POST[$inputName]);
                $dataToPass .= "&fieldValue$i=" . urlencode($fieldValue);
            }
        }

        // Redirige vers la page de génération du PDF avec les données en GET
        $redirect_url = 'generate_pdf.php' . ltrim($dataToPass, '&');
        header("Location: " . $redirect_url);
        exit();
    }
}

// Récupère d'autres données du formulaire
$date = isset($_POST["date"]) ? sanitizeInput($_POST["date"]) : '';
$prenom = isset($_POST["prenom"]) ? sanitizeInput($_POST["prenom"]) : '';
$nom = isset($_POST["nom"]) ? sanitizeInput($_POST["nom"]) : '';
$var = isset($_POST["var"]) ? sanitizeInput($_POST["var"]) : '';
$autre = isset($_POST["autre"]) ? sanitizeInput($_POST["autre"]) : '';
$autre2 = isset($_POST["autre2"]) ? sanitizeInput($_POST["autre2"]) : '';
$autre3 = isset($_POST["autre3"]) ? sanitizeInput($_POST["autre3"]) : '';
$DebutAcc = isset($_POST["DebutAcc"]) ? sanitizeInput($_POST["DebutAcc"]) : '';


// Construction de l'URL pour la redirection
$redirect_url = 'generate_pdf.php?' . http_build_query([
    'date' => $date,
    'prenom' => $prenom,
    'nom' => $nom,
    'var' => $var,
    'autre' => $autre,
    'autre2' => $autre2,
    'autre3' => $autre3,
    'DebutAcc' => $DebutAcc,
]);

header("Location: " . $redirect_url);
exit;
?>

<button><a href="index.php">Formulaire</a></button>
    <h1><strong>Contrat de partenariat commercial</strong></h1>
    <div>
        <p>Ce contrat est fait ce jour <?php echo isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : ''; ?>
        en <?php echo isset($_POST["var"]) ? htmlspecialchars($_POST["var"]) : ''; ?>
        copies originales, entre <?php echo isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : ''; ?> 
        <?php echo isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : ''; ?> <?php

    ?>

</p>
    </div>

    
    <div>
        <h2>1. NOM DU PARTENARIAT ET ACTIVITÉ</h2>
        <p>
            <div>1.2 Nom: Les Partenaires cités ci-dessus donnent leur accord, pour que le partenariat
                commercial soit exercé sous le nom: <?php echo isset($_POST["autre"]) ? htmlspecialchars($_POST["autre"]) : ''; ?><br>
            </div>
            1.3 Adresse officielle: Les Partenaires cités ci-dessus donnent leur accord pour que le siège
            du partenariat commercial soit: <?php echo isset($_POST["autre2"]) ? htmlspecialchars($_POST["autre2"]) : ''; ?><br>
            <div>2. TERMES</div>
            2.1 Le partenariat commence le <?php echo isset($_POST["autre3"]) ? htmlspecialchars($_POST["autre3"]) : ''; ?><br> 
            et continue jusqu'à la fin de cet accord.
            <div>3. CONTRIBUTION AU PARTENARIAT</div>
            3.1 La contribution de chaque partenaire au capital listée ci-dessous se compose des éléments
            suivants:
        </p>
    </div>

    <button id="genpdf" type="button">Générer PDF</button>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#genpdf").click(function() {
            $.ajax({
                type: "POST",
                url: "generate_pdf.php",
                data: {
                    date: "<?php echo isset($_POST["date"]) ? htmlspecialchars($_POST["date"]) : ''; ?>",
                    var: "<?php echo isset($_POST["var"]) ? htmlspecialchars($_POST["var"]) : ''; ?>",
                    nom: "<?php echo isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : ''; ?>",
                    prenom: "<?php echo isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : ''; ?>",
                },
                success: function(response) {
                    window.location.href = 'generate_pdf.php';
                }
            });
        });
    });
</script>

</body>
</html>
