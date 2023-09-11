<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 3: Grade Calculator</title>
</head>
<body>
<form method="post" action="">
    <label for="grade_1">Grade 1:</label>
    <input type="number" id="grade_1" name="grade_1" required
           value="<?php echo(!empty($_POST["grade_1"]) ? $_POST['grade_1'] : 0) ?>">
    <br>
    <label for="grade_1">Grade 2:</label>
    <input type="number" id="grade_2" name="grade_2" required
           value="<?php echo(!empty($_POST["grade_2"]) ? $_POST['grade_2'] : 0) ?>">
    <br>
    <label for="grade_1">Grade 3:</label>
    <input type="number" id="grade_3" name="grade_3" required
           value="<?php echo(!empty($_POST["grade_3"]) ? $_POST['grade_3'] : 0) ?>">
    <br>
    <br>
    <input type="submit" value="Result">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $grade1 = $_POST["grade_1"];
    $grade2 = $_POST["grade_2"];
    $grade3 = $_POST["grade_3"];

    $averageGrade = (float)($_POST["grade_1"] + $_POST["grade_2"] + $_POST["grade_3"]) / 3;

    echo 'Average Score: ' . $averageGrade . '</br>';
    if ($averageGrade >= 70) {
        echo 'Grade: A';
    } elseif ($averageGrade >= 60) {
        echo 'Grade: B';
    } elseif ($averageGrade >= 50) {
        echo 'Grade: C';
    } elseif ($averageGrade >= 33) {
        echo 'Grade: D';
    } else {
        echo 'Grade: F';
    }
}
?>
</body>
</html>
