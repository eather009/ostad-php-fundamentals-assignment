<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 7:Simple Calculator</title>
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
    <label for="operation_type">Operation:</label>
    <select id="operation_type" name="operation_type" required>
        <option value="addition" <?php echo (!empty($_POST["operation_type"]) && $_POST["operation_type"]==='addition' ? 'selected':'') ?>>Addition</option>
        <option value="subtraction" <?php echo (!empty($_POST["operation_type"]) && $_POST["operation_type"]==='subtraction' ? 'selected':'') ?>>Subtraction</option>
        <option value="multiplication" <?php echo (!empty($_POST["operation_type"]) && $_POST["operation_type"]==='multiplication' ? 'selected':'') ?>>Multiplication</option>
        <option value="division" <?php echo (!empty($_POST["operation_type"]) && $_POST["operation_type"]==='division' ? 'selected':'') ?>>Division</option>
    </select>
    <br>
    <input type="submit" value="Result">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $operation = $_POST["operation_type"];

    $result = 0;
    if($operation === 'addition'){
        $result = $number1 + $number2;
    }elseif($operation === 'subtraction'){
        $result = $number1 - $number2;
    }elseif($operation === 'multiplication'){
        $result = $number1 * $number2;
    }else{
        if($number2 <= 0){
            $result = 'Error: Can not divide by Zero';
        }else{
            $result = $number1 / $number2;
        }
    }

    echo "Result: $result";
}
?>
</body>
</html>
