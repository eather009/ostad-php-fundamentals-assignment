<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 5:Weather Report</title>
</head>
<body>
<form method="post" action="">
    <label for="temperature">Temperature:</label>
    <input type="number" id="temperature" name="temperature" required
           value="<?php echo(!empty($_POST["temperature"]) ? $_POST['temperature'] : 0) ?>">
    <input type="submit" value="Report">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $temperature = $_POST["temperature"];

    if($temperature <=10){
        echo "It's freezing!";
    }elseif($temperature <=20){
        echo "It's cool!";
    }else{
        echo "It's warm!";
    }
}
?>
</body>
</html>
