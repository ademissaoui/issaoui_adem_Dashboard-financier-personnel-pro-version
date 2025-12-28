<?php
$pdo = new pdo("mysql:host=localhost;dbname=webtoup",'root',"");
$pdo->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
echo "parfait";
if(isset($_POST['enregistrer'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $age=$_POST['age'];
    $adresse=$_POST['adresse'];
    $ville=$_POST['ville'];
    $mail=$_POST['mail'];
    if(!empty($nom ) && empty($prenom) && empty($age) && empty($adresse) && empty($mail) ){
        // Fonctionne MAIS pas de gestion d'erreur
    $pdo->prepare('INSERT INTO login(nom,prenom,age,adresse,ville,mail) VALUES(?,?,?,?,?,?)')
    ->execute([$nom,$prenom,$age,$adresse,$ville,$mail]);

    }else{
        echo "tous les champs sont requis";
    }}


?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Formulaire d'inscription</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <form action="php.php" method="post">
            <fieldset>
                <legend><h1>Formulaire d'inscription</h1></legend>
                
                <table>
                    <tr><td> nom : </td><td><input type="text" name="nom"></td></tr>
                    <tr><td> prenom : </td><td><input type="text" name="prenom"></td></tr>
                    <tr><td> age : </td><td><input type="number" name="age"></td></tr>
                    <tr><td> adresse : </td><td><input type="text" name="adresse"></td></tr>
                    <tr><td> ville : </td><td><input type="text" name="ville"></td></tr>
                    <tr><td> mail: </td><td><input type="email" name="mail"></td></tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="enregistrer" value="Enregistrer" required>
                            <input type="reset" name="effacer" value="Effacer">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>