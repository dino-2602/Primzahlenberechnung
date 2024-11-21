<!DOCTYPE html>
<html>
<head>
    <title>Logarithmische Kurve</title>
    <style>
        .log-line {
            font-family: monospace;
            white-space: pre;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Logarithmische Kurve berechnen</h2>
    <form method="POST" action="">
        <label for="maxNumber">Gib die maximale Zahl ein (z. B. 100):</label>
        <input type="number" name="maxNumber" id="maxNumber" required>
        <br><br>
        <label for="multiplier">Gib den Multiplikator ein (z. B. 10):</label>
        <input type="number" name="multiplier" id="multiplier" required>
        <br><br>
        <button type="submit">Berechnen</button>
    </form>
    
    <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Eingaben holen
            $maxNumber = intval($_POST['maxNumber']);
            $multiplier = intval($_POST['multiplier']);

            echo "<h3>Logarithmische Kurve für Zahlen von 1 bis $maxNumber mit Multiplikator $multiplier:</h3>";

            // Normalisieren, um eine glattere Kurve zu erhalten
            $minStars = 1; // Minimal 1 Stern
            $maxStars = $multiplier * 10; // Maximale Sternanzahl

            for ($i = 1; $i <= $maxNumber; $i++) {
                // Berechne den Logarithmus
                $logValue = log($i);

                // Skaliere und normalisiere die Werte, um die Kurve gleichmäßig zu machen
                $scaledValue = intval($maxStars - ($logValue / log($maxNumber)) * $maxStars);

                // Begrenze die Sternanzahl auf mindestens 1
                $scaledValue = max($scaledValue, $minStars);

                // Zeichne die Sterne
                echo "<div class='log-line'>" . str_repeat('*', $scaledValue) . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
