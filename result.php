<?php
require_once './functions.php';
include_once './header.php';
?>
<?php
$errore = '';
$selezionaLettere = isset($_GET['letter']) ? $_GET['letter'] : '';
$selezionaNumeri = isset($_GET['number']) ? $_GET['number'] : '';
$selezionaSimboli = isset($_GET['symbols']) ? $_GET['symbols'] : '';
$pswLength = isset($_GET['pswlength']) ? $_GET['pswlength'] : '';
$checkRipetizioneCaratteri = (isset($_GET['checkradio']) && $_GET['checkradio'] === 'Sì');
$validazioneDati = validaCheckBox($selezionaLettere, $selezionaNumeri, $selezionaSimboli);
// Validazione lunghezza password e presenza selezione checkbox
//controllo con empty che è una funzione che guarda se una variabile è vuota o meno
//controllo con is_numeric che è una funzione che guarda che l'utente abbia rispettato il range della lunghezza numerica
if (!empty($_GET)) {
    if (!$validazioneDati) {
        $errore = 'Devi selezionare almeno una tipologia di caratteri!';
    } elseif (!is_numeric($pswLength) || $pswLength < 12 || $pswLength > 15) {
        $errore = 'La lunghezza della password deve essere un numero tra 12 e 15.';
    }
};
// qui !empty($_GET) controlla che i parametri in GET non siano vuoti
// mentre empty($errore) controlla che non ci siano errori quindi che la variabile $errore sia vuota
if (!empty($_GET) && empty($errore)) {
    $passwordGenerata = generatorePassword($pswLength, $checkRipetizioneCaratteri, !empty($selezionaLettere), !empty($selezionaNumeri), !empty($selezionaSimboli));
    if (empty($passwordGenerata)) {
        $errore = 'Impossibile creare la password con i criteri selezionati!';
    }
}

?>
<?php
if (!empty($passwordGenerata) && empty($errore)) {
    echo '<div class="d-flex justify-content-center mt-3">';
    echo '<div class="alert alert-success">' . 'La tua password supersicura è: ' . $passwordGenerata . '</div>';
    echo '</div>';
    echo '<div class="d-flex justify-content-center mt-3">';
    echo '<a href = "./index.php" class="btn btn-secondary mt-2"> Torna al form </a>';
    echo '</div>';
}
?>
<?php
if (!empty($errore)) {
    echo '<div class="d-flex justify-content-center mt-3">';
    echo '<div class="alert alert-danger mt-3">' . $errore . '</div>';
    echo '</div>';
    echo '<div class="d-flex justify-content-center mt-3">';
    echo '<a href = "./index.php" class="btn btn-secondary mt-2"> Torna al form </a>';
    echo '</div>';
}
?>