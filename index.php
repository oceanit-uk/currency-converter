<!DOCTYPE html>
<html>
<head>
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }
        .converter-box {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        p.result {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="converter-box">
        <h2>Currency Converter</h2>
        <form method="post">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" placeholder="Enter amount" required>

            <label for="from_currency">From Currency:</label>
            <select name="from_currency" required>
                <option value="">--Select--</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>

            <label for="to_currency">To Currency:</label>
            <select name="to_currency" required>
                <option value="">--Select--</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
            </select>

            <button type="submit">Convert</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = floatval($_POST["amount"]);
            $from = $_POST["from_currency"];
            $to = $_POST["to_currency"];

            // Example rates (USD base)
            $rates = [
                "USD" => 1,
                "EUR" => 0.91,
                "GBP" => 0.80
            ];

            if ($from == $to) {
                $converted = $amount;
            } elseif (isset($rates[$from]) && isset($rates[$to])) {
                // Convert to USD first, then to target currency
                $usdAmount = $amount / $rates[$from];
                $converted = $usdAmount * $rates[$to];
            } else {
                $converted = 0;
            }

            echo "<p class='result'>Converted Amount: " . number_format($converted, 2) . " $to</p>";
        }
        ?>
    </div>
</body>
</html>
