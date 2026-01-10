<?php
function validaCheckBox($selezionaLettereMinuscole, $selezionaLettereMaiuscole, $selezionaNumeri, $selezionaSimboli)
{
    if ($selezionaLettereMinuscole || $selezionaLettereMaiuscole || $selezionaNumeri || $selezionaSimboli) {
        return true;
    }
    return false;
}
?>
<?php
function generatorePassword($pswLength, $checkRadioRepeat, $useLetterLowercase, $useLetterUppercase, $useNumber, $useSymbol)
{
    $caratteriPossibili = '';
    $letterLowercase = 'abcdefghijklmnopqrstuvwxyz';
    $letterUppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $number = '0123456789';
    $symbol = '!"#$%&\'()*+,-./:;<=>?@[]^_`{|}~';
    if ($useLetterLowercase) {
        $caratteriPossibili .=  $letterLowercase;
    }
    if ($useLetterUppercase) {
        $caratteriPossibili .= $letterUppercase;
    }
    if ($useNumber) {
        $caratteriPossibili .= $number;
    }
    if ($useSymbol) {
        $caratteriPossibili .= $symbol;
    }
    //str_split serve per trasformare una stringa in un array, dove ogni elemento dell’array corrisponde a un singolo carattere della stringa
    $arrayCaratteri = str_split($caratteriPossibili);

    $password = '';
    if ($checkRadioRepeat) {
        // Caso: ripetizione consentita
        for ($i = 0; $i < $pswLength; $i++) {
            $indiceCasuale = random_int(0, count($arrayCaratteri) - 1);
            $carattere = $arrayCaratteri[$indiceCasuale];
            $password .= $carattere;
        }
    } else {
        // Caso: ripetizione NON consentita
        if ($pswLength > count($arrayCaratteri)) {
            // Non ci sono abbastanza caratteri unici
            return '';
        }
        shuffle($arrayCaratteri); // Mischia l'array
        $password = implode('', array_slice($arrayCaratteri, 0, $pswLength));
    }
    return $password;
}
?>