<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
function validaCheckBox($selezionaLettere, $selezionaNumeri, $selezionaSimboli)
{
    if ($selezionaLettere || $selezionaNumeri || $selezionaSimboli) {
        return true;
    }
    return false;
}
?>

<?php
$errore = '';
$selezionaLettere = isset($_GET['letter']) ? $_GET['letter'] : '';
$selezionaNumeri = isset($_GET['number']) ? $_GET['number'] : '';
$selezionaSimboli = isset($_GET['symbols']) ? $_GET['symbols'] : '';
$pswLength = isset($_GET['pswlength']) ? $_GET['pswlength'] : '';
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
}
?>

<?php
function generatorePassword($pswLength, $checkRadioRepeat, $useLetter, $useNumber, $useSymbol)
{
    $caratteriPossibili = '';
    $letter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $number = '123456789';
    $symbol = '!"#$%&\'()*+,-./:;<=>?@[]^_`{|}~';
    if ($useLetter) {
        $caratteriPossibili .=  $letter;
    }
    if ($useNumber) {
        $caratteriPossibili .= $number;
    }
    if ($useSymbol) {
        $caratteriPossibili .= $symbol;
    }
    $arrayCaratteri = str_split($caratteriPossibili);
}
?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Password Generator</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Strong Password Generator</h1>
        <h2 class="text-center">Genera una password sicura</h2>
        <?php
        if ($errore) {
            echo '<div class="alert alert-danger">' . $errore .  '</div>';
        }
        ?>
        <form action="" method="GET">
            <div class="row g-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="pswlength">Lunghezza password</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="pswlength" class="form-control" name="pswlength" value="pswlength">
                </div>
                <div class="row g-3 align-item-center justify-content-center">
                    <div class="col-auto">
                        <label for="">Consenti ripetizione di uno o più caratteri: </label>
                    </div>
                    <div class="col-auto">
                        <!-- Per le checkradio è importante dare lo stesso name in quanto fanno parte della stessa scelta e l'utente può scegliere solo una delle due e così php riceve solo il valore selezionato-->
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="checkradio" id="checkyes">
                            <label for="checkyes" class="form-check-label">Sì</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="checkradio" id="checkno" checked>
                            <label for="checkno" class="form-check-label">No</label>
                        </div>
                        <!-- Per le checkbox non serve dare lo stesso name in quanto l'utente può dare scelte multiple in questo modo php riceve le varie scelte selezionate-->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="letter" id="letter" name="letter">
                            <?php
                            $selezionaLettere = isset($_GET['letter']) ? $_GET['letter'] : ''
                            ?>
                            <label class="form-check-label" for="letter">
                                Lettere
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="number" id="number" name="number">
                            <?php
                            $selezionaNumeri = isset($_GET['number']) ? $_GET['number'] : ''
                            ?>
                            <label class="form-check-label" for="number">
                                Numeri
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="symbols" id="symbols" name="symbols">
                            <?php
                            $selezionaSimboli = isset($_GET['symbols']) ? $_GET['symbols'] : ''
                            ?>
                            <label class="form-check-label" for="symbols">
                                Simboli
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary btn-sm">Invia</button>
                    <button type="submit" class="btn btn-secondary btn-sm">Annulla</button>
                </div>
            </div>
            <?php
            $validazioneDati = validaCheckBox($selezionaLettere, $selezionaNumeri, $selezionaSimboli);
            ?>
        </form>
    </div>
</body>

</html>