<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adăugare produs</title>
    <!-- Adaugă link către librăria Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Procesarea formularului de adăugare a produsului
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectare la baza de date
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "produse";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifică conexiunea
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $nume = $_POST["nume"];
    $pret = $_POST["pret"];
    $imagine = $_FILES["imagine"]["name"];
    
    // Încarcă imaginea pe server
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["imagine"]["name"]);
    move_uploaded_file($_FILES["imagine"]["tmp_name"], $target_file);
    
    // Inserează produsul în baza de date
    $sql = "INSERT INTO produse (nume, pret, imagine) VALUES ('$nume', '$pret', '$imagine')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Produs adăugat cu succes!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Eroare: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Închide conexiunea
    $conn->close();
}
?>

<div class="container mt-5">
    <h2>Adăugare produs</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nume">Nume produs:</label>
            <input type="text" class="form-control" id="nume" name="nume">
        </div>
        <div class="form-group">
            <label for="pret">Preț produs:</label>
            <input type="text" class="form-control" id="pret" name="pret">
        </div>
        <div class="form-group">
            <label for="imagine">Imagine produs:</label>
            <input type="file" class="form-control-file" id="imagine" name="imagine">
        </div>
        <button type="submit" class="btn btn-primary">Adaugă produs</button>
    </form>
</div>

</body>
</html>
