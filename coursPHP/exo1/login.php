<?php
session_start(); // Ajouter pour la gestion de session
include("connection.php");

if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pswd'];
    
    // 1. PROTECTION contre les injections SQL
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    // 2. REQUÊTE SQL CORRIGÉE (utiliser des apostrophes simples, pas des backticks)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    // 3. EXÉCUTION
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        // 4. COMPTAGE DES LIGNES
        $count = mysqli_num_rows($result);
        
        if($count == 1){
            // Authentification réussie
            $_SESSION['username'] = $username; // Stocker en session
            
            // Redirection
            header("Location: welcome.php");
            exit(); // IMPORTANT: arrêter l'exécution après header
        } else {
            // Échec
            echo "<script>
                alert('Login failed: invalid username or password');
                window.location.href = 'index.php'; // Retour à la page de login
            </script>";
        }
    } else {
        // Erreur de requête SQL
        echo "Erreur SQL: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    // Formulaire non soumis
    echo "<script>
        alert('Please submit the form');
        window.location.href = 'welcome.php';
    </script>";
}
?>