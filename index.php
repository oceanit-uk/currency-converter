<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
</head>
<body>
<h2>Simple Currency Converter</h2>
<form method="post">
    <input type="number" step="0.01" name="amount" placeholder="Amount" required>
    <select name="from_currency">
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
    </select>
    →
    <select name="to_currency">
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
    </select>
    <br>
    <button type="submit">Convert</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = floatval($_POST["amount"]);
    $from = $_POST["from_currency"];
    $to = $_POST["to_currency"];
    $rate = 0.91; // 1 USD = 0.91 EUR
    if ($from == $to) {
        $converted = $amount;
    } elseif ($from == "USD" && $to == "EUR") {
        $converted = $amount * $rate;
    } elseif ($from == "EUR" && $to == "USD") {
        $converted = $amount / $rate;
    }
    echo "<p>Converted Amount: " . number_format($converted, 2) . " $to</p>";
}
?>
</body>
</html>
