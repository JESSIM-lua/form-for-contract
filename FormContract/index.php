<!-- Formulaire
	GitHub : JESSIM-lua
	Date : 13/12/2023
	Description : Page Principale  -->
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <title>Site PHP</title>

</head>
<body>
<!-- Un bouton pour afficher ou masquer un formulaire -->
<button id="toggle" class="btnn"><span class="text">Formulaire</span></button>

<!-- Un interrupteur pour activer/désactiver le mode sombre -->
<label class="switch" id="darkm">
      <input onclick="darkmode()" type="checkbox" id="darkModeToggle">
      <span class="slider round"></span>
</label>


<!-- Un formulaire avec différents champs et boutons -->
<form id="myForm" action="formulaire.php" method="post" hidden>

Entrez la Date: <input type="date" name="date">
Entrez le nombre d'exemplaire: <select name="var">
   <option value="1">1</option>
   <option value="2">2</option>
   <option value="3">3</option>
   <option value="4">4</option>
   <option value="5">5</option>
   <option value="6">6</option>
   <option value="7">7</option>
   <option value="8">8</option>
</select>
Entrez votre Nom : <input type="text" name="nom"> Entrez votre Prénom : <input type="text" name="prenom">

<input type="hidden" name="compteurInputs" value="<?php echo $compteurInputs; ?>">
<div id="conteneurInputs"></div>
<button id="ajouInput" type="button" class="btnn"><span class="text">Ajouter un Partenaire</span></button><br>
<button id="resetCanvas" type="button" class="btnn"><span class="text"> Supprimer la signature</span></button><br>

Nature des activités :
<input type="text" name="autre"><br>
Nom du Partenariat Commercial : 
<input type="text" name="autre2"><br>
Siège du Partenariat :
<input type="text" name="autre3" placeholder=""><br>
Début de l'accord:
<input type="text" name="DebutAcc" placeholder=""><br>
<button type="submit" id="sub" class="btnn"><svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle"><path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path></svg><span class="text">Soumettre</span></button>
</form>
<button class="btnn" id="admin" >PAGE ADMIN</button>


<script>
    // Script pour activer/désactiver le mode sombre
    function darkmode() {
        var element = document.body;
        element.classList.toggle("dark-mode");
    }
        // Sélectionnez le bouton par son ID
        var adminButton = document.getElementById("admin");

        // Ajoutez un gestionnaire d'événements pour le clic sur le bouton
        adminButton.addEventListener("click", function() {
            // Redirigez l'utilisateur vers admin.php
            window.location.href = "admin.php";
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="anim.js"></script>
<script src="scripts.js"></script>
</body>
</html> 
