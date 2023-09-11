<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 4:Even or Odd Checker</title>
</head>
<body>
<form method="post" action="">
    <label for="number">Number:</label>
    <input type="number" id="number" name="number" required
           value="<?php echo(!empty($_POST["number"]) ? $_POST['number'] : 0) ?>">
    <input type="submit" value="Check">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = $_POST["number"];

    echo ($number%2===0) ? 'Even' : 'Odd';
}
?>
</body>
</html>
