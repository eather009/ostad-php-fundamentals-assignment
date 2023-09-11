<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 6:Comparison Tool</title>
</head>
<body>
<form method="post" action="">
    <label for="number">Number 1:</label>
    <input type="number" id="number1" name="number1" required
           value="<?php echo(!empty($_POST["number1"]) ? $_POST['number1'] : 0) ?>">
    <br>
    <label for="number">Number 2:</label>
    <input type="number" id="number2" name="number2" required
           value="<?php echo(!empty($_POST["number2"]) ? $_POST['number2'] : 0) ?>">
    <br>
    <input type="submit" value="Check">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];

    echo ($number1>$number2) ? $number1 : $number2;
}
?>
</body>
</html>
