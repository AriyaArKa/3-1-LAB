<?php
session_start();

class HospitalSystem
{
    private $hospitalID;
    private $beds;

    public function __construct($hospitalID, $beds)
    {
        $this->hospitalID = $hospitalID;
        $this->beds = $beds;
    }

    public function appoint($bedsNeeded)
    {
        // Check if appointment is valid
        if ($bedsNeeded > 0 && $bedsNeeded <= 20 && ($this->beds + $bedsNeeded) <= 500) {
            $this->beds += $bedsNeeded; // Increase occupied beds
            return true;
        }
        return false;
    }

    public function release($bedsToRelease)
    {
        // Check if release is valid (can't release more than occupied)
        if ($bedsToRelease > 0 && $bedsToRelease <= $this->beds) {
            $this->beds -= $bedsToRelease; // Decrease occupied beds
            return true;
        }
        return false;
    }

    public function showAvailableBeds()
    {
        return 500 - $this->beds; // Available = Total(500) - Occupied
    }

    public function getOccupiedBeds()
    {
        return $this->beds;
    }
}

// Initialize hospital system
if (!isset($_SESSION['hospitalSystem'])) {
    $_SESSION['hospitalSystem'] = new HospitalSystem("H001", 0); // Start with 0 occupied beds
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospitalSystem = $_SESSION['hospitalSystem'];
    
    if (isset($_POST['beds'])) {
        $beds = (int)($_POST['beds']);
        
        if (isset($_POST['appoint'])) {
            if ($hospitalSystem->appoint($beds)) {
                $message = "Appointment successful! $beds beds appointed.";
            } else {
                $message = "Appointment failed! Check limits (max 20 per day, total 500).";
            }
        } elseif (isset($_POST['release'])) {
            if ($hospitalSystem->release($beds)) {
                $message = "Release successful! $beds beds released.";
            } else {
                $message = "Release failed! Not enough occupied beds.";
            }
        }
    }
}

$hospitalSystem = $_SESSION['hospitalSystem'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
</head>
<body>
    <h2>Hospital Management System</h2>
    
    <?php if ($message): ?>
        <p style="color: blue;"><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>
    
    <form action="index.php" method="post">
        <label>Number of Beds:</label>
        <input type="number" name="beds" min="1" max="20" required>
        <br><br>
        <input type="submit" name="appoint" value="Appoint">
        <input type="submit" name="release" value="Release">
    </form>
    
    <br>
    <div>
        <strong>Hospital Status:</strong><br>
        Available Beds: <?php echo $hospitalSystem->showAvailableBeds(); ?><br>
        Occupied Beds: <?php echo $hospitalSystem->getOccupiedBeds(); ?><br>
        Total Beds: 500
    </div>
</body>
</html>