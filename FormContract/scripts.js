// Formulaire
// 	GitHub : JESSIM-lua
// 	Date : 13/12/2023
// 	Description : Les Scripts principaux

var compteurInputs = 1;
var canvasArray = [];

// Création de balisage quand on appuie sur ajouter un partenaire
document.getElementById("ajouInput").addEventListener("click", function() {
  var nouvelInputs3 = document.createElement("p");
  nouvelInputs3.textContent = "Partenaire " + compteurInputs + ":";

  var nouvelInput = document.createElement("input");
  nouvelInput.type = "text";
  nouvelInput.name = "nouvelInput" + compteurInputs;
  nouvelInput.placeholder = "Partenairee " + compteurInputs;

  var nouvelInputs = document.createElement("input");
  nouvelInputs.type = "text";
  nouvelInputs.name = "contribPart" + compteurInputs;
  nouvelInputs.placeholder = "Contribution du Partenaire " + compteurInputs;

  var nouvelInputs2 = document.createElement("input");
  nouvelInputs2.type = "text";
  nouvelInputs2.name = "profit" + compteurInputs;
  nouvelInputs2.placeholder = "Profit du Partenaire " + compteurInputs;

  var canvas = document.createElement("canvas");
  canvas.id = "signature-pad-" + compteurInputs; // Unique ID for each canvas
  canvas.width = "400";
  canvas.height = "200";
 

  document.getElementById("conteneurInputs").appendChild(nouvelInputs3);
  document.getElementById("conteneurInputs").appendChild(nouvelInput);
  document.getElementById("conteneurInputs").appendChild(nouvelInputs);
  document.getElementById("conteneurInputs").appendChild(nouvelInputs2);
  document.getElementById("conteneurInputs").appendChild(canvas);

  var signaturePad = new SignaturePad(canvas);

  canvasArray.push(canvas);

  compteurInputs++;
});

// reset le dernier canvas
document.getElementById("resetCanvas").addEventListener("click", function() {
  if (canvasArray.length > 0) {
    var lastCanvas = canvasArray.pop();

    var parentContainer = lastCanvas.parentNode;

    lastCanvas.parentNode.removeChild(lastCanvas);

    var newCanvas = document.createElement("canvas");
    newCanvas.id = lastCanvas.id;
    newCanvas.width = "400";
    newCanvas.height = "200";

    
    parentContainer.appendChild(newCanvas);
    canvasArray.push(newCanvas);
    
    var signaturePad = new SignaturePad(newCanvas);
  } else {
    console.log("Aucun canvas à réinitialiser.");
  }
});

function envoyerValeurs() {
  var valeursPartenaires = [];
  for (var i = 1; i < compteurInputs; i++) {
    var nouvelInputValue = $("input[name='nouvelInput" + i + "']").val();
    var contribPartValue = $("input[name='contribPart" + i + "']").val();
    var profitValue = $("input[name='profit" + i + "']").val();

    var partenaire = {
      nouvelInput: nouvelInputValue,
      contribPart: contribPartValue,
      profit: profitValue
    };

    valeursPartenaires.push(partenaire);
  }

  // Envoi des valeurs via une requête AJAX
  $.ajax({
    type: "POST",
    url: "formulaire.php",
    data: { partenaires: valeursPartenaires },
    success: function(response) {
      console.log("Données envoyées avec succès !");
      // Faire quelque chose avec la réponse si nécessaire
    },
    error: function(error) {
      console.error("Erreur lors de l'envoi des données :", error);
    }
  });
}

// Écouteur d'événement pour soumettre le formulaire
$('#sub').on('submit', function(e) {
  e.preventDefault();
  envoyerValeurs();
});


var canvass = document.getElementById('signature-pad' +  compteurInputs);
var ctx = canvass.getContext('2d');

// Dessinez quelque chose sur le canvas pour un exemple
ctx.fillStyle = 'red';
ctx.fillRect(50, 50, 200, 100);

// Convertir le contenu du canvas en une URL base64
var imageData = canvass.toDataURL('image/png');

// Mettre à jour la valeur de l'input hidden dans le formulaire
var form = document.getElementById('myForm');
var inputImageData = document.getElementById('imageData');
inputImageData.value = imageData;

// Soumettre le formulaire lorsque vous êtes prêt
form.submit();