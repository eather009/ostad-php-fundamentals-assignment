<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 2: Temperature Converter</title>
</head>
<body>
<form method="post" action="">
    <label for="temperature_value">Temperature:</label>
    <input type="number" id="temperature_value" name="temperature_value" required value="<?php echo (!empty($_POST["temperature_value"]) ? $_POST['temperature_value']:0) ?>">
    <br>
    <label for="conversion_type">Conversion Type:</label>
    <select id="conversion_type" name="conversion_type" required>
        <option value="celsius_fahrenheit" <?php echo (!empty($_POST["conversion_type"]) && $_POST["conversion_type"]==='celsius_fahrenheit' ? 'selected':'') ?>>Celsius to Fahrenheit</option>
        <option value="fahrenheit_celsius" <?php echo (!empty($_POST["conversion_type"]) && $_POST["conversion_type"]==='fahrenheit_celsius' ? 'selected':'') ?>>Fahrenheit to Celsius</option>
    </select>
    <br>
    <input type="submit" value="Convert">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $temperature_value = $_POST["temperature_value"];
    $conversion_type = $_POST["conversion_type"];
    $response = "";

    if ($conversion_type === "celsius_fahrenheit") {
        $response = ($temperature_value * 9/5) + 32;
    } elseif ($conversion_type === "fahrenheit_celsius") {
        $response = ($temperature_value - 32) * 5/9;
    }
    echo "<p>$response</p>";
}
?>
</body>
</html>
