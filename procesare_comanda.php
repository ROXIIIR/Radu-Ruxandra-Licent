<?php
// Conectare la baza de date
$servername = "localhost";
$username = "root"; // Schimbați cu numele de utilizator al bazei de date
$password = ""; // Schimbați cu parola bazei de date
$dbname = "comenzi"; // Schimbați cu numele bazei de date

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Preluarea datelor din formularul de checkout
$nume = $_POST['nume'];
$adresa = $_POST['adresa'];
$produse = $_POST['produse']; // Ar putea fi necesară o manipulare suplimentară pentru a formata produsele într-un mod adecvat pentru stocare în baza de date

// Salvarea datelor în baza de date
$sql = "INSERT INTO comenzi (nume, adresa, produse) VALUES ('$nume', '$adresa', '$produse')";

if ($conn->query($sql) === TRUE) {
    echo "Comanda a fost înregistrată cu succes!";
} else {
    echo "Eroare: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
