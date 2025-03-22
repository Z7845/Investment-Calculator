<?php
    include("connection.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
        input[type="submit"]{
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Investment Calculator</h1>
    <form  method="post">
    <label>Date:</label>
    <input type="int" id="date" name="dt" placeholder="YYYY/MM/DD">

    <label for="amountInvested">Amount Invested:</label>
    <input type="number" id="amountInvested" placeholder="Enter amount invested" name="ai">

    <label for="amountEarned">Amount Earned:</label>
    <input type="number" id="amountEarned" placeholder="Enter amount earned" name="ae">
    
    <input type="submit" name="btn" id="btn" value="Submit Details"><br><br>
    <div class="result" id="result"></div>
    </form>
    <button onclick="calculateProfitLoss()">Calculate Profit/Loss</button>

</div>

<script>
    function calculateProfitLoss() {
        const amountInvested = parseFloat(document.getElementById('amountInvested').value);
        const amountEarned = parseFloat(document.getElementById('amountEarned').value);
        
        if (isNaN(amountInvested) || isNaN(amountEarned)) {
            document.getElementById('result').innerText = "Please enter valid numbers.";
            return;
        }

        const profitLoss = amountEarned - amountInvested;
        let resultText;

        if (profitLoss > 0) {
            resultText = `Profit: $${profitLoss.toFixed(2)}`;
        } else if (profitLoss < 0) {
            resultText = `Loss: $${Math.abs(profitLoss).toFixed(2)}`;
        } else {
            resultText = "No Profit, No Loss.";
        }

        document.getElementById('result').innerText = resultText;
    }
</script>
<?php
    $con=mysqli_connect('localhost','root','','stake');
    if (isset($_POST['btn'])) {
        $date = $_POST['dt'];
        $amountInvested = $_POST['ai'];
        $amountEarned = $_POST['ae'];
        
        // Calculate net profit
        $netProfit = $amountEarned - $amountInvested;
    
        // Prepare the SQL query
        $query = "INSERT INTO `details` (`date`, `amountinvested`, `amountearned`, `netprofit`) VALUES ('$date', '$amountInvested', '$amountEarned', '$netProfit')";
        
        // Execute the query
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Data submitted successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    }
    
    // Close the database connection
    mysqli_close($con);
    ?>

</body>
</html>