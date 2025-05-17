<?php
session_start();
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $sql = "SELECT * FROM konto WHERE login = ? AND haslo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $haslo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) 
    {
        $_SESSION['loggedin'] = true;
        header("Location: dodaj_produkt.php");
        exit();
    } 

    else 
        {echo "Nieprawidłowy login lub hasło.";}
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
        <h1>Logowanie do panelu administratora</h1>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">Strona Główna</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="koszyk.php">Koszyk</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="kontakt.html">Kontakt</a>
                        </li>
        
                        <li class="nav-item">
                            <a class="nav-link" href="onas.html">O nas</a>
                        </li>

                        <li class="nav-item">
                            <b><a class="nav-link active" href="#">Logowanie</a></b>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="https://zse.edu.gdansk.pl/pl" target="_blank">Strona szkoły</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
    </header><br>
<main>
    <div class="container">
        <form method="post" action="" id="z">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="haslo" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="haslo" name="haslo" required>
            </div>
            <button type="submit" class="btn btn-primary" id="in">Zaloguj się</button>
            
        </form>

        <form action="index.html" id="z">
            <button type="submit">Powrót do strony głównej</button>
        </form>
    </div>
</main>
    <footer>&copy;2024 Norbert Kozikowski</footer>
</body>
</html>