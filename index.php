<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
require_once './functions.php';
$errore = '';
$selezionaLettereMinuscole = '';
$selezionaLettereMaiuscole = '';
$selezionaNumeri = '';
$selezionaSimboli = '';
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&family=DynaPuff:wght@400..700&family=Fascinate+Inline&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Password Generator</title>
</head>

<body class="bg-black bg-gradient">
    <div class="container border border-3 border-white rounded mt-5 mb-5 bg-dark bg-gradient">
        <h1 class="text-center text-light mt-5 mb-4">Strong Password Generator</h1>
        <h2 class="text-center text-light mb-5">Genera una password sicura</h2>
        <?php
        if ($errore) {
            echo '<div class="alert alert-danger">' . $errore .  '</div>';
        }
        ?>
        <form action="./result.php" method="GET">
            <div class="row justify-content-around">
                <div class="col-4 mt-5">
                    <label for="pswlength" class="form-label text-light">Lunghezza password</label>
                </div>
                <div class="col-4 mb-4 mt-5">
                    <input type="number" id="pswlength" class="form-control text-center" name="pswlength" value="" min="12" max="15" placeholder="min:12 max:15">
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-4">
                    <label class="form-label text-light">Consenti ripetizione di uno o più caratteri:</label>
                </div>
                <div class="col-4 mb-4">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="checkradio" id="checkyes" value="Sì" <?php if (isset($_GET['checkradio']) && $_GET['checkradio'] === 'Sì') echo 'checked'; ?>>
                        <label for="checkyes" class="form-check-label text-light">Sì</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="checkradio" id="checkno" value="No" <?php if (isset($_GET['checkradio']) && $_GET['checkradio'] === 'No') echo 'checked'; ?>>
                        <label for="checkno" class="form-check-label text-light">No</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-4">
                    <label class="form-label text-light">Caratteri ammessi:</label>
                </div>
                <div class="col-4 mb-5">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="letterLowercase" id="letterLowercase" name="letterLowercase" <?php if (!empty($selezionaLettereMinuscole)) echo 'checked'; ?>>
                        <label class="form-check-label text-light" for="letterLowercase">Lettere minuscole</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="letterUppercase" id="letterUppercase" name="letterUppercase" <?php if (!empty($selezionaLettereMaiuscole)) echo 'checked'; ?>>
                        <label class="form-check-label text-light" for="letterUppercase">Lettere maiuscole</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="number" id="number" name="number" <?php if (!empty($selezionaNumeri)) echo 'checked'; ?>>
                        <label class="form-check-label text-light" for="number">Numeri</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="symbols" id="symbols" name="symbols" <?php if (!empty($selezionaSimboli)) echo 'checked'; ?>>
                        <label class="form-check-label text-light" for="symbols">Simboli</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success btn-sm me-5 px-5">Invia</button>
                    <a href="index.php" class="btn btn-danger btn-sm px-5">Annulla</a>
                </div>
            </div>
            <?php
            $validazioneDati = validaCheckBox($selezionaLettereMinuscole, $selezionaLettereMaiuscole, $selezionaNumeri, $selezionaSimboli);
            ?>
        </form>
    </div>
</body>

</html>