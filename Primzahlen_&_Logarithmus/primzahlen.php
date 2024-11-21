<!DOCTYPE html>
<html>
<head>
    <title>Primzahlenberechnung</title>
</head>
<body>
    <form method="POST" action="">
        <label for="number">Gib eine Zahl ein:</label>
        <input type="number" name="number" id="number" required>
        <button type="submit">Berechnen</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $number = intval($_POST['number']);
        echo "<h2>Primzahlen von 1 bis $number:</h2>";
        for ($i = 2; $i <= $number; $i++) {
            $isPrime = true;
            for ($j = 2; $j <= $i / 2; $j++) {
                if ($i % $j === 0) {
                    $isPrime = false;
                    break;
                }
            }
            if ($isPrime) {
                echo $i . " ";
            }
        }
    }
    ?>
</body>
</html>
