<?php

session_start();

class GradingSystem
{
    public $studentID;
    public $number;
    public $countA = 0;
    public $countB = 0;
    public $countC = 0;
    public $countF = 0;

    // Constructor
    public function __construct($studentID, $number, $countA, $countB, $countC, $countF)
    {
        $this->studentID = $studentID;
        $this->number = $number;
        $this->countA = $countA;
        $this->countB = $countB;
        $this->countC = $countC;
        $this->countF = $countF;
    }

    // Methods
    public function setGrade($num)
    {
        if ($num >= 80 && $num <= 100) {
            $_SESSION['countA'] = isset($_SESSION['countA']) ? $_SESSION['countA'] + 1 : 1;
            $this->countA = $_SESSION['countA'];
            return true;
        }
        if ($num >= 60 && $num <= 79) {
            $_SESSION['countB'] = isset($_SESSION['countB']) ? $_SESSION['countB'] + 1 : 1;
            $this->countB = $_SESSION['countB'];
            return true;
        }
        if ($num >= 40 && $num <= 59) {
            $_SESSION['countC'] = isset($_SESSION['countC']) ? $_SESSION['countC'] + 1 : 1;
            $this->countC = $_SESSION['countC'];
            return true;
        }
        if ($num >= 0 && $num <= 39) {
            $_SESSION['countF'] = isset($_SESSION['countF']) ? $_SESSION['countF'] + 1 : 1;
            $this->countF = $_SESSION['countF'];
            return true;
        }
        return false;
    }

    public function showGradeA()
    {
        return isset($_SESSION['countA']) ? $_SESSION['countA'] : 0;
    }
    public function showGradeB()
    {
        return isset($_SESSION['countB']) ? $_SESSION['countB'] : 0;
    }
    public function showGradeC()
    {
        return isset($_SESSION['countC']) ? $_SESSION['countC'] : 0;
    }
    public function showGradeF()
    {
        return isset($_SESSION['countF']) ? $_SESSION['countF'] : 0;
    }
}
if (!isset($_SESSION['gradingSystem'])) {
    $_SESSION['gradingSystem'] = new GradingSystem("", 0, 0, 0, 0, 0);
    $_SESSION['countA'] = 0;
    $_SESSION['countB'] = 0;
    $_SESSION['countC'] = 0;
    $_SESSION['countF'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gradingSystem = $_SESSION['gradingSystem'];
    if (isset($_POST['number']) && isset($_POST['studentid'])) {
        $number = (int)($_POST['number']);
        $studentID = $_POST['studentid'];
        $gradingSystem->studentID = $studentID; // Update student ID

        if (isset($_POST['submit'])) {
            $gradingSystem->setGrade($number);
            $_SESSION['gradingSystem'] = $gradingSystem;
        }
    }
}

// Get the gradingSystem for display
$gradingSystem = $_SESSION['gradingSystem'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LabTest</title>
</head>

<body>
    <h2>Grade Management System</h2>
    <form action="index.php" method="post">
        <label>Student Id:</label>
        <input type="text" name="studentid" required><br><br>
        <label>Number (0-100):</label>
        <input type="number" name="number" min="0" max="100" required><br><br>
        <input type="submit" value="Submit" name="submit">
    </form><br>
    <label>Current Number of A+:<?php echo $gradingSystem->showGradeA(); ?> </label><br>
    <label>Current Number of B+:<?php echo $gradingSystem->showGradeB(); ?> </label><br>
    <label>Current Number of C+:<?php echo $gradingSystem->showGradeC(); ?> </label><br>
    <label>Current Number of F:<?php echo $gradingSystem->showGradeF(); ?> </label>
</body>

</html>