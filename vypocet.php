<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulátor budoucí hodnoty</title>
    <!-- Přidání Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Kalkulátor budoucí hodnoty peněz</h1>
    <form action="vypocet.php" method="POST">
        <div class="mb-3">
            <label for="sazba" class="form-label">Sazba (%)</label>
            <input type="number" class="form-control" id="sazba" name="sazba" required step="0.01" min="0" max="100">
        </div>
        <div class="mb-3">
            <label for="cas" class="form-label">Čas (roky)</label>
            <input type="number" class="form-control" id="cas" name="cas" required step="0.01" min="0" max="100">
        </div>
        <div class="mb-3">
            <label for="hodnota" class="form-label">Současná hodnota peněz</label>
            <input type="number" class="form-control" id="hodnota" name="hodnota" required min="0" max="1000000000">
        </div>
        <button type="submit" class="btn btn-primary">Vypočítat</button>
    </form>
</div>

<!-- Přidání Bootstrap JS a jQuery (pro Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulátor budoucí hodnoty</title>
    <!-- Přidání Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <?php
    function isValidInput($value, $min, $max) {
        return is_numeric($value) && $value >= $min && $value <= $max;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sazba = $_POST["sazba"];
        $cas = $_POST["cas"];
        $hodnota = $_POST["hodnota"];

        // Kontrola vstupů
        if (isValidInput($sazba, 0, 100) && isValidInput($cas, 0, 100) && isValidInput($hodnota, 0, 1000000000)) {
            // Výpočet budoucí hodnoty peněz
            $budouciHodnota = $hodnota * pow((1 + ($sazba / 100)), $cas);

            // Zaokrouhlení na celá čísla
            $budouciHodnota = round($budouciHodnota);

            // Výstup s výsledkem
            echo "<h2>Výsledek</h2>";
            echo "Budoucí hodnota peněz po " . $cas . " letech při sazbě " . $sazba . "% je: " . $budouciHodnota;
        } else {
            // Neplatné vstupy, znovu zobrazíme formulář s chybovou zprávou
            echo "<p class='text-danger'>Prosím, zkontrolujte a zadejte platné hodnoty.</p>";
            include 'index.html';
        }
    } else {
        // Pokud formulář nebyl odeslán, znovu zobrazíme formulář
        include 'index.html';
    }
    ?>

</div>

<!-- Přidání Bootstrap JS a jQuery (pro Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>