<?php
// Vérification de la présence des paramètres nécessaires
if (isset($_GET["date"]) && isset($_GET["prenom"]) && isset($_GET["nom"]) && isset($_GET["var"]) && isset($_GET["autre"]) && isset($_GET["autre2"]) && isset($_GET["autre3"]) && isset($_GET["DebutAcc"])) {
    // Inclusion de la classe TCPDF
    require_once('tcpdf/tcpdf.php');

    // Récupération et nettoyage des valeurs des paramètres GET
    $date = htmlspecialchars($_GET["date"]);
    $prenom = htmlspecialchars($_GET["prenom"]);
    $nom = htmlspecialchars($_GET["nom"]);
    $var = htmlspecialchars($_GET["var"]);
    $autre = htmlspecialchars($_GET["autre"]);
    $autre2 = htmlspecialchars($_GET["autre2"]);
    $autre3 = htmlspecialchars($_GET["autre3"]);
    $DebutAcc = htmlspecialchars($_GET["DebutAcc"]);
    // $partenaires = $_GET["partenaires"];


    
    // Création d'une nouvelle instance de TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Nom du fichier PDF à générer
    $nom_fichier = 'document.pdf';

    // Ajout d'une nouvelle page au PDF
    $pdf->AddPage();

    // Construction du contenu HTML à inclure dans le PDF
    $html = '<p><h1>CONTRAT DE PARTENARIAT COMMERCIAL</h1><br>
    Ce contrat est fait ce jour ' . $date . 'en<br>
    ' . $var .' copies originales, entre ' . $nom . ' ' . $prenom .  ' et <br>
    (1) <br>
    1. NOM DU PARTENARIAT ET ACTIVITE<br>
    ' . $autre2 . ' <br>
    1.1 Nature des activités: Les Partenaires cités ci-dessus donnent leur accord d\'être<br>
    considérés comme des partenaires commerciaux pour les fins suivantes :<br>
   ' . $autre . ' <br>
    1.2 Nom: Les Partenaires cités ci-dessus donnent leur accord, pour que le partenariat<br>
    commercial soit exercé sous le nom:<br>

    1.3 Adresse officielle: Les Partenaires cités ci-dessus donnent leur accord pour que le siège<br>
    du partenariat commercial soit:<br>
    '. $autre3 . '<br>
    2. TERMES<br>
    2.1 Le partenariat commence le ' . $DebutAcc . ' et continue jusqu\'à la<br>
    fin de cet accord.<br>
    3. CONTRIBUTION AU PARTENARIAT<br>
    3.1 La contribution de chaque partenaire au capital listée ci-dessous se compose des éléments<br>
    suivants :<br>

    4. RÉPARTITION DES BÉNÉFICES ET DES PERTES<br>
    4.1 Les Partenaires se partageront les profits et les pertes du partenariat commercial de la<br>
    manière suivante :<br>
   ______<br>
    5. PARTENAIRES ADDITIONNELS<br>
    5.1 Aucune personne ne peut être ajoutée en tant que partenaire et aucune autre autre activité<br>
    ne peut être menée par le partenariat sans le consentement écrit de tous les partenaires.<br>
    6.MODALITÉS BANCAIRES ET TERMES FINANCIERS<br>
    6.1 Les Partenaires doivent avoir un compte bancaire au nom du partenariat sur lequel les<br>
    chèques doivent être signés par au moins 50% des Partenaires.<br>
    6.2 Les Partenaires doivent tenir une comptabilité complète du partenariat et la rendre<br>
    disponible à tous les Partenaires à tout moment.<br>
    7. GESTION DES ACTIVITÉS DE PARTENARIAT<br>
    7.1 Chaque partenaire peut prendre part dans la gestion du partenariat.<br>
    7.2 Tout désaccord qui intervient dans l\'exploitation du partenariat, sera réglé par les<br>
    partenaires détenant la majorité des parts du partenariat.<br>
    8. DÉPART D\'UN PARTENAIRE COMMERCIAL<br>
    8.1 Si un partenaire se retire du partenariat commercial pour une raison quelconque, y<br>
    compris le décès, les autres partenaires peuvent continuer à exploiter le partenariat sous le<br>
    même nom.<br>
    8.2 Le partenaire qui se retire est tenu de donner un préavis écrit d\'au moins soixante (60)<br>
    jours de son intention de se retirer et est tenu de vendre ses parts du partenariat commercial.<br>
    8.3 Aucun partenaire ne doit céder ses actions dans le partenariat commercial à une autre<br>
    partie sans le consentement écrit des autres partenaires.<br>
    8.4 Le ou les partenaires restants paieront au partenaire qui se retire, ou au représentant légal<br>
    du partenaire décédé ou handicapé, la valeur de ses parts dans le partenariat, ou (a) la somme<br>
    de son capital, (b) des emprunts impayés qui lui sont dus, c) sa quote-part des bénéfices nets<br>
    cumulés non distribués dans son compte, et (d) son intérêt dans toute plus-value<br>
    préalablement convenue de la valeur du partenariat par rapport à sa valeur comptable.<br>
    Aucune valeur de bonne volonté ne doit être incluse dans la détermination de la valeur des<br>
    parts du partenaire.<br>
    9. CLAUSE DE NON CONCURRENCE<br>
    9.1 Un partenaire qui se retire du partenariat ne doit pas s\'engager directement ou<br>
    indirectement dans une entreprise qui est ou serait en concurrence avec la nature des activités<br>
    actuelles ou futures du partenariat pendant une période de 1 ans.<br>
    10. MODIFICATION DE L’ACCORD DE PARTENARIAT<br>
    10. 1 Ce contrat de partenariat commercial ne peut être modifié sans le consentement écrit de<br>
    tous les partenaires.<br>
    11. DIVERS<br>
    11.1 Si une disposition ou une partie d\'une disposition de la présente convention de<br>
    partenariat commercial est non applicable pour une quelconque raison, elle sera dissociée<br>
    sans affecter la validité du reste de la convention.<br>
    11.2 Cet accord de partenariat commercial lie les partenaires commerciaux et pourra servir à<br>
    leurs héritiers, exécuteurs testamentaires, administrateurs, représentants personnels,<br>
    successeurs et ayants droit respectifs.<br>
    12. JURIDICTION<br>
    12.1 Le présent contrat de partenariat commercial est régi par les lois de l\’État de<br>
    _________________________________.<br>
    Solennellement affirmé à ____________________ )<br>
    Daté de ce jour '. $date .' )<br>
    Signé, validé et livré en présence de: )<br>
    (1) ___________________________________________ )<br>
    
    Par moi: ' . $nom . ' ' . $prenom .  ' $<br>
    )<br>
    )<br>
    )<br>
    )<br>
     )<br>
    (Nom de l\'avocat)</p>';

    // Ajout du contenu HTML dans le PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Génération du fichier PDF et envoi au navigateur pour téléchargement
    $pdf->Output($nom_fichier, 'D');
    
} else {
    // Si des paramètres sont manquants, les identifier et renvoyer un message d'erreur
    $parametres_manquants = [];

    if (!isset($_GET["date"])) {
        $parametres_manquants[] = "date";
    }
    if (!isset($_GET["prenom"])) {
        $parametres_manquants[] = "prenom";
    }
    if (!isset($_GET["nom"])) {
        $parametres_manquants[] = "nom";
    }
    if (!isset($_GET["var"])) {
        $parametres_manquants[] = "var";
    }
    if (!isset($_GET["autre"])) {
        $parametres_manquants[] = "autre";
    }
    if (!isset($_GET["autre2"])) {
        $parametres_manquants[] = "autre2";
    }
    if (!isset($_GET["autre3"])) {
        $parametres_manquants[] = "autre3";
    }
    if (!isset($_GET["DebutAcc"])) {
        $parametres_manquants[] = "DebutAcc";
    }
    // if (!isset($_GET["partenaires"])) {
    //     $parametres_manquants[] = "partenaires";
    // }
    echo "Les paramètres suivants sont manquants : " . implode(", ", $parametres_manquants);
}
?>
