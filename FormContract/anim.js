// Formulaire
// 	GitHub : JESSIM-lua
// 	Date : 13/12/2023
// 	Description : JS de l'animation

// Pour faire apparaitre lle formulaire
$(document).ready(function () {
    $("#toggle").click(function () {
        $("form").fadeToggle(3600);

    });
});

// Lorsque l'élément avec l'ID "ajouInput" est cliqué
$('#ajouInput').click(function() {
    // Ajout d'une classe d'animation à l'élément "ajouInput"
    const submitButton = $('#ajouInput');
    submitButton.addClass('animate__animated animate__rubberBand');

    // Suppression de la classe d'animation après un certain délai (1000 millisecondes soit 1 seconde)
    setTimeout(function() {
        submitButton.removeClass('animate__animated animate__rubberBand');
    }, 1000);
});

// Lorsque l'élément avec l'ID "sub" est cliqué
$('#sub').click(function() {
    // Ajout d'une classe d'animation à l'élément "sub"
    const submitButton = $('#sub');
    submitButton.addClass('animate__animated animate__rubberBand');

    // Suppression de la classe d'animation après un certain délai (1000 millisecondes soit 1 seconde)
    setTimeout(function() {
        submitButton.removeClass('animate__animated animate__rubberBand');
    }, 1000);
});
