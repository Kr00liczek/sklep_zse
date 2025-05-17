<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['loggedin'])) 
{
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];

    $sql = "INSERT INTO produkty (nazwa, cena, opis) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $nazwa, $cena, $opis);
    if ($stmt->execute()) 
        {echo "Produkt został dodany pomyślnie.";} 
    else 
        {echo "Błąd: " . $stmt->error;}
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Produkt</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <center><h2>Dodaj nowy produkt</h2></center>
        <form method="post" action="" id="z">
            <div class="mb-3">
                <label for="nazwa" class="form-label">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" name="nazwa" required>
            </div>
            <div class="mb-3">
                <label for="cena" class="form-label">Cena</label>
                <input type="number" step="0.01" class="form-control" id="cena" name="cena" required>
            </div>
            <div class="mb-3">
                <label for="opis" class="form-label">Opis</label>
                <textarea class="form-control" id="opis" name="opis" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="in">Dodaj produkt</button>
                
        </form>
        
        <form method="post" action="logout.php" id="z" style="float:right;">
            <button type="submit" class="btn btn-danger" id="out">Wyloguj</button>
        </form>
        
    </div>
</body>
</html>