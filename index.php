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
        <form action="" method="GET">
            <div class="row g-3 align-items-center justify-content-center">
                <div class="col-auto">
                    <label for="pswlength">Lunghezza password</label>
                </div>
                <div class="col-auto">
                    <input type="password" id="pswlength" class="form-control" name="pswlength">
                </div>
                <div class="row g-3 align-item-center justify-content-center">
                    <div class="col-auto">
                        <label for="">Consenti ripetizione di uno o più caratteri: </label>
                    </div>
                    <div class="col-auto">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="checkradio" id="checkyes">
                            <label for="checkyes" class="form-check-label">Sì</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="checkradio" id="checkno" checked>
                            <label for="checkno" class="form-check-label">No</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="letter" name="letter">
                            <label class="form-check-label" for="letter">
                                Lettere
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="number" name="number">
                            <label class="form-check-label" for="number">
                                Numeri
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="symbols" name="symbols">
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
        </form>
    </div>
</body>

</html>